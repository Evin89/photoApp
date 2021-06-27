@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Edit user {{ $user->name }}
            </h1>
        </div>
    </div>

        <div class="flex justify-center pt-20">

            <form action="/users/{{ $user->id }}"
                class="block" method="POST">
                @csrf
                @method('PUT')


                <input type="text"
                    class="block shadow-5xl mb-10 py-2 w-80 italic"
                    name="name"
                    id="title"
                    value="{{ $user->name }}">

                <input type="text"
                    class="block shadow-5xl mb-10 py-2 w-80 italic"
                    name="email"
                    id="userName"
                    value="{{ $user->email }}">

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>

            </div>
            </form>


    </div>

    @if ($errors->any())
    <div class="w-4/8 m-auto text-center">
        @foreach ($errors->all() as $error)
            <li class="text-red-500 list-none">
                {{  $error }}
            </li>
        @endforeach
    </div>
@endif
@endsection
