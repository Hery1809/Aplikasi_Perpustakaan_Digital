@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-sm login-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="m-0">Sign In</h3>
                <div class="social_icon">
                    <a href="#" class="text-dark me-2"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" class="text-dark me-2"><i class="fab fa-google-plus-square"></i></a>
                    <a href="#" class="text-dark me-2"><i class="fab fa-twitter-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-white" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-column align-items-center">
                    <div class="d-flex justify-content-center links mb-2">
                        Don't have an account? <a href="{{ route('register') }}" class="ms-2">Sign Up</a>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-dPZzADmiM1xtNPU3/2Og5QfvoA7t8HXwSfk19mMEx8DkCIBu5HOjDD0zGzB+Y88w" crossorigin="anonymous"></script>
@endpush
