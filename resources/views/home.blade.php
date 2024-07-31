<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Perpustakaan Digital</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
        }
    </style>

    <style>
        /* Custom styles for navbar */
        .navbar-nav .nav-item .nav-link {
            position: relative;
            padding-bottom: 5px;
            /* Jarak antara teks dan garis bawah */
            transition: all 0.3s ease;
            /* Efek transisi untuk animasi */
            color: #333;
            /* Warna teks */
        }

        .navbar-nav .nav-item .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            /* Ketebalan garis bawah */
            background-color: #007bff;
            /* Warna garis bawah */
            transform: scaleX(0);
            /* Mulai dengan skala 0 (tidak terlihat) */
            transition: transform 0.3s ease;
            /* Efek transisi untuk animasi */
        }

        .navbar-nav .nav-item.active .nav-link::after,
        .navbar-nav .nav-item .nav-link:hover::after {
            transform: scaleX(1);
            /* Saat dihover atau aktif, skala menjadi 1 (terlihat) */
            background-color: #007bff;
            /* Warna garis bawah saat dihover atau aktif */
        }
    </style>

<style>
    .hero_img-container {
        overflow: hidden;
        position: relative;
    }

    .hero_img-container img {
        width: 100%; /* Mengatur lebar gambar agar sesuai dengan kontainer */
        animation: moveUpDown 5s ease-in-out infinite; /* Mengaplikasikan animasi ke gambar */
    }

    @keyframes moveUpDown {
        0% {
            transform: translateY(0); /* Posisi awal */
        }
        50% {
            transform: translateY(-20px); /* Posisi tengah, geser ke atas */
        }
        100% {
            transform: translateY(0); /* Posisi akhir, kembali ke posisi awal */
        }
    }
</style>
</head>

