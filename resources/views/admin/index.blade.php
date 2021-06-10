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
            <th class="w-1/2 ...">Username</th>
            <th class="w-1/4 ...">Roles</th>
            <th class="w-1/4 ...">Views</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Intro to CSS</td>
            <td>Adam</td>
            <td>858</td>
          </tr>
          <tr class="bg-blue-200">
            <td>A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
            <td>Adam</td>
            <td>112</td>
          </tr>
          <tr>
            <td>Intro to JavaScript</td>
            <td>Chris</td>
            <td>1,280</td>
          </tr>
        </tbody>
      </table>
</div>


@endsection
