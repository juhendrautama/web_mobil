<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Car Dealer Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url() ?>">

    <title>Show Room Mobil - CV. Bikito</title>

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="front/assets/css/bootstrap.css">
	<link rel="stylesheet" href="front/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="front/assets/css/main.css">
	<!-- Slider Pro Css -->
	<link rel="stylesheet" href="front/assets/css/sliderPro.css">
	<!-- Owl Carousel Css -->
	<link rel="stylesheet" href="front/assets/css/owl-carousel.css">
	<!-- Flat Icons Css -->
	<link rel="stylesheet" href="front/assets/css/flaticon.css">
	<!-- Animated Css -->
	<link rel="stylesheet" href="front/assets/css/animated.css">


	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	
	
	<?php include 'preloader.php'; ?>
	
	<div id="search">
	    <button type="button" class="close">×</button>
	    <form>
	        <input type="search" value="" placeholder="type keyword(s) here" />
	        <button type="submit" class="primary-button"><a href="#">Search <i class="fa fa-search"></i></a></button>
	    </form>
	</div>
	
	<header class="site-header wow fadeIn" data-wow-duration="1s">
		<div id="main-header" class="main-header">
			<div class="container clearfix">
				<div class="logo">
					<a href="index-2.html"></a>
				</div>
				<div id='cssmenu'>
					<ul>
					   	<li><a href='index-2.html'>Homepage</a></li>
					   	<li class='active'><a href='#'>Car Listing</a>
					      	<ul>
					         	<li><a href='#'>Sidebar</a>
					            	<ul>
					               		<li><a href='car_listing_sidebar.html'>Car Listing</a></li>
					               		<li><a href='car_grid_sidebar.html'>Car Grid</a></li>
					            	</ul>
					        	</li>
					         	<li><a href='#'>No Sidebar</a>
					            	<ul>
					               		<li><a href='car_listing_no_sidebar.html'>Car Listing</a></li>
					               		<li><a href='car_grid_no_sidebar.html'>Car Grid</a></li>
					            	</ul>
					         	</li>
					         	<li><a href="single_car.html">Single Car</a></li>
					      	</ul>
					   	</li>
					   	<li class='active'><a href='#'>Blog</a>
					      	<ul>
					         	<li><a href='#'>Sidebar</a>
					            	<ul>
					               		<li><a href='blog_listing_sidebar.html'>Blog Classic</a></li>
					               		<li><a href='blog_grid_sidebar.html'>Blog Grid</a></li>
					            	</ul>
					         	</li>
					         	<li><a href='#'>No Sidebar</a>
					            	<ul>
					               		<li><a href='blog_listing_no_sidebar.html'>Blog Classic</a></li>
					               		<li><a href='blog_grid_no_sidebar.html'>Blog Grid</a></li>
					            	</ul>
					         	</li>
					         	<li><a href="single_post.html">Single Post</a></li>
					      	</ul>		
					   </li>
					   <li><a href='about_us.html'>About Us</a></li>
					   <li><a href='contact_us.html'>Contact Us</a></li>
					   <li>
					   		<a href="#search"><i class="fa fa-search"></i></a>
					   </li>
					</ul>
				</div>
			</div>
		</div>
	</header>


	<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
						<div class="row">
							<div class="heading-content col-md-12">
								<p><a href="index-2.html">Homepage</a> / <em> Blog</em> / <em> Clasic</em></p>
								<h2>Blog <em>Classic</em></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="blog-page">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div class="blog-classic-post">
						<div class="item">
					 		<div class="thumb-content">
								<div class="date-post">
									<a href="single_post.html">20 December</a>
								</div>
								<div class="thumb-inner">
									<a href="single_post.html"><img src="assets/images/big_blog_01.jpg" alt=""></a>
								</div>
							</div>
							<div class="down-content">
								<a href="single_post.html"><h4>Pabst Gastropub Synth Edge</h4></a>
								<ul>
									<li><span><em>Posted by:</em><a href="#">Admin</a></span></li>
									<li><span><em>Posted on:</em>20/December/2018</span></li>
									<li><span><em>Categories:</em><a href="#">Creative</a>,<a href="#"> Graphic</a></span></li>
								</ul>
								<p>Slow-carb listicle PBR, Schlitz mustache keytar beard art party brunch chia tousled actually. Messenger bag kogi aesthetic elsent master cleanse. Bespoke Marfa migas Austin Helvetica American Apparel before they sold out readymade. Health goth freegan letterpress beard quinoa try-hard narwhal synth gastropub, tote bag ugh heirloom.</p>	
								<div class="text-button">
									<a href="single_post.html">Continue Reading <i class="fa fa-arrow-right"></i></a>
								</div>							
							</div>
					  	</div>
					  	<div class="item">
					 		<div class="thumb-content">
								<div class="date-post">
									<a href="single_post.html">20 December</a>
								</div>
								<div class="thumb-inner">
									<a href="single_post.html"><img src="assets/images/big_blog_02.jpg" alt=""></a>
								</div>
							</div>
							<div class="down-content">
								<a href="single_post.html"><h4>Pabst Gastropub Synth Edge</h4></a>
								<ul>
									<li><span><em>Posted by:</em><a href="#">Admin</a></span></li>
									<li><span><em>Posted on:</em>20/December/2018</span></li>
									<li><span><em>Categories:</em><a href="#">Creative</a>,<a href="#"> Graphic</a></span></li>
								</ul>
								<p>Slow-carb listicle PBR, Schlitz mustache keytar beard art party brunch chia tousled actually. Messenger bag kogi aesthetic elsent master cleanse. Bespoke Marfa migas Austin Helvetica American Apparel before they sold out readymade. Health goth freegan letterpress beard quinoa try-hard narwhal synth gastropub, tote bag ugh heirloom.</p>	
								<div class="text-button">
									<a href="single_post.html">Continue Reading <i class="fa fa-arrow-right"></i></a>
								</div>							
							</div>
					  	</div>
					  	<div class="item">
					 		<div class="thumb-content">
								<div class="date-post">
									<a href="single_post.html">20 December</a>
								</div>
								<div class="thumb-inner">
									<a href="single_post.html"><img src="assets/images/big_blog_03.jpg" alt=""></a>
								</div>
							</div>
							<div class="down-content">
								<a href="single_post.html"><h4>Pabst Gastropub Synth Edge</h4></a>
								<ul>
									<li><span><em>Posted by:</em><a href="#">Admin</a></span></li>
									<li><span><em>Posted on:</em>20/December/2018</span></li>
									<li><span><em>Categories:</em><a href="#">Creative</a>,<a href="#"> Graphic</a></span></li>
								</ul>
								<p>Slow-carb listicle PBR, Schlitz mustache keytar beard art party brunch chia tousled actually. Messenger bag kogi aesthetic elsent master cleanse. Bespoke Marfa migas Austin Helvetica American Apparel before they sold out readymade. Health goth freegan letterpress beard quinoa try-hard narwhal synth gastropub, tote bag ugh heirloom.</p>	
								<div class="text-button">
									<a href="single_post.html">Continue Reading <i class="fa fa-arrow-right"></i></a>
								</div>							
							</div>
					  	</div>
						<div class="page-numbers">
							<div class="pagination-content">
								<ul>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-item">
						<div class="about-us">
							<h2>About Us</h2>
							<p>Irony actually meditation, occupy mumblecore wayfarers organic pickled 90's. Intelligentsia as actually +1 meh photo booth.</p>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item">
						<div class="what-offer">
							<h2>What We Offer ?</h2>
							<ul>
								<li><a href="#">Rent a car now</a></li>
								<li><a href="#">Search for sale</a></li>
								<li><a href="#">Try search form</a></li>
								<li><a href="#">Best daily dealers</a></li>
								<li><a href="#">Weekly lucky person</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item">
						<div class="need-help">
							<h2>Need Help ?</h2>
							<ul>
								<li><a href="#">Modern wheels</a></li>
								<li><a href="#">Awesome spoilers</a></li>
								<li><a href="#">Dynamic Enetrior</a></li>
								<li><a href="#">Save accidents </a></li>
								<li><a href="#">Recorded Racing</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-item">
						<div class="our-gallery">
							<h2>Our Gallery</h2>
							<ul>
								<li><a href="#"><img src="assets/images/gallery_01.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/images/gallery_02.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/images/gallery_03.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/images/gallery_04.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/images/gallery_05.jpg" alt=""></a></li>
								<li><a href="#"><img src="assets/images/gallery_06.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item">
						<div class="quick-search">
							<h2>Quick Search</h2>
							<input type="text" class="footer-search" name="s" placeholder="Search..." value="">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="sub-footer">
						<p>Copyright 2019. All rights reserved by: <a href="#">Cocotemplates</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	

	<script src="front/assets/js/jquery-1.11.0.min.js"></script>

	<!-- Slider Pro Js -->
	<script src="front/assets/js/sliderpro.min.js"></script>

	<!-- Slick Slider Js -->
	<script src="front/assets/js/slick.js"></script>

	<!-- Owl Carousel Js -->
    <script src="front/assets/js/owl.carousel.min.js"></script>

	<!-- Boostrap Js -->
    <script src="front/assets/js/bootstrap.min.js"></script>

    <!-- Boostrap Js -->
    <script src="front/assets/js/wow.animation.js"></script>

	<!-- Custom Js -->
    <script src="front/assets/js/custom.js"></script>

</body>
</html>