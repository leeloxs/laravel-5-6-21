<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>About us</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" style= "background-image: url('{{ asset('img/help.jpg')}}');">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"> 
                
                     <img src="/svg/mylogo.svg" style="max-height:50px; border-right:0.5px solid #333;"></a>
                     <div class="pl-1"><b>LetsPhilonthropy</b></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

                            <li><a class="nav-link" href="/donate">Donate</a></li>
                            <li><a class="nav-link" href="{{ route('posts.showPage')  }}">Community</a></li>
                            <li><a class="nav-link" href="/about">About us</a></li>
                            <li><a class="nav-link" href="/contact-form">Contact us</a></li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

        

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href= "{{ url('myprofile')}}" class="dropdown-item">
                                My Profile
                                </a>
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
            @yield('content')
        </main>
    </div>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <!-- About-->

        <style> 
        div.container1{
            margin: auto;
            width: 60%;
            padding: 10px;
        }

        div.one{
        border: 2px solid #000000;
        padding: 30px;
        }

        div.two{
        border: 2px solid #000000;
        padding: 30px;
        }
        </style>
        <div class="container1">
            <div class="grid">
            <h2 style=text-align:center><b>About Us</b></h2>
                <div class="one">
                <img src="img/b2.jpeg" alt="user" style="width:200px;height:200px; border-radius: 50%;"> 
                <div class="first">
                <br><br> 
                    <h1><b>SULTAN SYAFRIUDI</b></h1>
                    <h3>Founder</h3>
                    <p>LetsPhilanthropy's project aims to help people to share their charities among the community in an easy and simple way in one controlled platform. We were inspired by the necessity of giving a donation to the needy people as it essential pillar of Islam and Muslims!</p>
                    <div class="social">
                    <a href="https://www.facebook.com/sultan.syafri"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/+601119544091"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/in/sultan-syafriyudi-/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                </div>
            </div>
            <br><br>
            <div class="two">
                <img src="img/b1.png" alt="user" style="width:200px;height:200px; "> 
                <div class="second">
                <br><br>
                    <h1><b>ALI ALATTAS</b></h1>
                    <h3>Co-Founder</h3>
                    <p>Assisting people is a part of the solidarity of humans by giving a donation which can make a difference in people's lives and spread smile on their faces!</p>
                    <div class="social">
                    <a href="https://www.facebook.com/leeloo.XS/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/+60172912509"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/in/ali-moh-d-alattas-19100018b/"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <br><br>
                    </div>
                </div>
            </div>
        </div>
   