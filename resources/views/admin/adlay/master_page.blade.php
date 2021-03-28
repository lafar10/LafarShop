
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Dashboard Admin Template</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">LR10 Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
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
                                    <i class="far fa-user"></i><span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="{{'Admin/Dashboard' == request()->path() ? 'active' : ''}}">
            <a class="nav-link active" aria-current="page" href="{{route('Admin/Dashboard')}}">
              <span data-feather="home"></span>
              <i class="fas fa-align-left"></i> Dashboard
            </a>
          </li>
          <li class="{{'get.admin.users' == request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{route('get.admin.users')}}">
              <span data-feather="file"></span>
              <i class="fas fa-users"></i> Users
            </a>
          </li>
          <li class="{{'get.admin.orders' == request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{route('get.admin.orders')}}">
              <span data-feather="file"></span>
              <i class="far fa-file"></i> Orders
            </a>
          </li>
          <li class="{{'get.admin.check_orders' == request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{route('get.admin.check_orders')}}">
              <span data-feather="shopping-cart"></span>
              <i class="far fa-copy"></i> Multi Orders
            </a>
          </li>
          <li class="{{'get.products' == request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{route('get.products')}}">
              <span data-feather="users"></span>
              <i class="fas fa-shopping-basket"></i> Products
            </a>
          </li>
          <li class="{{'get.admin.carts' == request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{route('get.admin.carts')}}">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-shopping-cart"></i> Carts
            </a>
          </li>
          <li class="{{'get.admin.categories' == request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{route('get.admin.categories')}}">
              <span data-feather="layers"></span>
              <i class="fas fa-border-none"></i> Categories
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     @yield('content')
    </main>
  </div>
</div>




<script src="https://kit.fontawesome.com/aea6f500cc.js" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
