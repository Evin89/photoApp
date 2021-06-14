@extends('layouts.app')

@section('content')
<div class="m-auto w-3/5 py-24">

    <div class="text-center">
        <h1 class="text-5xl uppercase bold">{{ $user->name }}</h1>
    </div>

    <div class="py-10 text-center ">
        <div class="m-auto">

            <ul>
                <p class="text-lg text-gray-700">Photos:</p>
            @forelse ($user->photos as $photo)
            <li class="italic text-gray-600 px-1 py-2">
                {{ $photo->title}}
                <a href="/photos/{{ $photo->id }}">
                    <img src="{{ asset('images/' . $photo->image_path) }}" alt="" class="mb-8 shadow-2xl object-contain ">
                </a>
            </li>

            @empty

            @endforelse
            </ul>


            <hr class="mt-4 mb-8">
        </div>
    </div>
</div>

@endsection
