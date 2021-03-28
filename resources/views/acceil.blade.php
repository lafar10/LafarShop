 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" image="image/x-icon" href="Icon/cover.png">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
     <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
     <title>Document</title>
     <style>
         #navbarSupportedContent{
             margin-left:270px;
             font-family: 'Comic Sans MS', cursive;
         }

         .navbar{

             box-shadow:0 5px 40px  rgba(0, 0, 0, .2);
         }
         #icons{
             list-style-type: none;
             display:flex;

         }
         #toggle{
             color:#2c3e50;
         }
         #IconsNav{
            list-style-type:none;
            display:flex;
            margin-top: 15px;
            margin-right:50px;
            font-size:20px;
         }
         #IconsNav i:hover{
            color:#95a5a6;
            transform: rotate(7deg);

         }
         #IconsNav i{
            color:#2c3e50;
         }
         #badgee{
             font-size: 11px;
         }
         .navbar-brand{
             margin-left:35px;
             font-family: 'comic-sans-s',cursive;
         }
         #laicon{
            width:50px;
            height:35px;
            margin-bottom:5px;
         }
         .carousel-item img{
             height:500px;
             width:1000px;
         }
         .card{
             width:300px;
             height:420px;
             border-radius: 0%;
         }
         .card img{
            width:298px;
            height: 250px;
         }
         .card-body{
             text-align:center;
         }
         #cartadd{
             width:100%;
             border-radius:0%;
         }
         #cartadd:hover{
             color:#d63031;
             background-color:white;
         }
         h6{
             text-decoration:line-through;
             font-family:'comic-sans-s',cursive;
         }
         h5{
             font-family:'comic-sans-s',cursive;
         }
         h4{
             font-family:'comic-sans-s',cursive;
         }
         footer{
             background-color:#dfe4ea;
         }
     </style>
 </head>
 <body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="Icon/profile.png" id="laicon">LAStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span id="toggle" class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Latest <span  class="badge rounded-pill bg-danger">Hot</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Shop
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About</a>
                    </li>
                </ul>
                <ul id="IconsNav">
                    <li class="nav-item">
                                    <a href="" ><i id="basket_icon" class="fas fa-shopping-basket"></i><span id="badgee" class="badge rounded-pill bg-danger text-white">4</span></a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="nav-item">
                                    <a href="" >
                                        <i class="far fa-heart"></i>
                                    </a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="nav-item">
                        <form >
                            <i class="fas fa-search"></i>
                            <input type="text" style="width:160px;border-top:none;border-left:none;border-right:none;" placeholder="search"></input>
                        </form>

                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user"></i> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
<br>
        <main >
           <div class="container">
            @yield('content')
           </div>
        </main>
 <footer>
<br>
<br>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-about wow fadeInUp">
                    <h3>About us</h3>
                    <p>
                        We are a young company always looking for new and creative ideas to help you with our products in your everyday work.
                    </p>
                    <p>&copy; Company Inc.</p>
                </div>
                <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
                    <h3>Contact</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Via Rossini 10, 10136 Turin Italy</p>
                    <p><i class="fas fa-phone"></i> Phone: (0039) 333 12 68 347</p>
                    <p><i class="fas fa-envelope"></i> Email: <a href="mailto:hello@domain.com">hello@domain.com</a></p>
                    <p><i class="fab fa-skype"></i> Skype: you_online</p>
                </div>
                <div class="col-md-4 footer-links wow fadeInUp">
                    <div class="row">
                        <div class="col">
                            <h3>Links</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><a class="scroll-link" href="#top-content">Home</a></p>
                            <p><a href="#">Features</a></p>
                            <p><a href="#">How it works</a></p>
                            <p><a href="#">Our clients</a></p>
                        </div>
                        <div class="col-md-6">
                            <p><a href="#">Plans &amp; pricing</a></p>
                            <p><a href="#">Affiliates</a></p>
                            <p><a href="#">Terms</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                   <div class="col footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
               </div>
        </div>
    </div>
</footer>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://kit.fontawesome.com/aea6f500cc.js" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>
</html>
