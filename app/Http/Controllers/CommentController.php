<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $title = 'title';
        $user = 'user';
        $description = 'description';
        $rating = 'rating';
        return view('photo.index', compact('title', 'user', 'description', 'rating'));
    }


    // CRUD
    public function create()
    {
        return 'This is the comment create page';
    }

    public function edit()
    {
        return 'This is the comment edit page';
    }

    public function update()
    {
        return 'This route updates the comment';
    }

    public function delete()
    {
        return 'This route deletes the comment ';
    }

}
