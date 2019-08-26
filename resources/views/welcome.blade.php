<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VHSYS Rangers</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
      html, body {
        /*background-color: #fff;*/
        background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
        /*color: #636b6f;*/
        color: #ffffff;
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
  <body>
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">
          VHSYS Rangers Team
        </div>
        <div class="links">
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/admin') }}" class="text-light">Admin</a>
            @else
              <a href="{{ route('login') }}" class="text-light">Login</a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-light">Register</a>
              @endif
            @endauth
          @endif
        </div>
      </div>
    </div>
  </body>
</html>
