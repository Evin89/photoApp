@extends('layouts.app')

@section('content')
<div class="row mb-12">
    <h2>Post Photo</h2>
</div>
<div class="row mb-12">
    <form>
            <div class="form-outline">
              <input type="text" id="form6Example1" class="form-control" />
              <label class="form-label" for="form6Example1">Title</label>
        </div>

        <div class="form-outline">
            <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
            <label class="form-label" for="textAreaExample">Description</label>
          </div>

          <div class="form-outline">
            <input type="text" id="form6Example1" class="form-control" />
            <label class="form-label" for="form6Example1">Categories</label>
      </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="customFile">Default file input example</label>
        <input type="file" class="form-control" id="customFile" />
            </div>

        <div class="form-check d-flex justify-content-center mb-4">
          <input
            class="form-check-input me-2"
            type="checkbox"
            value=""
            id="form6Example8"
            checked
          />
          <label class="form-check-label" for="form6Example8"> Do you certify this photo is yours?</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Upload photo</button>
      </form>
    </div>

@endsection
