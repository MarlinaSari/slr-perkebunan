<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SLR & SES</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Styling untuk sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fffcfc;
            position: fixed;
            height: 100%;
            padding: 20px;
            overflow-y: auto;
        }
        .sidebar-header {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar-menu {
            list-style-type: none;
            padding: 0;
        }
        .sidebar-menu li {
            margin: 10px 0;
        }
        .sidebar-menu li a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            display: block;
            transition: background 0.3s;
        }
        .sidebar-menu li a:hover {
            background-color: #495057;
        }
        .sidebar-submenu {
            list-style-type: none;
            padding-left: 20px; /* Memberi indentasi pada submenu */
            display: none; /* Secara default, sembunyikan submenu */
        }
        .sidebar-menu li:hover > .sidebar-submenu {
            display: block; /* Tampilkan submenu saat hover */
        }
        .content {
            margin-left: 260px; /* Offset untuk sidebar */
            padding: 20px;
        }
        .navbar-nav .nav-item .nav-link {
            color: #000000;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"> Sistem Prediksi SLR dan SES </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

        <div class="sidebar">
            <div class="sidebar-header">Menu</div>
            <ul class="sidebar-menu">
                @if(auth()->check() && auth()->user()->role == 'admin') 
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                    <li><a href="{{ route('data-produksi.index') }}">Data Produksi</a></li>                      
                    <li><a href="#">Data Prediksi</a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('kakao.index') }}">Data Kakao</a></li>
                            <li><a href="{{ route('kelapa.index') }}">Data Kelapa</a></li>
                            <li><a href="{{ route('sawit.index') }}">Data Sawit</a></li>
                            <li><a href="{{ route('kopi.index') }}">Data Kopi</a></li>
                            <li><a href="{{ route('karet.index') }}">Data Karet</a></li>
                        </ul>  
                    </li>
                    <li><a href="{{ route('data-grafik.index') }}">Data Grafik</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Data User</a></li>

                @elseif(auth()->user())
                    <li><a href="{{ route('user.dashboard') }}">Dashboard User</a></li>
                    <li>
                        <a href="#">Data Produksi</a>
                        <ul class="sidebar-submenu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('data-produksi.index') }}">Data Produksi</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Data Prediksi</a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('kakao.index') }}">Data Kakao</a></li>
                            <li><a href="{{ route('kelapa.index') }}">Data Kelapa</a></li>
                            <li><a href="{{ route('sawit.index') }}">Data Sawit</a></li>
                            <li><a href="{{ route('kopi.index') }}">Data Kopi</a></li>
                            <li><a href="{{ route('karet.index') }}">Data Karet</a></li>
                        </ul>  
                    </li>
                    <li><a href="{{ route('data-grafik.index') }}">Data Grafik</a></li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); 
                       document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                </li>
            </ul>
        </div>

        <main class="content">
            @yield('content') <!-- Bagian konten utama -->
        </main>
    </div>

    @yield('scripts') <!-- Menambahkan skrip jika diperlukan -->
</body>
</html>
