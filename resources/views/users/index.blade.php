@extends('layouts.app')

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">Users</h1>
    </div>
</div>

<div class="m-auto w-4/5">

    @foreach ($users as $user)
    <div class="">
        <div class="m-auto">

            {{-- @if (isset(Auth::user()->id) --}}
            <div class="float-right">
                <a
                    class="border-b-2 pb-2 border-dotted italic text-gray-500"
                    href="users/{{ $user->id }}/edit">Edit &rarr;</a>

                    <form action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                            Delete &rarr;
                        </button>
                    </form>
            </div>
            {{-- @endif --}}

            <p class="text-lg text-grey-700 py-3">
               <a href="/users/{{ $user->id }}">
                   {{ $user->name }}
               </a>
            </p>

            <hr class="mt-4 mb-8">
        </div>
    </div>
    @endforeach

    {{ $users->links() }}

</div>

@endsection
