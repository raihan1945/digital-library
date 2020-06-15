@extends('layouts.login')

@section('title')
<title>{{ __('Forgot password') }}</title>
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
                    <p class="mb-4">{{__('We get it, stuff happens. Just enter your email address below and we will send you a link to reset your password!')}}</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  </div>
                  <form method="POST" action="{{ route('password.email') }}"class="user">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md offset-md">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">{{__('Create an Account!')}}</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('login') }}">{{__('Already have an account? Login!')}}</a>
                  </div>
                </>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
@endsection