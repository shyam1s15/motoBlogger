@extends('layouts.app')

@section('content')

<ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
  </ul>
  {{-- here the navigation ends --}}

    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">First and last name</span>
            </div>
            <input type="text" aria-label="First name" class="form-control" name="fn">
            <input type="text" aria-label="Last name" class="form-control" name="ln">
          </div>
          {{-- file input starts --}}
          <div class="form-group">
          <label for="exampleFormControlFile1">Example file input</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">With textarea</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
          </div>

        <button type="submit">submit</button>
      </form>  

    @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
@endsection