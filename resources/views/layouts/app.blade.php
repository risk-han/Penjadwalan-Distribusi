<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/confirm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swa2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="{{asset('keenthemes/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('keenthemes/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/confirm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/summernote.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('users.index') }}">Kelola User</a></li>
                        <li><a class="nav-link" href="{{ route('barang.index') }}">Kelola Barang</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>

    <script src="{{asset('js/confirm.js')}}"></script>
    <script src="{{asset('js/method.js')}}"></script>
    <script src="{{asset('js/plugin.js')}}"></script>
    <script src="{{asset('js/swa2.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->

    <script src="{{asset('semicolon/js/jquery.js')}}"></script>
    <script src="{{asset('semicolon/js/plugins.min.js')}}"></script>
    <script src="{{asset('semicolon/js/components/star-rating.js')}}"></script>
    <script src="{{asset('semicolon/js/components/bs-filestyle.js')}}"></script>
    <script src="{{asset('semicolon/js/functions.js')}}"></script>
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('keenthemes/js/custom/widgets.js')}}"></script>
    <script src="{{asset('keenthemes/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('keenthemes/js/custom/modals/create-app.js')}}"></script>
    <script src="{{asset('keenthemes/js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('keenthemes/js/custom/intro.js')}}"></script>
</body>
</html>