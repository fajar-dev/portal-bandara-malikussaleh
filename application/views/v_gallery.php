
<!-- section portfolio start -->
<section class="section portfolio pb-0 bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<span class="h6 text-color">Gallery</span>
					<h2 class="mt-3 content-title ">Foto Kegiatan</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row portfolio-gallery">

    <?php	foreach ($data->result() as $row) :	?>
			<div class="col-lg-3 col-md-6">
				<div class="portflio-item position-relative mb-4">
					<a href="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="popup-gallery">
						<img src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" alt="" class="img-fluid w-100">
						<i class="ti-search overlay-item"></i>
						<div class="portfolio-item-content">
							<h3 class="mb-0 text-white"><?= $row->galeri_judul?></h3>
							<p class="text-white-50"><?= $row->album_nama?></p>
						</div>
					</a>
				</div>
			</div>
      <?php endforeach;?>

		</div>
	</div>
</section>

<!-- section portfolio END -->