<body>
    <div class="top_container">
        <!-- header section starts -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                        <span>PusDIGI</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}"> Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about-section"> About </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#teacher-section"> Teacher </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#vehicle-section"> Facility </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('contact') }}"> Contact Us </a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- header section ends -->

        <!-- hero section -->
        <section class="hero_section">
            <div class="hero-container container">
                <div class="hero_detail-box">
                    <h3>
                        Welcome to our <br>
                        Digital Library! 📚✨
                    </h3>
                    <h1>
                        PusDigi
                    </h1>
                    <p>
                        Discover a world of limitless knowledge with just a few clicks. Explore our vast collection of
                        digital books,
                        rich in information and inspiration.
                        Happy exploring and happy reading! 🌟📖
                    </p>
                    <div class="hero_btn-continer">
                        <a href="#" class="call_to-btn btn_white-border" data-toggle="modal"
                            data-target="#loginModal">
                            <span>Login</span>
                            <img src="{{ asset('images/right-arrow.png') }}" alt="">
                        </a>

                    </div>
                </div>
                <div class="hero_img-container">
                    <div>
                        <img src="{{ asset('images/hero.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- about section -->
        <section id="about-section" class="about_section layout_padding">
            <div class="container">
                <h2 class="main-heading">
                    About Campus
                </h2>
                <p class="text-center">
                    Visi:
                    National Leading and Globaly Competitive Polytechnic. <br>
                    Misi:
                    Meningkatkan mutu, akses, dan relevansi pendidikan politeknik untuk menghasilkan lulusan sesuai
                    kebutuhan pekerjaan;<br>
                    Melakukan penelitian terapan dan pengabdian masyarakat untuk mengatasi persoalan industri dan
                    masyarakat.
                </p>
                <div class="about_img-box">
                    <img src="{{ asset('images/kids.jpg') }}" alt="" class="img-fluid w-100">
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="https://polindra.ac.id/tentang/" class="call_to-btn">
                        <span>
                            Read More
                        </span>
                        <img src="{{ asset('images/right-arrow.png') }}" alt="">
                    </a>
                </div>
            </div>
        </section>
        <!-- about section ends -->

        <!-- teacher section -->
        <section id="teacher-section" class="teacher_section layout_padding-bottom">
            <div class="container">
                <h2 class="main-heading">
                    Our Members
                </h2>
                <p class="text-center">
                    Ipsum available, but the majority h
                </p>
                <div class="teacher_container layout_padding2">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/teacher-1.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Den Mark</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/teacher-2.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Leena Jorj</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/teacher-3.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Magi Den</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/teacher-4.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Jonson Mark</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ url('teacher') }}" class="call_to-btn">
                        <span>
                            See More
                        </span>
                        <img src="{{ asset('images/right-arrow.png') }}" alt="">
                    </a>
                </div>
            </div>
        </section>
        <!-- teacher section ends -->

        <!-- vehicle section -->
        <section id="vehicle-section" class="vehicle_section layout_padding">
            <div class="container">
                <h2 class="main-heading">
                    E-Book Facility
                </h2>
                <p class="text-center">
                    Ebook facilities provide easy access to digital books, enabling convenient reading and storage.
                </p>
                <div class="layout_padding-top">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="vehicle_img-box">
                                    <img src="{{ asset('images/bus.png') }}" alt="" class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="vehicle_img-box">
                                    <img src="{{ asset('images/bus2.png') }}" alt="" class="img-fluid w-25">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="vehicle_img-box">
                                    <img src="{{ asset('images/bus.png') }}" alt="" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- vehicle section ends -->

        <!-- client section -->
        <section class="client_section layout_padding">
            <div class="container">
                <h2 class="main-heading">
                    Our Students Feedback
                </h2>
                <p class="text-center">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration in
                    some form, by injected humour, or randomised
                </p>
                <div class="layout_padding2">
                    <div class="client_container d-flex flex-column">
                        <div class="client_detail d-flex align-items-center">
                            <div class="client_img-box">
                                <img src="{{ asset('images/student.png') }}" alt="">
                            </div>
                            <div class="client_detail-box">
                                <h4>
                                    Veniam Quis
                                </h4>
                                <span>
                                    (exercitation)
                                </span>
                            </div>
                        </div>
                        <div class="client_text mt-4">
                            <p>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut aliquip ex
                                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu
                                fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit
                                anim id est laborum."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- client section ends -->

        <!-- contact section -->
        <section class="contact_section layout_padding-bottom">
            <div class="container">
                <h2 class="main-heading">
                    Contact Now
                </h2>
                <p class="text-center">
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                </p>
                <div class="">
                    <div class="contact_section-container">
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="contact-form">
                                    <form action="">
                                        <div>
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Phone Number">
                                        </div>
                                        <div>
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Message" class="input_message">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn_on-hover">
                                                Send
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact section ends -->

        <!-- admission section -->
        <section class="admission_section">
            <div class="container-fluid position-relative">
                <div class="row h-100">
                    <div id="map" class="h-100 w-100"></div>
                    <div class="container">
                        <div class="admission_container position-absolute">
                            <div class="admission_img-box">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- admission section ends -->

        <!-- landing section -->
        <section class="landing_section layout_padding">
            <div class="container">
                <h2 class="main-heading">
                    Free Multipurpose Responsive
                </h2>
                <h2 class="main-heading number_heading">
                    Landing Page 2024
                </h2>
                <p class="landing_detail text-center">
                    There are many variations of passages of Lorem Ipsum available, but the majority There are many
                    variations of
                    passages of Lorem Ipsum available, but the majority h
                </p>
            </div>
        </section>
        <!-- end landing section -->

        <!-- footer section -->
        <section class="container-fluid footer_section">
            <p>
                Copyright &copy; 2024 All Rights Reserved By
                <a href="https://polindra.ac.id/">Mahasiswa Polindra</a>
            </p>
        </section>
        <!-- footer section ends -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content gradient-custom">
            <div class="modal-body p-5">
                <!-- Login Form -->
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase text-white text-center">Sign In</h2>
                    <p class="text-white-50 mb-5 text-center">Please enter your login and password!</p>

                    <div class="form-outline form-white mb-4">
                        <input id="loginEmail" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="loginPassword" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <p class="small mb-5 pb-lg-2 text-center"><a class="text-white-50" href="{{ route('password.request') }}">Forgot password?</a></p>

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                    </div>

                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div>

                    <p class="mb-0 text-center mt-3">Don't have an account? <a href="#" id="showRegisterFormLink" class="text-white-50 fw-bold">Sign Up</a></p>
                </form>

                <!-- End Login Form -->

                <!-- Register Form (Initially Hidden) -->
                <form id="registerForm" method="POST" action="{{ route('register') }}" style="display: none;">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase text-white text-center">Register</h2>
                    <p class="text-white-50 mb-5 text-center">Please enter your details!</p>

                    <div class="form-outline form-white mb-4">
                        <input id="registerName" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <select id="jenis_kelamin" class="form-control form-control-lg @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
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

                    <div class="form-outline form-white mb-4">
                        <input id="registerTempatLahir" type="text" class="form-control form-control-lg @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required placeholder="Tempat Lahir">
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="registerTanggalLahir" type="date" class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="registerEmail" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="registerPassword" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input id="registerPasswordConfirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                    </div>

                    <p class="text-center mt-3">Already have an account? <a href="#" id="showLoginFormLink" class="text-white-50 fw-bold">Login</a></p>
                </form>
                <!-- End Register Form -->
            </div>
                <!-- JavaScript files -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

    <script>
        // Smooth scrolling for links in navbar except Contact Us
        $('a[href*="#"]:not([href="#"], [href="#contact"])').on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();

                var hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {
                    window.location.hash = hash;
                });
            }
        });

        // Hide/show navbar on scroll
        let lastScrollTop = 0;
        const navbar = document.querySelector('.header_section');

        window.addEventListener('scroll', function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                // Scroll down
                navbar.classList.add('hidden');
            } else {
                // Scroll up
                navbar.classList.remove('hidden');
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });
    </script>

    <!-- Google Maps API (replace YOUR_GOOGLE_MAPS_API_KEY with your actual API key) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
    <script>
        let map;

        async function initMap() {
            const { Map, Marker, InfoWindow } = await google.maps.importLibrary("maps");

            const location = { lat: -6.627028, lng: 108.218331 }; // Koordinat Politeknik Negeri Indramayu

            map = new Map(document.getElementById("map"), {
                center: location,
                zoom: 15,
            });

            const marker = new Marker({
                position: location,
                map: map,
                title: 'Politeknik Negeri Indramayu',
            });

            const infoWindow = new InfoWindow({
                content: '<h3>Politeknik Negeri Indramayu</h3><p>Jl. Lohbener Lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252</p>'
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });
        }
    </script>

    <!-- Custom script for Google Maps -->
    {{-- <script>
        // Initialize and add the map
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {
                    lat: 40.645037,
                    lng: -73.880224
                },
            });

            var image = '{{ asset('images/maps-and-flags.png') }}';
            var beachMarker = new google.maps.Marker({
                position: {
                    lat: 40.645037,
                    lng: -73.880224
                },
                map: map,
                icon: image
            });
        }
    </script> --}}
    <!-- End Google Maps script -->

    <script>
        $(document).ready(function() {
            // Show or hide the scroll to top button based on scroll position
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.scroll-to-top').fadeIn();
                } else {
                    $('.scroll-to-top').fadeOut();
                }
            });

            // Smooth scrolling when the scroll to top button is clicked
            $('.scroll-to-top').click(function(e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, '300');
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('.password-toggle').on('click', function() {
            let passwordField = $('#loginPassword');
            let passwordFieldType = passwordField.attr('type');
            let toggleIcon = $(this).find('i');

            if (passwordFieldType === 'password') {
                passwordField.attr('type', 'text');
                toggleIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                toggleIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>

<script>
    // JavaScript to switch between Login and Registration forms
    document.getElementById('showRegisterFormLink').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
    });

    document.getElementById('showLoginFormLink').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('loginForm').style.display = 'block';
    });
</script>


    <a href="#" class="scroll-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>
    <style>
    .scroll-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        font-size: 20px;
        background-color: #007bff;
        color: #fff;
        border-radius: 50%;
        display: none;
        z-index: 9999;
        cursor: pointer;
    }

    .scroll-to-top:hover {
        background-color: #0056b3;
    }
    </style>


</body>

</html>
