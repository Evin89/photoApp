@extends('layouts.app')

@section('content')
<!-- Gallery -->
<div class="row">

    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <a href="photos/1">
            <img
        src="{{ asset('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""/>
    </a>

    <a href="photos/2">
      <img
        src="{{ asset('https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </a>
    </div>

    <div class="col-lg-4 mb-4 mb-lg-0">
        <a href="photos/3">
      <img
        src="{{ asset('https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </a>

      <a href="photos/4">
      <img
        src="{{ asset('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </a>
    </div>

    <div class="col-lg-4 mb-4 mb-lg-0">
        <a href="photos/5">
      <img
        src="{{ asset('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </a>

      <a href="photos/6">
      <img
        src="{{ asset('https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg') }}"
        class="w-100 shadow-1-strong rounded mb-4"
        alt=""
      />
    </a>
    </div>
  </div>
  <!-- Gallery -->
  @endsection
