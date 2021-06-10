@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">{{ $photo->title }}</h1>
    </div>

    <div class="py-10 text-center ">
        <div class="m-auto">

            <span class="uppercase text-blue-700 font-bold text-xs italic">
                User: {{ $photo->user_id }}
            </span>

            <h2 class="text-grey-700 text-5xl">
                    {{ $photo->title }}
            </h2>

            <p class="text-lg text-grey-700 py-6">
               {{ $photo->description }}
            </p>

            <ul>
                <p class="text-lg text-gray-700">Categories:</p>
            @forelse ($photo->categories as $category)
            <li class="inline italic text-gray-600 px-1 py-2">
                {{ $category->name }}
            </li>

            @empty

            @endforelse

            <ul>
                <p class="text-lg text-gray-700">Comments:</p>
            @forelse ($photo->photoComments as $comment)
            <li class="italic text-gray-600 px-1 py-2">
                {{ $comment->body }}
            </li>

            @empty

            @endforelse
            </ul>

            <div class="m-auto w-4/8 py-6">
                <div class="text-center">
                    <h3 class="text-2xl uppercase text-bold">
                       Write comment
                    </h3>
                </div>
            </div>

                <div class="flex justify-center pt-2">

                    <form action="/comments"
                        class="block" method="POST">
                        @csrf

                        <input type="text"
                            class="block shadow-5xl mb-10 py-2 w-80 italic"
                            name="userName"
                            id="userName"
                            placeholder="User...">

                        <input type="text"
                            class="block shadow-5xl mb-10 py-2 w-80 italic"
                            name="body"
                            id="body"
                            placeholder="Comment...">

                            <input type="hidden" name="photo_id" value="{{ $photo->id }}">

                        <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                            Submit
                        </button>

                    </div>
                    </form>


            </div>


            <hr class="mt-4 mb-8">
        </div>
    </div>
</div>

@endsection
