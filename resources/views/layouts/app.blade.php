<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'nutri4share') }}</title>

    <!-- Styles -->
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('css/app/novo.css') }}">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app/home-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>  
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid navbar-app-main">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-main-collpse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="nutri4share_logo" src="https://trello-attachments.s3.amazonaws.com/58e41a949cb540d7ac109e83/5916556c399387350c662ff9/07f9b5166d294543c6f28f35b0609728/nutriforshare_newLogo_sem_fundo.png">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="top-navbar-main-collpse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/profile/{{ Auth::user()->username }}">
                            {{ Auth::user()->name }}
                            <img class="img-profile-main-navbar" src="https://pickaface.net/assets/images/slides/slide4.png">
                        </a>
                    </li>
                    <li>
                        <a href="/">
                            <span class="glyphicon glyphicon-align-justify"></span>
                            Home
                        </a>
                    </li>
                    <li class="dropdown top-menu-main">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="/posts/create">Create Post</a></li>
                            <li><a href="/posts">Feed</a></li>
                            <li><a href="#">Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.min.js') }}"></script>
    <!--<script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
</body>
</html>