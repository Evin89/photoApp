@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Add photo
            </h1>
        </div>
    </div>

        <div class="flex justify-center pt-20">

            <form action="/photos"
                class="block" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="file"
                    class="block shadow-5xl mb-10 py-2 w-80 italic"
                    name="image"
                    id="image"
                    {{-- required --}}
                    >

                <input type="text"
                    class="block shadow-5xl mb-10 py-2 w-80 italic"
                    name="title"
                    id="title"
                    placeholder="Title..."
                    {{-- required --}}
                    >

                <input type="text"
                    class="block shadow-5xl mb-10 py-2 w-80 italic"
                    name="description"
                    id="description"
                    placeholder="Description..."
                    {{-- required --}}
                    >

                <div class="m-auto">
                    <label for="categories" class="block uppercase bold">Categories:</label>

                    <select name="categories" id="categories" class="w-auto" multiple>
                       @foreach ($categories as $category)
                       <option value="{{ $category->id }}" class="block">{{ $category->name }}</option>

                       @endforeach
                    </select>
                </div>


                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>

            </div>
            </form>
        </div>

        @if ($errors->any())
            <div class="w-4/8 m-auto text-center alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 list-none">
                        {{  $error }}
                    </li>
                @endforeach
            </div>
        @endif
@endsection
