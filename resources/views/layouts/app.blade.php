<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>VHSYS Rangers - @yield('title', 'Home')</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Favicon -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/png">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

  <!-- Datatables Files -->
  <link rel="stylesheet" href="{{ asset('css/plugins/datatables/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plugins/datatables/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/plugins/datatables/select.bootstrap4.min.css') }}">

</head>
<body>
<div id="app">
  <div class="overlay"></div>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand text-light" href="{{ url('/') }}">
        <svg width="150px" height="30px" viewBox="0 0 413.211 112.19">
          <path d="m111.65 48.18c-0.024-0.129-0.047-0.266-0.073-0.398l-0.029-0.156c-1.333-8.359-6.613-8.752-8.2-8.672-0.115 8e-3 -0.233 0.014-0.348 0.025-1.763 0.173-3.344 1.016-4.345 2.317-1.149 1.497-1.526 3.397-1.123 5.646 0.646 3.204 1.025 6.318 1.059 8.746 0.103 11.046-4.026 21.537-11.623 29.557-7.574 7.99-17.789 12.694-28.765 13.241-0.58 0.026-1.171 0.044-1.751 0.052-11.329 0.104-22.023-4.207-30.116-12.141-8.099-7.941-12.62-18.562-12.729-29.903-0.103-11.021 4.016-21.519 11.599-29.556 7.566-8.02 17.758-12.735 28.707-13.282 0.576-0.028 1.159-0.043 1.738-0.048 4.311-0.122 8.284 0.92 11.786 1.837 2.879 0.754 5.364 1.408 7.491 1.3 2.47-0.12 4.159-1.312 5.461-3.855 0.701-1.617 0.739-3.234 0.103-4.804-0.774-1.923-2.516-3.599-4.664-4.491-6.48-2.446-13.321-3.658-20.303-3.592-0.769 6e-3 -1.546 0.031-2.311 0.07-14.478 0.723-27.94 6.934-37.915 17.495-9.999 10.596-15.431 24.464-15.293 39.056 0.142 14.993 6.105 29.03 16.789 39.517 10.684 10.492 24.809 16.189 39.782 16.048 0.769-9e-3 1.554-0.03 2.312-0.069 14.505-0.729 27.992-6.938 37.98-17.503 10.017-10.591 15.458-24.463 15.318-39.047-0.023-2.704-0.201-5.117-0.537-7.39"
                clip-path="url(#a)"></path>
          <path d="m111.14 4.483c-0.501-0.941-1.172-1.758-1.996-2.445-0.79-0.649-1.647-1.141-2.573-1.485-0.962-0.36-1.959-0.544-2.967-0.544-2.505 0-4.693 1.082-6.163 3.046l-41.103 55.916-13.018-16.877-0.021-0.024-0.019-0.025c-1.553-1.957-3.746-3.031-6.174-3.031-1.118 0-2.197 0.224-3.215 0.673-0.936 0.408-1.772 0.969-2.495 1.664-0.751 0.727-1.352 1.578-1.781 2.53-0.454 0.995-0.688 2.088-0.688 3.227 0 1.025 0.214 1.994 0.635 2.89 0.289 0.593 0.611 1.131 0.979 1.633l0.041 0.054 0.043 0.052 19.379 24.72c0.83 1.037 1.739 1.815 2.728 2.342 1.113 0.585 2.298 0.874 3.548 0.874 1.297 0 2.539-0.334 3.703-0.985 0.999-0.572 1.881-1.341 2.638-2.29l47.639-63.66c0.513-0.629 0.922-1.323 1.219-2.072 0.34-0.84 0.514-1.772 0.514-2.764 0-1.201-0.288-2.354-0.853-3.419"
                clip-path="url(#a)"></path>
          <path d="m164.08 77.166c-0.63 0.797-1.337 1.417-2.116 1.859-0.779 0.441-1.589 0.664-2.429 0.664-0.846 0-1.624-0.189-2.339-0.568-0.718-0.382-1.409-0.988-2.082-1.832l-23.018-29.433c-0.338-0.464-0.623-0.939-0.853-1.423-0.231-0.483-0.349-1.022-0.349-1.608 0-0.803 0.159-1.549 0.475-2.244 0.315-0.695 0.748-1.305 1.296-1.832 0.543-0.525 1.176-0.947 1.892-1.263 0.717-0.316 1.473-0.472 2.273-0.472 1.728 0 3.159 0.717 4.295 2.145l18.533 24.257 18.373-24.384c1.009-1.345 2.399-2.018 4.169-2.018 0.755 0 1.505 0.134 2.239 0.409 0.738 0.272 1.41 0.661 2.022 1.167 0.608 0.505 1.093 1.094 1.453 1.768 0.357 0.673 0.538 1.389 0.538 2.147 0 0.676-0.106 1.275-0.318 1.8-0.212 0.526-0.506 1.021-0.885 1.483l-23.169 29.378z"
                clip-path="url(#a)"></path>
          <path d="m243.26 74.072c0 3.662-1.979 5.496-5.935 5.496-3.92 0-5.876-1.834-5.876-5.496v-19.923c0-3.075-3.433-4.611-10.292-4.611h-17.354v24.534c0 3.662-1.979 5.496-5.937 5.496-3.915 0-5.873-1.834-5.873-5.496v-42.467c0-3.621 1.958-5.43 5.873-5.43 3.958 0 5.937 1.809 5.937 5.43v7.389h15.208c16.165 0 24.249 5.008 24.249 15.026v20.052z"
                clip-path="url(#a)"></path>
          <path d="m300.99 66.363c0 8.629-5.915 12.944-17.744 12.944h-31.067c-3.581 0-5.371-1.724-5.371-5.177 0-3.574 1.79-5.367 5.371-5.367h32.394c2.906 0 4.355-0.862 4.355-2.589v0.788c0-1.644-1.746-2.463-5.239-2.463h-17.113c-12.882 0-19.323-4.169-19.323-12.507v-1.089c0-8.081 6.187-12.123 18.563-12.123h8.526c3.659 0 5.496 1.768 5.496 5.304 0 3.494-1.837 5.24-5.496 5.24h-10.358c-3.324 0-4.986 0.716-4.986 2.148v0.205c0 1.517 2.104 2.273 6.313 2.273h17.431c12.168 0 18.25 4.232 18.25 12.692v-0.279z"
                clip-path="url(#a)"></path>
          <path d="m413.21 66.363c0 8.629-5.915 12.944-17.747 12.944h-31.067c-3.58 0-5.37-1.724-5.37-5.177 0-3.574 1.79-5.367 5.37-5.367h32.396c2.902 0 4.354-0.862 4.354-2.589v0.788c0-1.644-1.746-2.463-5.239-2.463h-17.112c-12.888 0-19.326-4.169-19.326-12.507v-1.089c0-8.081 6.187-12.123 18.567-12.123h8.524c3.662 0 5.492 1.768 5.492 5.304 0 3.494-1.83 5.24-5.492 5.24h-10.361c-3.325 0-4.985 0.716-4.985 2.148v0.205c0 1.517 2.103 2.273 6.314 2.273h17.43c12.163 0 18.252 4.232 18.252 12.692v-0.279z"
                clip-path="url(#a)"></path>
          <path d="m355.48 77.343c0 11.283-6.314 16.925-18.945 16.925h-9.221c-3.408 0-5.116-1.768-5.116-5.308 0-3.492 1.708-5.236 5.116-5.236h11.491c3.245 0 5.056-1.473 5.436-4.423h-18.177c-14.358 0-21.533-4.651-21.533-13.956v-21.2c0-3.578 1.979-5.366 5.933-5.366 3.916 0 5.876 1.788 5.876 5.366v21.2c0 2.275 2.78 3.409 8.335 3.409h19.061v-24.608c0-3.578 1.933-5.366 5.808-5.366 3.957 0 5.938 1.788 5.938 5.366v33.197z"
                clip-path="url(#a)"></path>
        </svg>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
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
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

  <main class="py-5">
    @yield('content')
  </main>

</div>

<!--  Core  -->
<script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/all.min.js') }}" defer></script>

<!--  Datatables JS  -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

@stack('footerScripts')

</body>
</html>
