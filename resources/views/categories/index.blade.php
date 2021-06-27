@extends('layouts.app')

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">Categories</h1>
    </div>

    @admin
    <div class="pt-10">
        <a href="/categories/create"
        class="border-b-2 pb-2 border-dotted italic text-gray-500">
    Add a new category &rarr;</a>
    </div>
    @endadmin

    @foreach ($categories as $category)
    <div class="w-5/6  py-10">
        <div class="m-auto">

             {{-- Check if the user_id from the photo is the same as the logged in user, or if the user is admin --}}
             @if ( (isset(Auth::user()->id) && Auth::user()->getAdminAttribute()))
            <div class="float-right">
                <a
                    class="border-b-2 pb-2 border-dotted italic text-gray-500"
                    href="categories/{{ $category->id }}/edit">Edit &rarr;</a>

                    <form action="/categories/{{ $category->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                            Delete &rarr;
                        </button>
                    </form>
            </div>
            @endif


            <span class="uppercase text-blue-700 font-bold text-xs italic">
                <a href="/categories/{{ $category->id }}">{{ $category->name}}</a>
            </span>

            <hr class="mt-4 mb-8">
        </div>
    </div>
    @endforeach

</div>

@endsection
