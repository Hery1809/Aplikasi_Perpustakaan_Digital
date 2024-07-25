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
                    Our Teachers
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
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Login Form -->
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="loginEmail" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                            <input id="loginEmail" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="loginPassword" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col text-center">
                            <p class="mb-0">Belum punya akun? <a href="#" id="showRegisterFormLink">Registrasi</a></p>
                            <p><a href="{{ route('password.request') }}">Lupa Password?</a></p>
                        </div>
                    </div>
                </form>

                <!-- End Login Form -->

                <!-- Register Form (Initially Hidden) -->
                <form id="registerForm" method="POST" action="{{ route('register') }}" style="display: none;">
                    @csrf

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                        </div>
                        <input id="registerName" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="Name">

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
                        <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin" required>
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
                        <input id="registerTempatLahir" type="text"
                               class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                               value="{{ old('tempat_lahir') }}" required placeholder="Tempat Lahir">

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
                        <input id="registerTanggalLahir" type="date"
                               class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                               value="{{ old('tanggal_lahir') }}" required>

                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group form-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input id="registerEmail" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="Email Address">

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
                        <input id="registerPassword" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password" placeholder="Password">

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
                        <input id="registerPasswordConfirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                    <!-- Link to toggle to Login Form -->
                    <p class="text-center mt-3">Jika sudah mempunyai akun silahkan <a href="#" id="showLoginFormLink">Login</a></p>

                </form>
                <!-- End Register Form -->

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

                <!-- End Register Form -->
            </div>
        </div>
    </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer>
    </script>

    <!-- Custom script for Google Maps -->
    <script>
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
    </script>
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
