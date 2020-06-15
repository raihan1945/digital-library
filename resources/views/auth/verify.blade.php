@extends('layouts.login')

@section('title')
<title>{{ __('Verify') }}</title>
@endsection

@section('isi')
    <div class="row justify-content-center">
      <div class="col-lg-7 col-md-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{__('Email verification')}}</h1>
                    <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},</p>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <form class="user" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Click here to request another') }}</button>.
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
@endsection