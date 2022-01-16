<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Penjadwalan Distribusi</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="{{asset('semicolon/css/bootstrap.css')}}" type="text/css" />
    <link href="{{asset('keenthemes/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swa2.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('css/confirm.css')}}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar py-3 navbar-expand-md navbar-light navbar-laravel" style="background-color: #7aa5f5;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Penjadwalan Distribusi
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('penjadwalan.index') }}">Penjadwalan Distribusi</a></li>
                        @can('edit user')
                        <li><a class="nav-link" href="{{ route('users.index') }}">Kelola User</a></li>
                        @endcan
                        <li><a class="nav-link" href="{{ route('barang.index') }}">Kelola Barang</a></li>
                        <li><a class="nav-link" href="{{ route('kategori.index') }}">Kelola Kategori</a></li>
                        <li><a class="nav-link" href="{{ route('supplier.index') }}">Kelola Supplier</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>
              
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item nav-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
              
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                  </form>
                              </div>
                          </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4 mb-5">
            <div class="container">
            @yield('content')
            </div>
        </main>
        <br>
        <br>
        <br>
        <footer class="text-center fixed-bottom">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: #7aa5f5;">
              © 2022 Copyright:
              <p class="">Penjadwalan Distribusi</p>
            </div>
            <!-- Copyright -->
          </footer>
    </div>
    
    <script src="{{asset('semicolon/js/jquery.js')}}"></script>
    <script src="{{asset('semicolon/js/plugins.min.js')}}"></script>

    <!-- Footer Scripts ============================================= -->
    <script src="{{asset('semicolon/js/components/star-rating.js')}}"></script>
    <script src="{{asset('semicolon/js/components/bs-filestyle.js')}}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('semicolon/js/functions.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/method.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/confirm.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/swa2.js')}}"></script>
    @yield('script')
</body>
</html>