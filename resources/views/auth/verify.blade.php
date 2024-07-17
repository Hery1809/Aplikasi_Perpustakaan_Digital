@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Verifikasi Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Kode verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif

                    <p>{{ __('Sebelum melanjutkan, harap periksa email Anda untuk mendapatkan tautan verifikasi.') }}</p>
                    <p>{{ __('Jika Anda tidak menerima email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary mt-2">{{ __('Klik di sini untuk meminta yang lain') }}</button>
                        </form>
                    </p>

                    <!-- Formulir untuk memasukkan kode verifikasi -->
                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="verification_code" class="form-label">{{ __('Kode Verifikasi') }}</label>
                            <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" value="{{ old('verification_code') }}" required autofocus>
                            @error('verification_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">{{ __('Verifikasi Kode') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
