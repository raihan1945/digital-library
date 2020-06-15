@extends('layouts.librarian')

@section('title')
<title>{{ __('Edit Profile') }}</title>
@endsection

@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
    <form action="{{ route('librarian.updateprofile',$users->id) }}"method="POST" enctype="multipart/form-data"files="true">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="card-body">
      <div class="form-group row">
          <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>
          <div class="col-md-6">
            <div class="d-flex flex-row flex-nowrap">
              <div class="img img-responsive">
                <img style="width:150px; height:150px;" class="img img-fluid rounded-circle" src="/picture/profile/{{ $users->avatar }}">
              </div>
            </div><br>
            <input id="avatar" type="file" value="{{ $users->avatar }}" class="@error('avatar') is-invalid @enderror"name="avatar" required autocomplete="avatar" autofocus>
            @error('avatar')
              <span>
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <input type="hidden"name="_token"value="{{ csrf_token() }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>
          <div class="col-md-6">
            <input id="name" type="name" value="{{ $users->name }}" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
          <div class="col-md-6">
            <input id="email" type="email" value="{{ $users->email }}" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="text-center"> 
          <button type="submit" class="btn btn-primary btn-user">{{ __('Update') }}</button>
          <a href="{{ route('librarian.profile', Auth::user()->id) }}" class="btn btn-danger btn-user">{{ __('Cancel') }}</a>
        </div>
      </div>
    </form>
</div>
</div>
</div>
@endsection