<?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
?>

<!-- Header Close --> 

<div class="main-wrapper ">
<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					<span class="d-block mb-3 text-white text-capitalize">Selamat Datang di</span>
					<h1 class="animated fadeInUp mb-5">Website Resmi <br> Bandar Udara <br>Malikussaleh</h1>
					<a href="#" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" >Get started<i class="btn-icon fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Intro Start -->

<!-- Section About Start -->
<section class="section about-2 position-relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="about-item pr-3 mb-5 mb-lg-0">
					<span class="h6 text-color">Profil Kami</span>
					<h2 class="mt-1 mb-4 position-relative content-title">Tentang Bandara Malikussaleh</h2>
					<p class="mb-3">We provide consulting services in the area of IFRS and management reporting, helping companies to reach their highest level. We optimize business processes, making them easier.</p>

					<a href="#" class="btn btn-main btn-round-full">Baca Selengkapnya</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="about-item-img">
					<img src="<?= base_url('template/') ?>images/about/home-7.jpg" alt="" class="img-fluid rounded">
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Section Testimonial End -->
<section class="section latest-blog bg-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Berita</span>
					<h2 class="mt-3 content-title text-white">Berita Terbaru</h2>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
    <?php
				foreach ($post->result_array() as $j) :
					$post_id=$j['tulisan_id'];
          $post_kat=$j['tulisan_kategori_nama'];
					$post_judul=$j['tulisan_judul'];
					$post_isi=$j['tulisan_isi'];
					$post_author=$j['tulisan_author'];
					$post_image=$j['tulisan_gambar'];
					$post_tglpost=$j['tanggal'];
					$post_slug=$j['tulisan_slug'];
			?>
			<div class="col-lg-4 col-md-6 mb-5">
				<div class="card bg-transparent border-0">
					<img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="" class="img-fluid rounded">

					<div class="card-body mt-2">
						<div class="blog-item-meta">
							<span class="text-white-50"><i class="fa fa-tag mr-2"></i><?php echo $post_kat;?>  <strong class="px-2">|</strong> <i class="fa fa-user mr-2"></i><?php echo $post_author;?></span>
						</div> 

						<h3 class="mt-3 mb-5 lh-36"><a href="<?php echo base_url().'artikel/'.$post_slug;?>" class="text-white "><?php echo $post_judul;?></a></h3>

						<a href="<?php echo base_url().'artikel/'.$post_slug;?>" class="btn btn-small btn-solid-border btn-round-full text-white">Baca Selengkapnya</a>
					</div>
				</div>
			</div>
      <?php endforeach;?>
		</div>
	</div>
</section>

<section class="mt-70 position-relative">
	<div class="container">
	<div class="cta-block-2 bg-gray p-5 rounded border-1">
		<div class="row">
			<div class="col-sm-12">
				<form id="contact-form" class="contact__form" method="post" action="<?= base_url('home/kirim_pesan') ?>">
					 <span class="text-color">Send a message</span>
					 <h3 class="text-md mb-4">Contact Form</h3>
           <?php echo $this->session->flashdata('msg');?>
						<div class="row">
							<div class="col-md-6 form-group">
								<input name="nama" type="text" class="form-control" placeholder="Your Name" required>
						</div>
						<div class="col-md-6 form-group">
								<input name="email" type="email" class="form-control" placeholder="Email Address" required>
						</div>
						</div>
					 <div class="form-group-2 mb-4">
							 <textarea name="pesan" class="form-control" rows="4" placeholder="Your Message" required></textarea>
					 </div>
					 <button class="btn btn-main"  type="submit">Send Message</button>
			 </form>
	 </div>
		</div>
	</div>
</div>

</section>
