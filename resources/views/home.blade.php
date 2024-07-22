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

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <!-- progress barstle -->
  <link rel="stylesheet" href="{{ asset('css/css-circular-prog-bar.css') }}">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- font awesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/css-circular-prog-bar.css') }}">
</head>

<body>
  <div class="top_container">
    <!-- header section starts -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <span>
              PusDIGI
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/') }}"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('about') }}"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('teacher') }}"> Teacher </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('vehicle') }}"> Vehicle </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
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
            Discover a world of limitless knowledge with just a few clicks. Explore our vast collection of digital books, rich in information and inspiration.
            Whether you're looking for resources for research, self-improvement, or simply for entertainment, you'll find it all here.
            Happy exploring and happy reading! 🌟📖
          </p>
          <div class="hero_btn-continer">
            <a href="{{ route('login') }}" class="call_to-btn btn_white-border">
              <span>
                Login
              </span>
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
    <section class="about_section layout_padding">
      <div class="container">
        <h2 class="main-heading">
          About Campus
        </h2>
        <p class="text-center">
            Visi:
            National Leading and Globaly Competitive Polytechnic. <br>
            Misi:
            Meningkatkan mutu, akses, dan relevansi pendidikan politeknik untuk menghasilkan lulusan sesuai kebutuhan pekerjaan;<br>
            Melakukan penelitian terapan dan pengabdian masyarakat untuk mengatasi persoalan industri dan masyarakat.
        </p>
        <div class="about_img-box">
          <img src="{{ asset('images/kids.jpg') }}" alt="" class="img-fluid w-100">
        </div>
        <div class="d-flex justify-content-center mt-5">
          <a href="{{ url('https://polindra.ac.id/tentang/') }}" class="call_to-btn">
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
    <section class="teacher_section layout_padding-bottom">
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
              <img class="card-img-top" src="{{ asset('images/teacher-3.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Magi Den</h5>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="{{ asset('images/teacher-4.jpg') }}" alt="Card image cap">
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
    <section class="vehicle_section layout_padding">
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
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
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
          There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
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
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
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
          There are many variations of passages of Lorem Ipsum available, but the majority There are many variations of
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

    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

    <script>
      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
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
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap" async defer></script>
    <!-- end google map js -->
  </div>
  <script>
    let lastScrollTop = 0;
    const navbar = document.querySelector('.header_section');

    window.addEventListener('scroll', function() {
      let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

      if (currentScroll > lastScrollTop) {
        // Scroll ke bawah
        navbar.classList.add('hidden');
      } else {
        // Scroll ke atas
        navbar.classList.remove('hidden');
      }

      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Untuk menangani kasus scroll ke atas dari posisi 0
    });
  </script>

</body>

</html>
