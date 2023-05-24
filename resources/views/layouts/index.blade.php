<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ALFASOFT</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css?' . time(), Request::secure()) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?' . time(), Request::secure()) }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png?' . time(), Request::secure()) }}">

    <link rel="stylesheet" href="{{ asset('assets/css/line.css?' . time(), Request::secure()) }}">

    <script src="https://code.iconify.design/3/3.0.1/iconify.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a3000fd09d.js" crossorigin="anonymous"></script>

</head>

<body class="layout-light side-menu">
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href=""><img class="dark" src="{{ asset('assets/img/logo-black.png', Request::secure()) }}" alt="logo"></a>
                    <a href="#" class="sidebar-toggle"><img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg', Request::secure()) }}" alt="img"></a>
                </div>
            </div>

            <div class="navbar-right">
                <ul class="navbar-right__menu">

                    @auth
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><i class="uil uil-user"></i>
                                <span class="nav-item__title">{{ Auth::user()->name }}<i class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                            <i class="uil uil-user"></i>
                                        </div>
                                        <div>
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <span class="text-uppercase">{{ Auth::user()->type }}</span>
                                        </div>
                                    </div>
                                    <div class="nav-author__options">
                                        <ul>
                                            <li><a href="/"><i class="uil uil-home"></i> Home</a></li>
                                        </ul>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <a href="/logout" class="nav-author__signout" onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="uil uil-sign-out-alt"></i> Logout</a>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                    @endauth

                    @guest
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><i class="uil uil-user"></i>
                                <span class="nav-item__title">Auth<i class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__options">
                                        <ul>
                                            <li><a href="/login"><i class="uil uil-user"></i> Login</a></li>
                                            <li><a href="/register"><i class="uil uil-user"></i> Register</a></li>
                                        </ul>
                                        <a href="" class="nav-author__signout"></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                    @endguest

                </ul>
                <div class="navbar-right__mobileAction d-md-none">
                    <a href="#" class="btn-author-action"><img class="svg" src="{{ asset('assets/img/svg/more-vertical.svg', Request::secure()) }}" alt="more-vertical"></a>
                </div>
            </div>

        </nav>
    </header>

    <main class="main-content">

        <div class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse collapsed" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">

                        <li class="">
                            <a href="/">
                                <span class="nav-icon uil uil-home"></span>
                                <span class="menu-text">Home</span>
                            </a>
                        </li>

                        <li class="">
                            <a href="/contacts/create">
                                <i class="fa fa-plus"></i> 
                                <span class="menu-text" style="margin-left: 24px">Contacts</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="contents expanded">
            <div class="border-bottom">
                <br>
                <h1><i class="fa fa-list-check"></i> @yield('title')</h1><br>
            </div>
            <div class="crm mb-25">
                <br>
                @yield('content')
            </div>
        </div>

        <footer class="footer-wrapper expanded">
            <div class="footer-wrapper__inside">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-copyright">
                                <p><span>© 2015-2023</span><a href="#">ALFASOFT</a>, All rights reserved.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-menu text-end">
                                <ul>
                                    @auth
                                    <li><a href="/">Home</a></li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                                Logout</a>
                                        </form>
                                    </li>
                                    @endauth
                                    @guest
                                    <li><a href="/login">Login</a>
                                    </li>
                                    <li><a href="/register">Register</a></li>
                                    @endguest

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <div id="overlayer" class="loader">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/plugins.min.js', Request::secure()) }}"></script>
    <script src="{{ asset('assets/js/script.min.js', Request::secure()) }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('sweetalert::alert')
    @stack('scripts')

</body>

</html>