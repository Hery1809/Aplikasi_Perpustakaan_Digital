@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center" style="width: 300px;">
                <div class="card-header h5 text-white bg-primary">{{ __('Password Reset') }}</div>
                <div class="card-body px-5">
                    <p class="card-text py-2">
                        {{ __('Enter your email address and we\'ll send you an email with instructions to reset your password.') }}
                    </p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-outline">
                            <input id="email" type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Send Password Reset') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
