@extends('layouts.admin')

@section('title')
<title>{{ __('Edit book') }}</title>
@endsection
@section('isi')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800"></h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div>
    <form action="{{ route('admin.updatebook',$book->id) }}"method="POST" enctype="multipart/form-data"files="true">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="card-body">
      <div class="form-group row">
          <label for="cover" class="col-md-4 col-form-label text-md-right">{{ __('Cover of the book') }}</label>
          <div class="col-md-6">
            <div class="d-flex flex-row flex-nowrap">
              <div class="img img-responsive">
                <img style="width:150px; height:150px;" class="img img-fluid" src="/book/cover/{{ $book->cover }}">
              </div>
            </div><br>
            <input value="{{ $book->cover}}" id="cover" type="file"  class="@error('cover') is-invalid @enderror" name="cover" required autocomplete="cover" autofocus>
            @error('cover')
              <span>
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <input type="hidden"name="_token"value="{{ csrf_token() }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Cover of the book') }}</label>
          <div class="col-md-6">
            <input id="content" type="file" value="{{ $book->content}}" class="@error('content') is-invalid @enderror"name="content" required autocomplete="content" autofocus>
            @error('content')
              <span>
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <input type="hidden"name="_token"value="{{ csrf_token() }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title of the book') }}</label>
          <div class="col-md-6">
            <input id="title" type="title" value="{{ $book->title }}" class="form-control form-control-user @error('title') is-invalid @enderror" name="title" required autocomplete="title" autofocus>
            @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author of the book') }}</label>
          <div class="col-md-6">
            <input id="author" type="author" value="{{ $book->author }}" class="form-control form-control-user @error('author') is-invalid @enderror" name="author" required autocomplete="author" autofocus>
            @error('author')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="synopsis" class="col-md-4 col-form-label text-md-right">{{ __('Role ID') }}</label>
          <div class="col-md-6">
            <input id="synopsis" type="synopsis" value="{{ $book->synopsis }}" class="form-control form-control-user @error('synopsis') is-invalid @enderror" name="synopsis" required autocomplete="synopsis" autofocus>
            @error('synopsis')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="text-center"> 
          <button type="submit" class="btn btn-primary btn-user">{{ __('Update') }}</button>
          <a href="{{ route('admin.showbooks') }}" class="btn btn-danger btn-user">{{ __('Cancel') }}</a>
        </div>
      </div>
    </form>
</div>
</div>
</div>
@endsection