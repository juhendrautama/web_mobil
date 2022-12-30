<!DOCTYPE html>
<html lang="id-ID">
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
	<style type="text/css">
		.shym-option-container
		 {  
		    background: lightblue;  
			color: #FFFFFF;
		 
		 }
	</style>


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
	        <input type="search" value="" placeholder="Pencariaan.." />
	        <button type="submit" class="primary-button">Search <i class="fa fa-search"></i></button>
	    </form>
	</div>
	
	<?php include 'header.php'; ?>

	
	<div class="Modern-Slider">
	<?php foreach ($slider->result() as $key => $value): ?>
	  <div class="item">
	    <div class="img-fill">
	      <img src="image/slide/<?php echo $value->image ?>" style="max-width:100%;max-height:100%; height: auto;" alt="">
	      
	    </div>
	  </div>
	<?php endforeach ?>
	</div>
	
	</div>



	<!-- <section>
		<div class="call-to-action wow fadeIn" data-wow-duration="0.75s">
			<div class="container">
				<div class="call-to-action-content">
					<div class="row">
						<div class="col-md-12">
							<p>Kami memberikan layanan dan service terbaik, </em> Klik tombol disamping ini jika ingin melihat Brosur</p>
							<div class="secondary-button">
								<a href="#"><i class="fa fa-download"></i> Download Brosur</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->


	<section>
		<div class="recent-cars">
			<div class="container">
				<div class="recent-car-content">
					<div class="row">
						<div class="col-md-12">
							<div class="section-heading">
								<div class="icon">
									<i class="fa fa-car"></i>
								</div>
								<div class="text-content">
									<h2>Mobil Terbaru</h2>
									<span>Tentukan pilihanmu</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">

						<?php foreach ($list_mobil->result() as $rw): ?>
							
						

						<div class="col-md-4 col-sm-6">
							<div class="car-item wow fadeIn" data-wow-duration="0.75s">
								<div class="thumb-content">
									<div class="car-banner">
										<a href="#"><?php echo $rw->transisi ?></a>
									</div>
									<div class="thumb-inner">
										<a href="web/detail_mobil/<?php echo $rw->id_mobil ?>"><img src="image/mobil/<?php echo $rw->gambar ?>" alt=""></a>
									</div>
								</div>
								<div class="down-content">
									<a href="web/detail_mobil/<?php echo $rw->id_mobil ?>"><h4><?php echo $rw->judul ?></h4></a>
									<span>Rp. <?php echo number_format($rw->harga) ?></span>
									<p><?php echo substr($rw->deskripsi, 0,100) ?>..</p>
									<ul class="car-info">
										<li><div class="item"><i class="flaticon flaticon-fuel"></i><p><?php echo $rw->bahan_bakar ?></p></div></li>
										<li><div class="item"><i class="flaticon flaticon-speed"></i><p><?php echo $rw->kecepatan ?></p></div></li>
										<li><div class="item"><i class="flaticon flaticon-motor"></i><p><?php echo $rw->kapasitas_bahan_bakar ?></p></div></li>
									</ul>
									<br>
									<!-- <a href="app/download_brosur/<?php echo $rw->id_mobil ?>" class="btn btn-block btn-primary"><i class="fa fa-download"></i> Download Brosur</a> -->
								</div>
							</div>
						</div>

						<?php endforeach ?>
						
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

</body>
</html>