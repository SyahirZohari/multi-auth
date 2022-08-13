<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pre-Internship System for CSS266</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
        
        <!-- CSS
        ================================================== -->
        <!-- Themefisher Icon font -->
        <link rel="stylesheet" href="{{ asset('bingo/plugins/themefisher-font/style.css') }}" >
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="{{ asset('bingo/plugins/bootstrap/css/bootstrap.min.css') }}" >
        <!-- Lightbox.min css -->
        <link rel="stylesheet" href="{{ asset('bingo/plugins/lightbox2/dist/css/lightbox.min.css') }}" >
        <!-- animation css -->
        <link rel="stylesheet" href="{{ asset('bingo/plugins/animate/animate.css') }}" >
        <!-- Slick Carousel -->
        <link rel="stylesheet" href="{{ asset('bingo/plugins/slick/slick.css') }}" >
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ asset('bingo/css/style.css') }}" >  

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body id="body">
        <!--
Fixed Navigation
==================================== -->
<header class="navigation fixed-top">
    <div class="container">
      <!-- main nav -->
      <nav class="navbar navbar-expand-lg navbar-light">
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Login
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('login.student') }}">Student</a>
                <a class="dropdown-item" href="{{ route('login.lecturer') }}">Lecturer</a>
                <a class="dropdown-item" href="{{ route('login.industry') }}">Industry</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Register
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('register.student') }}">Student</a>
                  <a class="dropdown-item" href="{{ route('register.lecturer') }}">Lecturer</a>
                  <a class="dropdown-item" href="{{ route('register.industry') }}">Industry</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- /main nav -->
    </div>
  </header>
  <!--
  End Fixed Navigation
  ==================================== -->
  
  
      <div class="hero-slider">
      <div class="slider-item th-fullpage hero-area" style="background-image: url({{asset('bingo/images/slider/slider-bg-1.jpg')}})">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Pre-Internship System for CS266 <br>
                          in UiTM Jasin</h1>
                      <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, <br> veritatis tempore nostrum id
                          officia quaerat eum corrupti, <br> ipsa aliquam velit.</p>
                      <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn btn-main" href="">Explore Us</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="slider-item th-fullpage hero-area"  style="background-image: url({{asset('bingo/images/slider/slider-bg-2.jpg')}})" >
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h1 data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">We Combine Design <br> and
                          Creativity</h1>
                      <p data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5">Create just what you need
                          for your Perfect Website. Choose from a wide range
                          <br> of Elements & simply put them on our Canvas.</p>
                      <a data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".8"  class="btn btn-main" href="">Explore Us</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  
  
  <footer id="footer" class="bg-one">
    <div class="footer-bottom">
      <h5>Copyright 2016. All rights reserved.</h5>
      <h6>Design and Developed by <a href="">Themefisher</a></h6>
    </div>
  </footer> <!-- end footer -->
  
  
      <!-- end Footer Area
      ========================================== -->
      
  
      
      <!-- 
      Essential Scripts
      =====================================-->
      <!-- Main jQuery -->
      <script src="{{ asset('bingo/plugins/jquery/jquery.min.js') }}" ></script>
      <!-- Google Map -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
      <script  src="{{ asset('bingo/plugins/google-map/gmap.js') }}" ></script>
  
      <!-- Form Validation -->
      <script src="{{ asset('bingo/plugins/form-validation/jquery.form.js') }}" ></script> 
      <script src="{{ asset('bingo/plugins/form-validation/jquery.validate.min.js') }}" ></script>
      
      <!-- Bootstrap4 -->
      <script src="{{ asset('bingo/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
      <!-- Parallax -->
      <script src="{{ asset('bingo/plugins/parallax/jquery.parallax-1.1.3.js') }}" ></script>
      <!-- lightbox -->
      <script src="{{ asset('bingo/plugins/lightbox2/dist/js/lightbox.min.js') }}" ></script>
      <!-- Owl Carousel -->
      <script src="{{ asset('bingo/plugins/slick/slick.min.js') }}" ></script>
      <!-- filter -->
      <script src="{{ asset('bingo/plugins/filterizr/jquery.filterizr.min.js') }}" ></script>
      <!-- Smooth Scroll js -->
      <script src="{{ asset('bingo/plugins/smooth-scroll/smooth-scroll.min.js') }}" ></script>
      
      <!-- Custom js -->
      <script src="{{ asset('bingo/js/script.js') }}" ></script>
        
        

    </body>
</html>

