@extends('layouts.librarian')

@section('title')
<title>{{ Auth::user()->name }} {{ __('Profile') }}</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
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
              <label for="name" class="col-md-4 col-form-label">{{ $users->name }}</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
            <div class="col-md-6">
            <label for="email" class="col-md-4 col-form-label">{{ $users->email }}</label>
            </div>
          </div>
          <div class="form-group row">
            <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Date of entry') }}</label>
            <div class="col-md-6">
            <label for="created_at" class="col-md-4 col-form-label">{{ $users->created_at->format('m-d-Y') }}</label>
            </div>
          </div>
          <div class="text-center"> 
            <a href="{{ route('librarian.editprofile',Auth::user()->id) }}" class="btn btn-primary btn-user">{{ __('Edit Profile') }}</a>
            <a href="{{ route ('librarian.dashboard') }}"class="btn btn-danger">{{ __('Back') }}</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection