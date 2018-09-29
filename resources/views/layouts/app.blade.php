<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Heartland') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
		
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">	
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel p-0">
            <div class="container w-full h-full max-w-full  p-0">
                <a class="navbar-brand collapse" :class="{ 'show' : navToggle }" href="{{ url('/') }}">
                    {{ config('app.name', 'Heartland') }}
                </a>
				
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
				
					<!-- Sidebar Collapse Button Toggle -->
					
					
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
							
						@if ( $user = Auth::user() )  <!-- Show Only if Logged In -->
						
							<li class="nav-item nav-toggle" @click="toggleNav">
								<i class="fas fa-caret-left" v-show="navToggle"></i><i class="fas fa-bars"></i><i class="fas fa-caret-right" v-show="!navToggle"></i>
							</li>
							<li class="nav-item search-toggle">
								<i class="fas fa-search" @click="toggleSearch"></i>
								
								<searchform :show="searchToggle"></searchform>
							</li>
						
						@endif
							
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
							<li class="nav-item">
								<a href="#">
									<i class="fas fa-cog"></i>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('logout') }}"
								   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
									<i class="fas fa-sign-out-alt"></i>
									
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</a>
							</li>
                            <?php /*<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    

                                    
                                </div> */ ?>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
				
        <main id="main">
			<div class="container flex max-w-full px-0">
				@if ( $user = Auth::user() ) <!-- Show Sidebar When Logged In -->
					<sidebar :show="navToggle">
					
						<!-- Setup Sidebar Header -->
						<sidebar-header>
							<div class="avatar rounded-full overflow-hidden inline-block" slot="avatar">
								<img src="https://placeimg.com/75/75/people">
							</div>
							<h5 class="user" slot="user">{{ Auth::user()->name }}</h5>
							<div class="company" slot="company">{{ Auth::user()->company }}</div>
						</sidebar-header>
						
						<!-- Setup Menu Links -->
						<sidebar-nav 
							:items="menuItems" :active="'/<?=  Route::getFacadeRoot()->current()->uri(); ?>'" :unread="'32'">
						</sidebar-nav>
						
						<!-- Setup Footer Links -->
						<sidebar-footer 
							:menuitems="footerItems">
						</sidebar-footer>
						
					</sidebar>			
				@endif
				@yield('content')
			</div>
        </main>
    </div>
</body>
</html>
