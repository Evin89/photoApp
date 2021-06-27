@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold py-12">{{ $photo->title }}</h1>
    </div>

     {{-- Check if the user_id from the photo is the same as the logged in user, or if the user is admin --}}
     @if (isset(Auth::user()->id) && Auth::user()->id == $photo->user_id || (isset(Auth::user()->id) && Auth::user()->getAdminAttribute()))
     <div class="float-right">
         <a
             class="border-b-2 pb-2 border-dotted italic text-gray-500"
             href="/photos/{{ $photo->id }}/edit">Edit &rarr;</a>

             <form action="/photos/{{ $photo->id }}" method="POST">
                 @csrf
                 @method("PATCH")
                 <button type="submit" class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    @if ( $photo->isActive  = 1 )
                        Deactivate &rarr;
                    @elseif ( $photo->isActive  = 2 )
                        Activate &rarr;
                    @endif
                 </button>
             </form>
             <form action="/photos/{{ $photo->id }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                    Delete &rarr;
                </button>
            </form>
     </div>
     @endif

    <div>
        <img src="{{ asset('images/' . $photo->image_path) }}" alt="" class="mb-8 shadow-2xl object-contain w-2/4">
    </div>



    <div class="py-10 text-center ">
        <div class="m-auto">

            <span class="uppercase text-blue-700 font-bold text-xs italic">
                User: {{ $photo->user->name }}
            </span>

            <p class="text-lg text-grey-700 py-6">
               {{ $photo->description }}
            </p>

            <ul>
                <p class="text-lg text-gray-700">Categories:</p>
            @forelse ($photo->categories as $category)
            <li class="inline italic text-gray-600 px-1 py-2">
                <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
            </li>

            @empty

            @endforelse

            <ul>
                <p class="text-lg text-gray-700">Comments:</p>
            @forelse ($photo->comments as $comment)
            <li class="italic text-gray-600 px-1 py-2">
                <b>{{ $comment->user->name }}:</b> {{ $comment->body }}
                 {{-- Check if the user_id from the photo is the same as the logged in user, or if the user is admin --}}
     @if (isset(Auth::user()->id) && Auth::user()->id == $comment->user_id || (isset(Auth::user()->id) && Auth::user()->getAdminAttribute()))
     <div class="float-right">

             <form action="/comments/{{ $comment->id }}" method="POST">
                 @csrf
                 @method("DELETE")
                 <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                     Delete &rarr;
                 </button>
             </form>

     </div>
     @endif
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
                            name="body"
                            id="body"
                            placeholder="Comment...">

                            {{-- <input type="hidden" name="photo_id" value="{{ $photo->id }}"> --}}

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
