        <?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

        ?>
<div class="main-wrapper ">
<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
					<div class="col-12 mb-3">
						<h2><?= $judul ?></h2>
					</div>
            <div class="col-lg-8">
                <div class="row">
                <?php
                  foreach ($data->result_array() as $j) :
                      $post_id=$j['tulisan_id'];
                      $post_judul=$j['tulisan_judul'];
                      $post_isi=$j['tulisan_isi'];
                      $post_author=$j['tulisan_author'];
                      $post_image=$j['tulisan_gambar'];
                      $post_tglpost=$j['tanggal'];
                      $post_slug=$j['tulisan_slug'];
                      $post_kat=$j['tulisan_kategori_nama'];
                  ?>
	<div class="col-lg-6 col-md-6 mb-5">
		<div class="blog-item">
			<img src="<?php echo base_url().'assets/images/'.$post_image;?>" alt="" class="img-fluid rounded">

			<div class="blog-item-content bg-white p-4">
				<div class="blog-item-meta  py-1 px-2">
					<span class="text-muted text-capitalize mr-3"><i class="fa fa-tag mr-2"></i><?php echo $post_kat;?> <i class="fa fa-clock ml-3 mr-2"></i><?php echo $post_tglpost;?></span>
				</div> 

				<h3 class="mt-3 mb-3"><a href="<?php echo base_url().'artikel/'.$post_slug;?>"><?php echo $post_judul;?></a></h3>
				<p class="mb-4"><?php echo limit_words($post_isi,10).'...';?></em></p>

				<a href="<?php echo base_url().'artikel/'.$post_slug;?>" class="btn btn-small btn-main btn-round-full">Baca Selengkapnya...</a>
			</div>
		</div>
	</div>
  <?php endforeach;?>

  </div>
</div>

<div class="col-lg-4">
  <div class="sidebar-wrap">
	<div class="sidebar-widget search card p-4 mb-3 border-0">
    <form action="<?php echo base_url().'blog/search'?>" method="post">
      <input type="text" name="xfilter" class="form-control" placeholder="search">
      <button type="submit" class="btn btn-mian btn-small d-block mt-2 w-100">search</button>
    </form>
	</div>


	<div class="sidebar-widget latest-post card border-0 p-4 mb-3">
		<h5>Kategori</h5>
        <?php foreach($kat->result() as $i):?>
        <div class="media border-bottom py-2">
            <div class="media-body">
                <span class="my-2"><a href="<?php echo base_url().'blog/kategori/'.$i->kategori_id;?>"><?php echo $i->kategori_nama.' ('.$i->jml.')';?></a></span>
            </div>
        </div>
        <?php endforeach;?>
	</div>

	<div class="sidebar-widget latest-post card border-0 p-4 mb-3">
		<h5> Posts Popular</h5>
     <?php foreach ($populer->result() as $row) : ?>
        <div class="media border-bottom py-3">
            <a href="<?php echo base_url().'artikel/'.$row->tulisan_slug;?>"><img class="mr-4 img-fluid" width="100" src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" alt=""></a>
            <div class="media-body">
                <h6 class="my-2"><a href="<?php echo base_url().'artikel/'.$row->tulisan_slug;?>"><?php echo $row->tulisan_judul;?></a></h6>
                <span class="text-sm text-muted"><?php echo $row->tanggal;?></span>
            </div>
        </div>
      <?php endforeach;?>
	</div>
</div>
            </div>   
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                <nav class="navigation pagination py-2 d-inline-block">
                    <div class="nav-links">
                    <?php echo $page;?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>