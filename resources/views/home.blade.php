@extends('layouts.app')

@section('content')


<div class="m-auto w-4/5 py-12">
    <div class="text-center">
        <h2 class="text-3xl uppercase bold py-24">Search image</h2>
        <div class="relative">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <form action="/photos/search" method="GET">
                @csrf
                <input type="text" name="search" class="h-14 w-96 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search anything...">

                <div class="absolute top-2 right-2">
                    <button class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <h2 class="text-3xl uppercase bold py-24">Search on categories</h2>
        <div class="relative">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <form action="/photos/search" method="GET">
                @csrf
                <select name="categories" id="categories" class="w-auto" multiple>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="block">{{ $category->name }}</option>

                    @endforeach
                 </select>

                <div class="absolute top-2 right-2">
                    <button class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
