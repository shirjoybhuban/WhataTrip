
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WhataTrip</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('/frontend/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('/frontend/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.css')}}">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{asset('/frontend/css/superfish.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('/frontend/css/magnific-popup.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('/frontend/css/bootstrap-datepicker.min.css')}}">
	<!-- CS Select -->
	<link rel="stylesheet" href="{{asset('/frontend/css/cs-select.css')}}">
	<link rel="stylesheet" href="{{asset('/frontend/css/cs-skin-border.css')}}">
	
	<link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"> <!-- for notification -->
	<!-- Modernizr JS -->
	<script src="{{asset('/frontend/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script>
// function myFunction() {
//     document.getElementById("myForm").reset();
// }
function clearField() {
if(document.getElementById) {
document.chatform.message.value = "";
}
}
</script>
	</head>
	<body>
		@include('frontEnd.includes.header')
		<!-- end:header-top -->

		<!-- For tostr notification -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script >
			@if(Session::has('message'))										
				var type="{{Session::get('alert-type','info')}}"
				switch(type){
					case 'success':
				         toastr.success("{{ Session::get('message') }}");
				         break;
				         	}
			@endif
		</script>

		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(/frontEnd/images/t.jpg);">
				<div class="desc">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 col-md-5" >
								<div class="tabulation animate-box">
								<form action="/submit"  method="POST" >
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
								  <!-- Nav tabs -->
								   <ul class="nav nav-tabs" role="tablist">
								      <li role="presentation" class="active">
								      	<a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Flights</a>
								      </li>
								      <li role="presentation">
								    	   <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Hotels</a>
								      </li>
								   </ul>

								   <!-- Tab panes -->
									<div class="tab-content">
			
									 <div role="tabpanel" class="tab-pane active" id="flights">
										<div class="row">
											<div class="col-xxs-12 col-xs-6 mt">
												<div class="input-field">
													<label for="from">From:</label>
													<input type="text" class="typeahead form-control" id="from-place" placeholder="ex.Bangladesh" name="currentLoc"   />
												</div>
											</div>
											<div class="col-xxs-12 col-xs-6 mt">
												<div class="input-field">
													<label for="from">To:</label>
													<input type="text" class="typeahead form-control" id="to-place" placeholder="ex.Canada" name="destination"/  >
												</div>
											</div>
										<div >	
											<div class="col-xxs-6 col-xs-6 mt alternate">
												<div class="input-field">
													<label for="date-start">Depature Date:</label>
													<!-- <input type="text" class="form-control" id="date-start" placeholder="mm/dd/yyyy" name="depatureDate"/  > -->
													<input type="date" class="form-control"  placeholder="mm/dd/yyyy" name="depatureDate"/  >
												</div>

											</div>
											<div class="col-sm-6 mt">
												<section>
													<label for="class">Class:</label>
													<select class="cs-select cs-skin-border" name="flightClass">
														<option value="" disabled selected>Select class</option>
														<option value="economy">Economy</option>
														<option value="first">First</option>
														<option value="business">Business</option>
													</select>
												</section>
											</div>
										</div>
											
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Search Flight">
											</div>
										</div>
									 </div>
									
									 <!-- hotel form start -->
								
									 <div role="tabpanel" class="tab-pane" id="hotels">
									 	<div class="row">
											<div class="col-xxs-6 col-xs-6 mt">
												<div class="input-field">
													<label for="from">City:</label>
													<input type="text"  class="typeahead form-control" id="from-place" placeholder="ex.Dhaka" name="hotelCity" />
												</div>
											</div>
											<div class="col-xxs-6 col-xs-6 mt">
												<div class="input-field">
													<label for="from">Country:</label>
													<input type="text"  class="typeahead form-control" id="from-place" placeholder="ex.Bangladesh" name="hotelCountry" />
												</div>
											</div>
											
											<div class="col-sm-12 mt">
												<div class="input-field">
													<label for="from">Room:</label>
													<input type="text" class="form-control" id="from-place"  name="room" placeholder="Require number of room"/>
												</div>
											</div>

											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" onclick="clearField()" value="Search Hotel">
											</div>
										</div>
									 </div>

									 <!-- check for error -->	
									 @if(count($errors)>=1) 
										<ul class="list-group list-group-flush" >
											 @foreach ($errors->all() as $value)
												<li class="list-group-item list-group-item-danger">{{$value}}</li>
											 @endforeach 
										</ul>
									@endif
										<!-- autocompleet -->
									<script type="text/javascript">
    								var path = "{{ route('autocomplete') }}";
    								$('input.typeahead').typeahead({
        							source:  function (query, process) {
       								 return $.get(path, { query: query }, function (data) {
									               return process(data);
									            });
									        }
									    });
									</script>
									 	
					
								 </div>
								 </form>
								</div>
							</div>
					
							<div class="desc2 animate-box">
								<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1" >
									<h2>Exclusive Limited Time Offer</h2>
									<h3>Fly to singapore via Bangladesh</h3>
									<!-- <span class="price">$599</span> -->
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>


		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Hot Tours</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{asset('/frontend/images/place-1.jpg')}}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>New York</h3>
								<span>3 nights + Flight 5*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{asset('/frontend/images/place-2.jpg')}}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Philippines</h3>
								<span>4 nights + Flight 5*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{asset('/frontend/images/place-3.jpg')}}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h3>Hongkong</h3>
								<span>2 nights + Flight 4*Hotel</span>
								<span class="price">$1,000</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Offers <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-features">
			<div class="container">
				<div class="row">
					<div class="col-md-4 animate-box">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-hotairballoon"></i>
							</span>
							<div class="feature-copy">
								<h3>Family Travel</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-search"></i>
							</span>
							<div class="feature-copy">
								<h3>Travel Plans</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="feature-copy">
								<h3>Honeymoon</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 animate-box">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-wine"></i>
							</span>
							<div class="feature-copy">
								<h3>Business Travel</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-genius"></i>
							</span>
							<div class="feature-copy">
								<h3>Solo Travel</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-chat"></i>
							</span>
							<div class="feature-copy">
								<h3>Explorer</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	<div id="fh5co-destination">
			<div class="tour-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul id="fh5co-destination-list" class="animate-box">
							<li class="one-forth text-center" style="background-image: url(/frontend/images/place-1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Los Angeles</h2>
									</div>
								</a>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/place-2.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Hongkong</h2>
									</div>
								</a>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/ita1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Italy</h2>
									</div>
								</a>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/phi1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Philippines</h2>
									</div>
								</a>
							</li>

								<li class="one-forth text-center" style="background-image: url(/frontend/images/j1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Japan</h2>
									</div>
								</a>
							</li>
							<li class="one-half text-center">
								<div class="title-bg">
									<div class="case-studies-summary">
										<h2>Most Popular Destinations</h2>
										<span><a href="#">View All Destinations</a></span>
									</div>
								</div>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/paris1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Paris</h2>
									</div>
								</a>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/i1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Singapore</h2>
									</div>
								</a>
							</li>
							<li class="one-forth text-center" style="background-image: url(/frontend/images/mada.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Madagascar</h2>
									</div>
								</a>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/eg1.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Egypt</h2>
									</div>
								</a>
							</li>
								<li class="one-forth text-center" style="background-image: url(/frontend/images/i2.jpg); ">
								<a href="#">
									<div class="case-studies-summary">
										<h2>Indonesia</h2>
									</div>
								</a>
							</li>
						</ul>		
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Recent From Blog</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="{{asset('/frontend/images/place-1.jpg')}}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="#">30% Discount to Travel All Around the World</a></h3>
									<span class="posted_by">Sep. 15th</span>
									<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p><a href="#">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="{{asset('/frontend/images/place-2.jpg')}}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="#">Planning for Vacation</a></h3>
									<span class="posted_by">Sep. 15th</span>
									<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p><a href="#">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="{{asset('/frontend/images/place-3.jpg')}}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3><a href="#">Visit Tokyo Japan</a></h3>
									<span class="posted_by">Sep. 15th</span>
									<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p><a href="#">Learn More...</a></p>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-md-block"></div>
				</div>

				<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-outline btn-lg" href="#">See All Post <i class="icon-arrow-right22"></i></a></p>
				</div>

			</div>
		</div>
		<!-- fh5co-blog-section -->
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
					
				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	@include('frontEnd.includes.footer')
	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="{{asset('/frontend/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('/frontend/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('/frontend/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('/frontend/js/sticky.js')}}"></script>

	<!-- Stellar -->
	<script src="{{asset('/frontend/js/jquery.stellar.min.js')}}"></script>
	<!-- Superfish -->
	<script src="{{asset('/frontend/js/hoverIntent.js')}}"></script>
	<script src="{{asset('/frontend/js/superfish.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('/frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('/frontend/js/magnific-popup-options.js')}}"></script>
	<!-- Date Picker -->
	<script src="{{asset('/frontend/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- CS Select -->
	<script src="{{asset('/frontend/js/classie.js')}}"></script>
	<script src="{{asset('/frontend/js/selectFx.js')}}"></script>
	
	<!-- Main JS -->
	<script src="{{asset('/frontend/js/main.js')}}"></script>

	</body>
</html>

