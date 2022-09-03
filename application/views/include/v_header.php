
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php
		if(empty($status)){ 
	?>
		<meta name="description" content="Selamat datang di website resmi Bandara Udara Malikussaleh">
		<meta property="og:description" content="Selamat datang di website resmi Bandara Udara Malikussaleh" />
		<meta property="og:image" content="<?= base_url('template/') ?>images/logo.jpg" />
	<?php
		}else{ 
	?>
		<meta name="description" content="<?php echo str_replace("<p>","",substr($data->row()->tulisan_isi, 0, 100));?>">
		<meta property="og:description" content="<?php echo str_replace("<p>","",substr($data->row()->tulisan_isi, 0, 100));?>" />
		<meta property="og:image" content="<?= base_url('assets/') ?>images/<?= $data->row()->tulisan_gambar?>" />
	<?php
		}
	?>
  <meta property="og:url" content="<?= base_url() ?>" />
  <meta property="og:type" content="article">
  <meta property="og:title" content="Malikussaleh-Airport | <?php echo $title ?>" />
  <title>Malikussaleh-Airport | <?php echo $title ?></title>
	
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?= base_url('template/') ?>css/style.css">

</head>

<body>


<!-- Header Start --> 

<header class="navigation">
	<div class="header-top ">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-2 col-md-4">
					<div class="header-top-socials text-center text-lg-left text-md-left">
						<a href="<?= $set->instagram ?>" target="_blank"><i class="ti-instagram"></i></a>
						<a href="<?= $set->facebook ?>" target="_blank"><i class="ti-facebook"></i></a>
						<a href="<?= $set->twitter?>" target="_blank"><i class="ti-twitter"></i></a>
						<a href="<?= $set->youtube ?>" target="_blank"><i class="ti-youtube"></i></a>
					</div>
				</div>
				<div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
					<div class="header-top-info">
						<a href="tel:<?= $set->kontak ?>"><i class="fa fa-phone mr-2"></i> : <span><?= $set->kontak ?></span></a>
						<a href="mailto:<?= $set->email ?>" ><i class="fa fa-envelope mr-2"></i><span><?= $set->email ?></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="<?= base_url() ?>">
		  	<img src="<?= base_url('template/images/dishub.png') ?>" width="40" alt="">
		  </a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="<?= base_url() ?>">Home </a>
			  </li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('profil') ?>">Profil </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('blog') ?>">Blog</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('gallery') ?>">Galery </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url() ?>#kontak">Kontak</a>
				</li>
			</ul>
		  </div>
		</div>
	</nav>
</header>