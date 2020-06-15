@extends('layouts.admin')

@section('title')
<title>{{ __('Profile') }}</title>
@endsection

@section('isi')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">{{ $users->name }} {{ __('Profile') }}</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">{{ $users->name }} {{ __('Profile') }}</h6>
    </div>
      <div class="card-body">
        <div class="form-group row">
            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>
            <div class="col-md-6">
              <div class="d-flex flex-row flex-nowrap">
                <div class="img img-responsive">
                  <img style="width:150px; height:150px;" class="img img-fluid rounded-circle" src="/picture/profile/{{ $users->avatar }}">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>
            <div class="col-md-6">
              <input id="name" value="{{ $users->name }}" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" required autocomplete="name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
            <div class="col-md-6">
              <input id="email" type="email" value="{{ $users->email }}" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" required autocomplete="email" readonly>
            </div>
          </div>
          <div class="text-center"> 
            <a href="{{ route('admin.editlibrarian',$users->id) }}" class="btn btn-primary btn-user">{{ __('Edit Profile') }}</a>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection