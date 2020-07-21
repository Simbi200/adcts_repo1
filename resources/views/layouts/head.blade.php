<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageName')</title>
          <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
          <script src="{{ asset('js/popper.min.js') }}"></script>
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>  --}}
    {{--  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  --}}


    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    {{--  <link rel="stylesheet" href="css/line-awesome.css">  --}}
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </head>

  <body style="font-size: 0.9rem;">
    <div class="p-0" id="app">
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" href="/"><i class="las la-home mr-1"></i>Home</a>
          </li>




          <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="las la-briefcase mr-1"></i>Portfolio</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="impact"><i class="las la-hands-helping mr-1"></i>Our Impact</a>

                <a class="dropdown-item" href="podcasts"><i class="las la-headphones-alt mr-1"></i>Podcasts</a>

                <a class="dropdown-item" href="gallery"><i class="las la-image mr-1"></i>Gallery</a>

              </div>
          </li>

          <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="las la-user-friends mr-1"></i>Staff</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="employees"><i class="las la-user-friends mr-1"></i>All Staff</a>

                <a class="dropdown-item" href="{{ route('login') }}"><i class="las la-sign-in-alt mr-1"></i>Login</a>

              </div>
          </li>

          <li class="nav-item">
                <a class="nav-link" href="partners"><i class="las la-clone mr-1"></i>Partners</a>
          </li>

          <li class="nav-item">
                <a class="nav-link" href="aboutus"><i class="las la-info mr-1"></i>About</a>
          </li>

          <li class="nav-item">
                <a class="nav-link" href="contact"><i class="las la-envelope mr-1"></i>Contact Us</a>
          </li>
          </ul>
        </div>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @if(!Auth::guest())
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="las la-user mr-1"></i>{{ Auth::user()->username }} <i class="las la-caret px-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
          @endif
        </ul>
      </nav>

      @yield('content')
    </div>

    {{--  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>  --}}

    {{--  <script src="js/main.js"></script>  --}}


      <script src="js/bootstrap.bundle.js"></script>



  </body>
</html>

