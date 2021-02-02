@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row cover bg-2">
    <div class="mx-auto card">
        <div class="card-body">
            <h4 class="header-tag">{{ __('Login') }}</h4>
            <form class="form color-form" action="{{ route('login') }}" method="post">
              @csrf
              <div class="row form-row">
                <div class="col-md-10 offset-md-1">
                  <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row form-row">
                <div class="col-md-10 offset-md-1">
                  <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row form-row">
                <div class="col-md-5 offset-md-1">
                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary fill">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link fill forgot" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
