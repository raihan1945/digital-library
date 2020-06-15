@extends('layouts.admin')

@section('title')
<title>{{ __('Edit Librarian') }}</title>
@endsection

@section('isi')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">{{ __('Edit') }} {{ $users->name }} {{ __('profile') }}</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit') }} {{ $users->name }} {{ __('profile') }}</h6>
  </div>
    <form action="{{ route('admin.updatelibrarian',$users->id) }}"method="POST" enctype="multipart/form-data"files="true">
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
        <div class="form-group row">
          <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role ID') }}</label>
          <div class="col-md-6">
            <input id="role_id" type="role_id" value="{{ $users->role_id }}" class="form-control form-control-user @error('role_id') is-invalid @enderror" name="role_id" required autocomplete="role_id" autofocus>
            @error('role_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="text-center"> 
          <button type="submit" class="btn btn-primary btn-user">{{ __('Update') }}</button>
          <a href="{{ route('admin.showlibrarians') }}" class="btn btn-danger btn-user">{{ __('Cancel') }}</a>
        </div>
      </div>
    </form>
</div>
</div>
</div>
@endsection