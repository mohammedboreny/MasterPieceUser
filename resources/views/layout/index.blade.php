<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/fevicon.png') }}" type="">

    <title> Fruise </title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" />

    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
    <div class="hero_area">
        <div class="hero_bg_box">
            <img src="{{ asset('images/slider-bg.jpg') }}" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid ">
                    <div class="header_top_content">
                        <a class="navbar-brand d-none d-lg-flex" href={{ route('home.index') }}>
                            <span>
                                Parko
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg  custom_nav-container ">
                        <a class="navbar-brand d-flex d-lg-none " href="{{ route('home.index') }}">
                            <span>
                                Fruise
                            </span>
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
                                <li class=" nav-item {{ request()->is('home.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home.index') }}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item {{ request()->is('services') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('services') }}">Services</a>
                                </li>
                                <li class="nav-item {{ request()->is('aboutUs') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('aboutUs') }}"> About</a>
                                </li>
                                <li class="nav-item {{ request()->is('contactUs.view') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('contactUs.view') }}">Contact Us</a>
                                </li>

                                @auth
                                    <li class="nav-item">
                                        {{ auth()->user()->name }}
                                        <div class="text-end">
                                            <a href="{{ route('logout.perform') }}"
                                                class="btn btn-outline-light me-2">Logout</a>
                                        </div>
                                    </li>
                                @endauth
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login.show') }}"> <i class="fa fa-user"
                                                aria-hidden="true"></i>
                                            Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register.show') }}"> <i class="fa fa-user"
                                                aria-hidden="true"></i>
                                            Sign Up</a>
                                    </li>
                                @endguest
                                {{-- <form class="form-inline">
                                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    </div>
    <!-- end header section -->






    @yield('content')










    <!-- info section -->

    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="info_detail">
                        <h4>
                            About
                        </h4>
                        <p>
                            Necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin words, combined with a handful
                        </p>
                        <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="info_contact">
                        <h4>
                            Address
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="info_contact">
                        <h4>
                            Subscribe
                        </h4>
                        <form action="{{ route('newsLetter.store') }}" method="post">
                            @csrf
                            <input name="email" type="text" placeholder="Enter email" />
                            <button type="submit">
                                Subscribe
                            </button>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info-col">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section">

    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
</body>

</html>
