<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Http\Requests\CreateValidationRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $photos = Photo::paginate(15);

        return view('photos.index', [
            'photos' => $photos
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create', Photo::class);

        $categories = Category::all();

        return view('photos.create', [
            'categories' => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create', Photo::class);

        $request->validate([
            'title' => 'required|string|unique:photos',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:5048',
            'categories' => 'required'
        ]);

        $newImageName = time() .  '-' . $request->title . '-' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $photo = Photo::create([
            'title' => $request->input('title'),
            'user_id' => auth()->user()->id,
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect('/photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $photo = Photo::find($id);

        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $this->authorize('edit', $id);

        $photo = Photo::find($id)->first();

        $loggedInUserId = Auth::user()->id;
        $photoUserId = $photo->user_id;

        if ($loggedInUserId === $photoUserId){
        return view('/photos.edit')->with('photo', $photo);
        } else {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {


        $this->authorize('update', $id);

        $request->validated();

        Photo::where('id', $id)->update([
            'title' => $request->input('title'),
            'userName' => $request->input('userName'),
            'description' => $request->input('description')
        ]);

        return redirect('/photos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('delete', $id);
        $photo = Photo::find($id)->first();

        $photo->delete();

        return redirect('/photos');

    }

    public function Search(Request $request)
    {
        $search = $request->input('search');

        echo $search;

        // $photos = DB::table('photos')
        //         ->join('categories', 'usecars.id', '=', 'contacts.user_id')
        //         ->where('name', 'like', $search)
        //         ->get();

        $category_id = 1;

        // $photos = Photo::whereHas('categories', function($query) use ($category_id){
        //     $query->where('category_id', $category_id);
        // })->get();

        $photos = Photo::whereHas('categories', function($query) use ($search){
            $query->where('name', 'LIKE', "%{$search}%");
        })->paginate(15);

        return view('photos.index', [
            'photos' => $photos
        ]);
        

        // echo "</br>";
        // echo $photos;
    }

}
