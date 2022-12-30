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
    <title>Showroom Raja Auto</title>

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
	
	<?php include 'header.php'; ?>


	<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
						<div class="row">
							<div class="heading-content col-md-12">
								<p><a href="index.php">Beranda</a> / <em> Hubungi</em></p>
								<h2>Hubungi <em>Kami</em></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<section>
		<div class="contact-content wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="send-message">
							<div class="sep-section-heading">
								<h2>Kirim <em>Pesan</em></h2>
							</div>
							<form action="web/simpan_pesan" method="POST">
								<div class="row">
									<div class=" col-md-4 col-sm-4 col-xs-6">
										<input type="text" class="blog-search-field" name="nama" placeholder="Nama Kamu..." value="">
									</div>
									<div class="col-md-4 col-sm-4 col-xs-6">
										<input type="text" class="blog-search-field" name="email" placeholder="email kamu..." value="">
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" class="subject" name="judul" placeholder="Judul Pesan..." value="">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<textarea id="message" class="input" name="pesan" placeholder="Isi pesan..."></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirim</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-info">
							<div class="sep-section-heading">
								<h2>Informasi <em>Kontak</em></h2>
							</div>
							<p>Terima kasih atas kunjungan anda ke website Raja Auto </p>
							<p>
							Untuk menghubungi kantor pusat Raja Auto, silahkan menghubungi alamat di bawah ini.</p>
							<div class="info-list">
								<ul>
									<li><i class="fa fa-phone"></i><span>0852-6645-6789</span></li>
									<li><i class="fa fa-envelope"></i><span>-</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-12">
						
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php include 'footer.php'; ?>
	

	<script src="front/assets/js/jquery-1.11.0.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 	<script type="text/javascript"><?php echo $this->session->userdata('message') ?></script>

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

    <!-- Google Map -->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="front/assets/js/jquery.gmap3.min.js"></script>

	<!-- Google Map Init-->
   <!-- <script>
		// Initialize and add the map
		function initMap() {
		  // The location of Uluru
		  var uluru = {lat: 50.688363, lng: 10.436397};
		  // The map, centered at Uluru
		  var map = new google.maps.Map(
		      document.getElementById('map'), {zoom: 4, center: uluru});
		  // The marker, positioned at Uluru
		  var marker = new google.maps.Marker({position: uluru, map: map});
		}
    </script> -->
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&amp;callback=initMap">
    </script> -->

</body>

</html>