@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create category
            </h1>
        </div>
    </div>

        <div class="flex justify-center pt-20">

            <form action="/categories"
                class="block" method="POST">
                @csrf

                <input type="text"
                    class="block shadow-5xl mb-10 py-2 w-80 italic"
                    name="name"
                    id="name"
                    placeholder="Category...">

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>

            </div>
            </form>

    </div>
@endsection
