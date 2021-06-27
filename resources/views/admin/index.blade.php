@extends('layouts.app')

@section('content')

<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">Admin</h1>
    </div>
</div>

<div class="m-auto w-4/5">
    <hr>
</div>


<div class="m-auto w-2/4 py-12">

    <table class="table-fixed">
        <thead>
          <tr>
            <th class="w-1/4">Username</th>
            <th class="w/1/4">E-mail</th>
            <th class="w-1/4">Roles</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                      {{  $role->name }}
                    @endforeach
                </td>
            </tr>

            @empty

            @endforelse
        </tbody>
      </table>

      {{ $users ->links() }}
</div>


@endsection
