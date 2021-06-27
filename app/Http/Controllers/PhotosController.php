<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Http\Requests\CreateValidationRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;

class PhotosController extends Controller
{
    public function __construct()
    {

        // Only index, show and search are available for non-logged in users.
        $this->middleware('auth', ['except' => ['index', 'show', 'search', ]]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // photos are paginted per 15.
        $photos = Photo::orderBy('created_at', 'desc')->where('isActive', 1)->paginate(7);

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

        // Authorize middleware checks of user is logged in.
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

        // First middleware checks if the user is logged in.
        $this->authorize('create', Photo::class);

        // Request gets validated.
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

        $categories = $request->validate([
            'categories' => 'required'
        ]);

        $photo->categories()->sync($categories);

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

        if ($photo->isActive = 1) {
            return view('photos.show')->with('photo', $photo);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $photo = Photo::find($id);

        if (auth()->user()->id == $photo->user_id  || auth()->user()->getAdminAttribute()){
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

        $photo = Photo::find($id);

        if (auth()->user()->id == $photo->user_id  || auth()->user()->getAdminAttribute()){

            $request->validated();

            Photo::where('id', $id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);

            return redirect('/photos');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $photo = Photo::find($id);

        if (auth()->user()->id == $photo->user_id  || auth()->user()->getAdminAttribute()){
            $photo->delete();
        }

        return redirect('/photos');

    }

    /*
     * Custom search function for searching for text in photo descriptions.
     *
     * * @param  Request $request
    */
    public function Search(Request $request)
    {
        $search = $request->input('search');


        $photos = Photo::whereHas('categories', function($query) use ($search){
            $query->where('name', 'LIKE', "%{$search}%");
        })->paginate(7);

        return view('photos.index', [
            'photos' => $photos
        ]);

    }

    public function toggleStatus($id)
    {

        $photo = Photo::find($id);

        if (auth()->user()->id == $photo->user_id  || auth()->user()->getAdminAttribute()){

            if ($photo->isActive == 1) {
                Photo::where('id', $id)->update([
                    'isActive' => false
                ]);
                return redirect('/photos/'.$id);

            } else if ($photo->isActive == 0){
                Photo::where('id', $id)->update([
                    'isActive' => true
                ]);
                return redirect('/photos/'.$id);
            }

        }

    }

}
