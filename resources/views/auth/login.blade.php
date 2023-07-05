@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h4>{{ __('Login') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check d-flex justify-content-between">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <div>
                                <a href="{{ route('password.request') }}" class="text-primary">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
                    </div>
                </form>
                @if (Route::has('register'))
                    <div class="text-center mt-3">
                        <p>{{ __("Don't have an account?") }} <a href="{{ route('register') }}" class="text-primary">{{ __('Register') }}</a></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
