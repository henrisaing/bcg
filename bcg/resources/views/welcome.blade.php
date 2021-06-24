<?php if (isset($_SESSION) == false): ?>
  <?php session_start(); ?>
<?php endif ?>

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BCG</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('img/tile.jpg');
                background-position: center;
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 300;
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
                z-index:2;
            }

            .title {
                font-size: 84px;

            }

            .links > a {
                color: #4488f4;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .white-cover{
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background-color:#fff;
                opacity: 0.4;
                z-index:1;
            }

            .z2{
                z-index:2;
            }
        </style>
    </head>
    <body>
    <div class="white-cover"></div>
        <div class="z2 flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bingo Card Generator
                </div>

                <div class="links">
                    
                </div>
            </div>
        </div>
    </body>
</html>
