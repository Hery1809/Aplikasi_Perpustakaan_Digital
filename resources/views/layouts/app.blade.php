<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Perpustakaan Digital') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 4 CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- Font Awesome -->
<link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!-- Custom Styles -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<!-- Custom Styles -->
<style>
        body {
            font-family: 'Nunito', sans-serif;
            background: url('/images/buku1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar-custom {
            background-color: #d4edda;
        }
        .navbar-custom .navbar-brand {
            color: #155724;
            display: flex;
            align-items: center;
            font-size: 1.5rem;
        }
        .navbar-custom .navbar-brand img {
            height: 50px;
            margin-right: 15px;
        }
        .navbar-custom .navbar-nav .nav-link {
            color: #155724;
        }
        .navbar-custom .navbar-nav .nav-link:hover {
            color: #0c5460;
        }
        .navbar-custom .navbar-toggler-icon {
            background-color: #155724;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.9);
            color: #495057;
        }
        .footer {
            background-color: #155724;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }
        .login-card, .register-card {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .home-container h1 {
            font-family: 'Dancing Script', cursive;
            color: #FFD700;
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
            margin-bottom: 3rem;
        }
        .home-container {
            padding: 2rem;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-md navbar-light navbar-custom shadow-sm">
<div class="container">
<a class="navbar-brand fw-bold" href="{{ url('/') }}">
<img src="{{ asset('images/logo_buku.png') }}" alt="Logo Buku" />
Perpustakaan Digital
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto"></ul>
<ul class="navbar-nav ms-auto">
@guest
@if (Route::has('login'))
<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">
<i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
</a>
</li>
@endif

@if (Route::has('register'))
<li class="nav-item">
<a class="nav-link" href="{{ route('register') }}">
<i class="fas fa-user-plus"></i> {{ __('Register') }}
</a>
</li>
@endif
@else
<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
<i class="fas fa-user"></i> {{ Auth::user()->name }}
</a>

<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('profile') }}">
<i class="fas fa-user"></i> {{ __('Profile') }}
</a>
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
<i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
</div>
</li>
@endguest
</ul>
</div>
</div>
</nav>

<main class="py-4">
@yield('content')
</main>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9b3AKl+gAyR5KX2z04oD57P8ahC6HIs5G8a8J0OltRf8swLe0W40" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

<!-- Custom Script for Search Icon Toggle -->
<script>
document.addEventListener('DOMContentLoaded', function() {
const searchBtn = document.getElementById('searchBtn');
const searchIcon = document.getElementById('searchIcon');

searchBtn.addEventListener('click', function(event) {
event.preventDefault(); // Prevent form submission (if form is used)

// Toggle search icon
if (searchIcon.classList.contains('fa-search')) {
searchIcon.classList.remove('fa-search');
searchIcon.classList.add('fa-times');
} else {
searchIcon.classList.remove('fa-times');
searchIcon.classList.add('fa-search');
}

// Add your search functionality logic here
});
});
</script>
</body>
</html>