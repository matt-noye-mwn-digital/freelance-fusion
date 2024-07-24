@extends('layouts.login')

@section('content')
    <section class="loginPage">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card loginCard">
                        <div class="card-header">
                            <h1>Login</h1>
                        </div>
                        <div class="card-body">
                            @env('local')
                                <div class="btn-group loginLinkBtnGroup ">
                                    <x-login-link :user-attributes="['role', 'super admin']" email="super-admin@admin.com" label="Super Admin Login" redirect-url="{{ route('admin.dashboard') }}"/>
                                    <x-login-link :user-attributes="['role', 'staff']" email="test-staff@test.com" label="Staff Login" redirect-url="{{ route('staff.dashboard') }}"/>
                                    <x-login-link :user-attributes="['role', 'client']" email="test-client@test.com" label="Customer / Client Login" redirect-url="{{ route('client.dashboard') }}"/>
                                </div>
                            @endenv
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="password">{{ __('Password') }}</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-lg-flex justify-content-lg-end">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <button type="submit" class="btn btn-primary loginBtn">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
