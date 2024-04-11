<?php if (isset($_SESSION) == false): ?>
  <?php session_start(); ?>
<?php endif ?>

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <?php if (Session::get('theme') == null || Session::get('theme') == 'dark'): ?>
      <link rel="stylesheet" type="text/css" href="{{ asset('css/dark.css') }}">
  <?php endif; ?>
  

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
  </script>
</head>
<body>
  <div id="app">
    <nav id="nav-bar-top">
      <ul>
        <li>
          <a href="/home">
            Home
          </a>
        </li>

        <li>
          <a href="{{ url('/home') }}">
              <img src="/img/logo.jpg" class="" height="35px;">
          </a>
        </li>

    <form id="theme" action="/session" method="post">
      {{ csrf_field() }}
      <?php if (Session::get('theme') !== null): ?>
        <?php if (Session::get('theme') == 'dark'): ?>
          <input type="text" name="session_theme" readonly hidden value='light'>
        <?php else: ?>
          <input type="text" name="session_theme" readonly hidden value='dark'>
        <?php endif; ?> 
      <?php else: ?>
        <input type="text" name="session_theme" readonly hidden value='dark'>
      <?php endif ?>
    </form>

    <li class="float-right">
    <?php if (Session::get('theme') !== null): ?>
        <?php if (Session::get('theme') == 'dark'): ?>
          <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Light Mode</a>
        <?php else: ?>
          <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Dark Mode</a>
        <?php endif; ?> 
      <?php else: ?>
        <a href="/session" onclick="event.preventDefault(); document.getElementById('theme').submit();">Dark Mode</a>
    <?php endif ?> 
    </li>
        @if (Auth::guest())
          <li class="float-right"><a href="{{ route('login') }}">Login</a></li>
          <li class="float-right"><a href="{{ route('register') }}">Register</a></li>
        @else
          <li class="float-right"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          <li class="float-right"><a href="/home">Welcome {{ Auth::user()->name }}!</a></li>
        @endif
      </ul>
    </nav>

      <div id="contain">

        @yield('content')
        
      </div>
  </div>

  <!-- lightbox popup div -->
  <div id="light" class="white_content">
      <div id="lightbox-content"></div> 
      <div class="lb-close">
          <button class="lightbox-close" type="button">close</button>
      </div>
  </div>
  <div id="fade" class="black_overlay"></div>
  <!-- lightbox popup div end -->

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
