<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="{{ route('triphome') }}"><i class="icon-airplane"></i>What a Trip</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li ><a href="{{ route('voice') }}">Connect Your Voice</a></li>
							<li><a href="{{ route('mv') }}">Maverick</a></li>
							<li><a href="{{ route('hotel') }}">Hotel</a></li>
							<li><a href="{{ route('cab') }}">Car</a></li>
							<li><a href="{{ route('flight') }}">Flights</a></li>
							
							<li><a href="contact.html">Contact</a></li>
							<!-- <li><a href="{{ route('google') }}"><img src="{{asset('/frontEnd/images/google-plus.png')}}"> Google LogIn</i></a></li>	 -->
							 @if (Auth::guest())
							<li><a href="{{ route('google') }}"> Google LogIn</i></a>
							
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <b>Logout</b>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif	
							<li><a href="{{ route('logs') }}">Error Log</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
