@extends('layouts.app')


@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">{{ $category->name }}</h1>
    </div>

    @foreach ($photos as $photo)
    <div class="w-5/6  py-10">
        <div class="m-auto">

            <span class="uppercase text-blue-700 font-bold text-xs italic">
                By: {{ $photo->user->name }}
            </span>

                <a href="/photos/{{ $photo->id }}">
                    <img src="{{ asset('images/' . $photo->image_path) }}" alt="" class="mb-8 shadow-2xl object-contain w-1/4">
                </a>

            <p class="text-lg text-grey-700 py-6">
               {{ $photo->description }}
            </p>

            <p>@foreach ($photo->categories as $category)
                {{ $category->name }}
            @endforeach</p>

            <p>Comments: {{ $photo->comments->count() }}</p>

            <hr class="mt-4 mb-8">
        </div>
    </div>
    @endforeach

    {{ $photos->links() }}

</div>

@endsection
