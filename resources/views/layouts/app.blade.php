<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LRStore</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
</head>
<body>
    @include('sweetalert::alert')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}" ><img src="/Icon/profile.png" id="laicon"><strong >LA</strong>Store</a>
                <button class="navbar-toggler" type="button" align="right" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <ul class="navbar-nav mr-auto"  >
                        <li class="nav-item">
                            <a class="nav-link active"  id="navtent" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="navtent" href="{{route('latest')}}">Latest <span  class="badge rounded-pill bg-danger">Hot</span></a>
                        </li>
                        <li class="nav-item dropdown"  >
                            <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                                <ul class="dropdown-menu"  aria-labelledby="navbarDropdown">
                                    @foreach (App\Categorie::all() as $categorie)
                                        <li><a class="dropdown-item" href="{{route('get.categories',$categorie->id)}}">{{$categorie->categorie_name}}</a></li>
                                    @endforeach
                                </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="navtent" href="#" tabindex="-1" aria-disabled="true">About</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form action="{{route('search')}}" method="get"   style="margin-top: 4px;">
                                @csrf
                                <button id="search_btn" ><i class="fas fa-search"></i></button>
                                <input type="text" name="search" id="search_in" placeholder="search">
                            </form>
                        </li>
                        &nbsp;&nbsp;
                        <li class="nav-item">
                            <a href="{{route('cart-index')}}" ><i id="basket_icon" class="fas fa-shopping-basket"></i><span id="badgee" class="badge rounded-pill bg-danger text-white">{{App\Cart::where('user_id', Auth::id())->where('etat', 'off')->get()->count()}}</span></a>
                        </li>
                        &nbsp;&nbsp;
                        <li class="nav-item">
                            <a href="{{route('my.wish')}}" >
                                <i id="basket_icon" class="far fa-heart"></i><span id="badgee" class="badge rounded-pill bg-danger text-white">{{App\Wish::where('user_id', Auth::id())->get()->count()}}</span>
                            </a>
                        </li>
                        &nbsp;&nbsp;

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" id="navtent" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" id="navtent" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user"></i> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" id="navtent" href="{{ route('myorder.index') }}">
                                        <i class="fas fa-receipt"></i>  My Orders
                                    </a>
                                    <a class="dropdown-item" id="navtent" href="{{route('My.Acount',Auth::id())}}">
                                        <i class="far fa-user"></i>  My Acount
                                    </a>
                                    <a class="dropdown-item" id="navtent" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>

        <br>
        <main class="container">
            @yield('content')
        </main>
    </div>

    <br>
    <hr style="height:1px;color:red;width:100%;">
    <footer>
            <div class="footer-top">
                <div class="container" >
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4" style="margin-left:50px;">
                        <div class="col">
                            <h3>About us</h3>
                            <p>
                                We are a young company always looking for new and creative ideas to help you with our products in your everyday work.
                            </p>
                            <p>&copy; Company Inc.</p>
                        </div>
                        <div class="col">
                            <h3>Contact</h3>
                            <p><i class="fas fa-map-marker-alt"></i> Boulvard Mohamed V, 25350 OuedZem Maroc</p>
                            <p><i class="fas fa-phone"></i> Phone: +(212) 623 79 35 49</p>
                            <p><i class="fas fa-envelope"></i> Email: <a href="mailto:hello@domain.com">ayoub_lafar@hotmail.com</a></p>
                            <p><i class="fab fa-facebook"></i> Facebook: Ayoub Lafar</p>
                        </div>
                        <div class="col">
                            <h3>Categories Links</h3>
                                        @foreach (App\Categorie::all() as $categorie)
                                         <a  href="{{route('get.categories',$categorie->id)}}">{{$categorie->categorie_name}}</a><br>
                                        @endforeach
                        </div>
                        <div class="col">
                            <h3>Follow US</h3>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                      </div>
                    </div>
                </div>
            <div class="footer-bottom">
                <p class="text-right text-muted">created with <i style="color:#eb4d4b;" class="fa fa-heart"></i> by Lafar Ayoub</i></a> | <span>v. 1.0</span></p>

            </div>
        </footer>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="{{ asset('js/owl.carousel.js') }}" ></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
    <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <script src="https://kit.fontawesome.com/aea6f500cc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
 @yield('scripts')
</body>
</html>
