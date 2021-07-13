@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
{{-- <div>login</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="    display: flex;" class="card-header">{{ __('login.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('login.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('login.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="    margin-right: 20px;" class="form-check-label" for="remember">
                                        {{ __('login.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('login.Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('login.Forgot Your Password?') }}
                                    </a>
                                @endif
                                <a class="btn btn-link" href="login/twitter"> 
                                    <i class="fab fa-twitter"></i>
                                </a>
                                |
                                <a class="btn btn-link" href="login/google"> 
                                    <i class="fab fa-google"></i>
                                </a>
                                {{-- |
                                <a class="btn btn-link" href="login/facebook"> 
                                    <i class="fab fa-facebook"></i>
                                </a> --}}
                            </div>
                        </div>
                    </form>
                </div>

                

            </div>
        </div>
    </div>
</div>
@endsection
