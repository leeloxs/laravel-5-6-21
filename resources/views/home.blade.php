<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome to LetsPhilanthropy!</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


	<link rel="stylesheet" href="css/styles.css">

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
                            <li><a class="nav-link" href="/contactus">Contact us</a></li>

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

        <main class="py-4" style="background-color: #B0E0E6;">
            @yield('content')
        </main>
    </div>          

            
            <div class="fh5co-hero" style="background-color: #B0E0E6;">
			<div class="fh5co-overlay"></div>"
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);>
				<div class="desc animate-box">
					<h2>Your donation can help <strong>LetsPhilonthropy</strong> deliver a charity and benevolence to people in need and increase the solidarity among the community</h2>
					<br><h4>Philanthropy made easy!</h4> <br><br>
					<span><a class="btn btn-primary btn-lg" href="/donate">Donate Now</a><br><br><br><br></span>
				</div>
			</div>

            <br><br>

            






            
            <br><br>
            <div class="fh5co-hero">
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
				<div class="desc animate-box">
                   
                  <h3>Our Philantrophists</h3>
                  
                  <p>Take a leap of faith, your kindness could mean the world to people!</p>
                  <br><br>
                  <div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="img/h1.jpeg" alt="user" style="width:140px;height:140px; border-radius: 50%;" >
							</figure>
							<blockquote>
								<p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;">&ldquo;Knowing that you could help those who are in need easily by donating your items is heartwarming. &rdquo;</p>
							</blockquote>
							<span style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;"><b>Hasyudeen Yusoff, Tabung Haji</b></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="img/h2.jpeg" alt="user" style="width:140px;height:140px; border-radius: 50%;">
							</figure>
							<blockquote>
								<p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;">&ldquo;LetsPhilanthropy bridges the gap between all levels of society and encourages the general public to be more thoughtful of our community.&rdquo;</p>
							</blockquote>
							<span style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;"><b>Rina harus, Minister of Women, Family & Community</b></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="img/h3.jpg" alt="user" style="width:140px;height:140px; border-radius: 50%;">
							</figure>
							<blockquote>
								<p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;">&ldquo;To empower, help and strengthen the community by encouraging people to be thoughtful and mindful of those in need within our community, LetsPhilanthropy does exactly that. &rdquo;</p>
							</blockquote>
							<span style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;"><b>Ali Mohammed, Co-founder LetsPhilanthropy</b></span>
						</div>
					</div>
				</div>
			</div>
				</div>
			</div>

                                

</body>
</html>