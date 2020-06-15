@extends('layouts.admin')

@section('title')
<title>{{ __('Add Book') }}</title>
@endsection

@section('isi')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">{{ __('Add new book') }}</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ __('Add new book') }}</h6>
  </div>
    <form action="{{ route('admin.storebooks') }}" method="POST" enctype="multipart/form-data" files="true">
    @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Book cover') }}</label>
          <div class="col-md-6">
            <input id="cover" type="file" value="cover" class="@error('cover') is-invalid @enderror" name="cover" required autocomplete="cover" autofocus>
            @error('cover')
              <span>
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
        <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('The content of the book') }}</label>
          <div class="col-md-6">
            <input id="content" type="file" value="" class="@error('content') is-invalid @enderror" name="content" required autocomplete="content" autofocus>
            @error('content')
              <span>
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
          <div class="col-md-6">
            <input id="title" type="title" class="form-control form-control-user @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>
            @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>
          <div class="col-md-6">
            <input id="author" type="author" class="form-control form-control-user @error('author') is-invalid @enderror" name="author" required autocomplete="author" autofocus>
            @error('author')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="synopsis" class="col-md-4 col-form-label text-md-right">{{ __('Synopsis') }}</label>
          <div class="col-md-6">
            <input id="synopsis" type="synopsis" class="form-control form-control-user @error('synopsis') is-invalid @enderror" name="synopsis" required autocomplete="synopsis" autofocus>
            @error('synopsis')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="text-center"> 
          <button type="submit" class="btn btn-primary btn-user">{{ __('Add') }}</button>
          <a href="{{ route('admin.showbooks') }}" class="btn btn-danger btn-user">{{ __('Cancel') }}</a>
        </div>
      </div>
    </form>
</div>
</div>
</div>
@endsection
   