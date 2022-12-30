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
	<style type="text/css">
		/*table {
		  border-collapse: collapse;
		  border-spacing: 0;
		  width: 100%;
		  border: 1px solid #ddd;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}*/

		tr:nth-child(even){background-color: #f2f2f2}

		.dot {
			height: 50px;
			width: 50px;
			border-radius:50%;
			-moz-border-radius:50%;
			-webkit-border-radius:50%;
			background-color: white;
			display: inline-block;
			border:1px solid black;

			/*background-color:#fff;
			border:1px solid red;    
			height:100px;
			border-radius:50%;
			-moz-border-radius:50%;
			-webkit-border-radius:50%;
			width:100px;*/
		}
		.upper { text-transform: uppercase; }
		.lower { text-transform: lowercase; }
		.cap   { text-transform: capitalize; }
		.small { font-variant:   small-caps; }
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
	        <input type="search" value="" placeholder="type keyword(s) here" />
	        <button type="submit" class="primary-button"><a href="#">Search <i class="fa fa-search"></i></a></button>
	    </form>
	</div>
	
	<?php include 'header.php'; ?>

	<?php 
	$detail = $detail_mobil->row();
	 ?>

	<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
						<div class="row">
							<div class="heading-content col-md-12">
								<p><a href="index.php">Beranda</a> / <em> Mobil</em> / <em> Detail Mobil</em></p>
								<h2>Detail <em>Mobil</em></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="recent-car single-car wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
		<div class="container">
			<div class="recent-car-content">
				<div class="row">
					<div class="col-md-6">
						<div id="single-car" class="slider-pro">
							<div class="sp-slides">

								<?php
								// $this->db->order_by('cover', 'DESC');
								 foreach ($this->db->get_where('gambar_mobil', array('id_mobil'=>$detail->id_mobil))->result() as $rw): ?>
									
								

								<div class="sp-slide">
									<img class="sp-image" src="image/mobil/<?php echo $rw->gambar ?>" alt="" />
								</div>

						        <?php endforeach ?>

							</div>

							<div class="sp-thumbnails">
								<?php 
								// $this->db->order_by('cover', 'DESC');
								foreach ($this->db->get_where('gambar_mobil', array('id_mobil'=>$detail->id_mobil))->result() as $rw): ?>

								<img class="sp-thumbnail" src="image/mobil/<?php echo $rw->gambar ?>" alt="" />

								<?php endforeach ?>
							</div>
					    </div>
					</div>
					<div class="col-md-6">
						<div class="car-details">
							<h4><?php echo $detail->judul ?></h4>
							<span>Rp. <?php echo number_format($detail->harga) ?></span>
							<br>
							<br>
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
						    Minat Mobil ini
						  </button>
							<!-- <p>Tattooed fashion axe Blue Bottle butcher tilde. Pitchfork leggings meh Odd Future.Drinking vinegar hoodie street art, selvage you probably haven't heard of them put a bird on it semiotis heirloom four loko roof.</p> -->
							<div class="container">
								<div class="row">
									<ul class="car-info col-md-6">
										<!-- <li><i class="flaticon flaticon-calendar"></i><p>2016/2017</p></li> -->
										<li><i class="flaticon flaticon-speed"></i><p><?php echo $detail->kecepatan ?></p></li>
										<!-- <li><i class="flaticon flaticon-road"></i><p>20.000km - 40.000km</p></li> -->
										<li><i class="flaticon flaticon-fuel"></i><p><?php echo $detail->bahan_bakar ?></p></li>
										
									</ul>
									<ul class="car-info col-md-6">
										
										<li><i class="flaticon flaticon-shift"></i><p><?php echo $detail->transisi ?></p></li>
										<!-- <li><i class="flaticon flaticon-car"></i><p>4/5</p></li> -->
										<li><i class="flaticon flaticon-motor"></i><p><?php echo $detail->kapasitas_bahan_bakar ?></p></li>
									</ul>
								</div>
								<div class="row" style="margin-top: 50px;">
									
									<div class="col-md-12">
										<h5>Warna yang tersedia.</h5>
										<hr>
										<div class="row">
										
										<?php foreach (explode(',', $detail->id_warna) as $key => $vl):
											$retVal = (get_data('warna','id_warna',$vl,'kode_warna') != '') ? get_data('warna','id_warna',$vl,'kode_warna') : 'white';
											$style = 'style="background-color: '.$retVal.'"';
										 ?>
											<div class="col-md-2">
												<span class="dot" <?php echo $style ?>></span>
												<br>
												<center>
													<label class="small"><?php echo strtolower(get_data('warna','id_warna',$vl,'warna')) ?></label>
												</center>
											</div>
										<?php endforeach ?>

										</div>
									</div>
								</div>
							</div>
							<!-- <div class="similar-info">
								<div class="primary-button">
									<a href="#">Add Offer <i class="fa fa-dollar"></i></a>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section>
		<div class="more-details">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="item wow fadeInUp" data-wow-duration="0.5s" style="overflow-x:auto;">
							<div class="sep-section-heading">
								<h2>Desk<em>ripsi</em></h2>
							</div>
							<?php echo $detail->deskripsi ?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="item wow fadeInUp" data-wow-duration="0.75s">
							<div class="sep-section-heading">
								<h2>Fitur <em>Lainnya</em></h2>
							</div>
							<div class="info-list">
								<ul>
									<?php 
									$fitur_lain = explode(',', $detail->fitur_lain);
									foreach ($fitur_lain as $value): ?>
										<li><i class="fa fa-check-square"></i><span><?php echo $value ?></span></li>
									<?php endforeach ?>
									
									
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

<!-- 	<section>
		<div class="recent-car similar-car wow fadeIn" data-wow-duration="1s">
			<div class="container">
				<div class="recent-car-content">
					<div class="row">
						<div class="col-md-12">
							<div class="section-heading">
								<div class="icon">
									<i class="fa fa-car"></i>
								</div>
								<div class="text-content">
									<h2>Lainnya</h2>
									<span>Yang mungkin kamu suka</span>
								</div>
							</div>
						</div>
					</div>
					<div id="owl-similar" class="owl-carousel owl-theme">
						<div class="item car-item">
							<div class="thumb-content">
								<div class="car-banner">
									<a href="single_car.html">Sport</a>
								</div>
								<a href="single_car.html"><img src="assets/images/car_item_1.jpg" alt=""></a>
							</div>
							<div class="down-content">
								<a href="single_car.html"><h4>Perfect Sport Car</h4></a>
								<span>$36.000</span>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section> -->

	 <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Form Minat Pelanggan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p>Silahkan lengkapi data dibawah ini :</p>

          <form action="web/simpan_minat" method="POST">
          	<div class="form-group">
          		<label>Nama Lengkap</label>
          		<input type="text" name="nama" class="form-control" required>
          	</div>
          	<div class="form-group">
          		<label>No Telp</label>
          		<input type="text" name="no_telp" class="form-control" required>
          	</div>
          	<div class="form-group">
          		<label>Alamat</label>
          		<textarea class="form-control" rows="2" name="alamat" required></textarea>
          		<input type="hidden" name="id_mobil" value="<?php echo $detail->id_mobil ?>">
          	</div>
          	<div class="form-group">
          		<button type="submit" class="btn btn-flat btn-warning">Simpan</button>
          	</div>
          </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>


	<?php include 'footer.php'; ?>
	

	<script src="front/assets/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('table').addClass('table table-bordered');
		});
	</script>

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