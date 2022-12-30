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
	
	<?php include 'header.php'; ?>


	<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
						<div class="row">
							<div class="heading-content col-md-12">
								<p><a href="index.php">Beranda</a> / <em> Mobil</em> / <em> Daftar Mobil</em></p>
								<h2>Daftar <em>Mobil</em></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="on-listing wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
		<div class="container">
			<div class="recent-car-content">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="row">

							<?php foreach ($list_mobil->result() as $rw): ?>

							<div class="col-md-12">
								<div class="car-item">
									<div class="row">
										<div class="col-md-5">
											<div class="thumb-content">
												<div class="car-banner">
													<a href="#"><?php echo $rw->transisi ?></a>
												</div>
												<div class="thumb-inner">
													<a href="web/detail_mobil/<?php echo $rw->id_mobil ?>"><img src="image/mobil/<?php echo $rw->gambar ?>" alt=""></a>
												</div>
											</div>
										</div>
										<div class="col-md-7">
											<div class="down-content">
												<a href="web/detail_mobil/<?php echo $rw->id_mobil ?>"><h4><?php echo $rw->judul ?></h4></a>
												<span>Rp. <?php echo number_format($rw->harga) ?></span>
												<div class="line-dec"></div>
												<p><?php echo substr($rw->deskripsi, 0,100) ?>..</p>
												<ul class="car-info">
													<li><div class="item"><i class="flaticon flaticon-fuel"></i><p><?php echo $rw->bahan_bakar ?></p></div></li>
													<li><div class="item"><i class="flaticon flaticon-speed"></i><p><?php echo $rw->kecepatan ?></p></div></li>
													<li><div class="item"><i class="flaticon flaticon-motor"></i><p><?php echo $rw->kapasitas_bahan_bakar ?></p></div></li>
												</ul>
												<div class="secondary-button" style="margin-top: 10px;">
													<!-- <a href="image/file/<?php echo $rw->brosur ?>" target="_blank"><i class="fa fa-download"></i> Download Brosur</a> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<?php endforeach ?>

							<div class="col-md-12">
								<?php echo $pagination ?>
							</div>
							
							<!-- <div class="col-md-12">
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
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include 'footer.php'; ?>
	

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