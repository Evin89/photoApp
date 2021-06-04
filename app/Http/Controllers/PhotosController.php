<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{

    // READ
    public function index()
    {
        $photos = DB::select('select * from photos');

        dd($photos);
    }

    public function show($id)
    {
        $photos = DB::table('photos')
            ->where('id', $id)
            ->get();

        dd($photos);
    }

    // CREATE
    public function create()
    {
        return view('photos.create');
    }

    public function post()
    {
        $posts = DB::table('photos')
            ->insert([
                'title' => 'New photo',
                'description' => 'New description'
            ]);

        dd($posts);
    }

    // UPDATE
    public function edit($id)
    {
       $posts = DB::table('photos')
            ->where('id', '=', $id)
            ->get();

         return view('photos.edit',
        ['photos' => $data[$id] ?? 'Photo with id '. $id . ' does not exist']);

        // dd($posts);
    }

    public function update($id)
    {
        $posts = DB::table('photos')
        ->where('id', '=', $id)
        ->update([
            'title' => 'Updated Title', 'description' => 'Updated description'
        ]);
    }

    // DELETE
    public function delete($id)
    {
        $posts = DB::table('photos')
            ->where('id', '=', $id)
            ->delete();
    }


}
