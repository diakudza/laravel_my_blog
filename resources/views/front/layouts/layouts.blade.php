<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title> @section('title')Diakudza:: @show</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/templatemo-stand-blog.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.css')}}">

</head>

<body>
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="\"><h2>Diakudza Blog<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="\">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="about.html">About Us</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="blog.html">Blog Entries</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="post-details.html">Post Details</a>--}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                    @auth
                        @if(auth()->user()->is_admin)
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link">Админка</a>
                            </li>
                        @endif
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">{{ auth()->user()->name }}</a>
{{--                        <img src="{{auth()->user()->avatar }}">--}}
                        </li>

                    @endauth


                    @guest
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('register.create')}}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>


@yield('main-banner')

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">



                @yield('content')
            </div>
            <div class="col-lg-4">
                @yield('aside')
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Behance</a></li>
                    <li><a href="#">Linkedin</a></li>
                    <li><a href="#">Dribbble</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright {{date('Y')}}.

                        | Coded by Diakudza</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/front/js/custom.js')}}"></script>
<script src="{{ asset('assets/front/js/owl.js')}}"></script>
<script src="{{ asset('assets/front/js/slick.js')}}"></script>
<script src="{{ asset('assets/front/js/isotope.js')}}"></script>
<script src="{{ asset('assets/front/js/accordions.js')}}"></script>

<script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>

</body>
</html>
