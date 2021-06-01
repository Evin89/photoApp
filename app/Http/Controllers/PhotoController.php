<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function show($id)
    {
        $data = [
            '1' => 'imageOne',
            '2' => "imageTwo"
        ];

        return view('photo.index', [
            'photos' => $data[$id] ?? 'Photo with id '. $id . ' does not exist'
            ]);

        //     $id = $id;
        // $title = 'title';
        // $user = 'user';
        // $imageUrl = '/images/massimiliano-morosinotto-MljwsnGwdOY-unsplash.jpg';
        // $description = 'description';
        // $rating = 'rating';

        return view('photo.index', compact('id','title', 'user', 'imageUrl', 'description', 'rating'));
    }


    // CRUDF
    public function create()
    {
        return 'This is the photo create page';
    }

    public function edit()
    {
        return 'This is the photo edit page';
    }

    public function update()
    {
        return 'This route updates the photo';
    }

    public function delete()
    {
        return 'This route deletes the photo';
    }
}
