@extends('layouts.login')

@section('title')
<title>{{ __('Verify password') }}</title>
@endsection

@section('isi')
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">{{__('Forgot Your Password?')}}</h1>
                    <p class="mb-4">{{__('We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!')}}</p>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                  </div>
                  {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('click here to request another') }}</button>.
                    </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
@endsection