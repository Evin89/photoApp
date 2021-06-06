@extends('layouts.app');

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">{{ $photo->title }}</h1>
    </div>

    <div class="py-10 text-center ">
        <div class="m-auto">

            <span class="uppercase text-blue-700 font-bold text-xs italic">
                User: {{ $photo->userName }}
            </span>

            <h2 class="text-grey-700 text-5xl">
                    {{ $photo->title }}
            </h2>

            <p class="text-lg text-grey-700 py-6">
               {{ $photo->description }}
            </p>

            <ul>
                <p class="text-lg text-gray-700">Comments:</p>
            @forelse ($photo->photoComments as $comment)
            <li class="italic text-gray-600 px-1 py-2">
                {{ $comment->body }}
            </li>

            @empty

            @endforelse
            </ul>

            <hr class="mt-4 mb-8">
        </div>
    </div>
</div>

@endsection
