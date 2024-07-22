@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-sm login-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="m-0">{{ __('Register') }}</h3>
                <div class="social_icon">
                    <a href="#" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-dark me-2"><i class="fab fa-google"></i></a>
                    <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- New Fields First -->

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        </div>
                        <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                            <option value="" disabled selected>{{ __('Pilih Jenis Kelamin') }}</option>
                            <option value="Laki-laki">{{ __('Laki-laki') }}</option>
                            <option value="Perempuan">{{ __('Perempuan') }}</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Tempat Lahir">
                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                        </div>
                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Existing Fields After New Fields -->

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-column align-items-center">
                    <div class="d-flex justify-content-center links mb-2">
                        Already have an account? <a href="{{ route('login') }}" class="ms-2">Sign In</a>
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
