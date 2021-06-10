@extends('layouts.app')

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">Photos</h1>
    </div>

    @if (Auth::user())
    <div class="pt-10">
        <a href="/photos/create"
        class="border-b-2 pb-2 border-dotted italic text-gray-500">
    Add a new photo &rarr;</a>
    </div>
    @endif

    @foreach ($photos as $photo)
    <div class="w-5/6  py-10">
        <div class="m-auto">

            @if (isset(Auth::user()->id) && Auth::user()->id == $photo->user_id)
            <div class="float-right">
                <a
                    class="border-b-2 pb-2 border-dotted italic text-gray-500"
                    href="photos/{{ $photo->id }}/edit">Edit &rarr;</a>

                    <form action="/photos/{{ $photo->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                            Delete &rarr;
                        </button>
                    </form>
            </div>
            @endif


            <span class="uppercase text-blue-700 font-bold text-xs italic">
                User: {{ $photo->user->name }}
            </span>

            {{-- <h2 class="text-grey-700 text-5xl hover:text-gray-500"> --}}
                <a href="/photos/{{ $photo->id }}">
                    <img src="{{ asset('images/' . $photo->image_path) }}" alt="" class="w-3/4 mb-8 shadow-2xl ">
                </a>
            {{-- </h2> --}}

            <p class="text-lg text-grey-700 py-6">
               {{ $photo->description }}
            </p>

            <hr class="mt-4 mb-8">
        </div>
    </div>
    @endforeach

</div>

@endsection
