@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="d-flex flex-column align-items-center mb-4">
                            <!-- Display profile picture -->
                            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/blank_picture.jpg') }}" class="img-fluid rounded-circle mb-3" width="150" height="150" alt="Profile Picture">

                            <!-- Display user name with edit icon -->
                            <div class="d-flex align-items-center mb-3">
                                <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                <a href="{{ route('account.edit') }}" class="btn btn-link ms-3">
                                    <i class="bi bi-pencil" style="color: black;"></i> <!-- Black edit icon -->
                                </a>
                            </div>

                            <!-- Share Profile section -->
                            <div class="text-center">
                                <p><strong>{{ __('Share Profile') }}</strong></p>
                                <div>
                                    <!-- WhatsApp share link -->
                                    <a href="https://wa.me/?text={{ urlencode('Check out this profile: ' . url('/user/' . Auth::id())) }}" class="btn btn-success btn-sm me-2" target="_blank">
                                        <i class="bi bi-whatsapp"></i> WhatsApp
                                    </a>
                                    <!-- Gmail share link -->
                                    <a href="mailto:?subject=Check out this profile&body={{ urlencode('Check out this profile: ' . url('/user/' . Auth::id())) }}" class="btn btn-danger btn-sm me-2" target="_blank">
                                        <i class="bi bi-envelope"></i> Gmail
                                    </a>
                                    <!-- Facebook share link -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/user/' . Auth::id())) }}" class="btn btn-primary btn-sm" target="_blank">
                                        <i class="bi bi-facebook"></i> Facebook
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
