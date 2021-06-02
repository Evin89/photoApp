<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        return view('photos.index');
    }

    public function create()
    {
        return view('photos.post');
    }
}
