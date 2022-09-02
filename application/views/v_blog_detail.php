
	<?php
		error_reporting(0);
        $b=$data->row_array();
        $url=base_url().'artikel/'.$b['tulisan_slug'];
	    $img=base_url().'assets/images/'.$b['tulisan_gambar'];
	    $title=$b['tulisan_judul'];
	    $author=$b['tulisan_author'];
	    $date=$b['tanggal'];
	    $kategori=$b['tulisan_kategori_nama'];
	    $deskripsi=strip_tags($b['tulisan_isi']);
	    $isi=$b['tulisan_isi'];
	    $views=$b['tulisan_views'];
	    $rating=$b['tulisan_rating'];
    ?>
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
                <div class="col-lg-12 mb-5">
			<div class="single-blog-item">
				<img src="<?php echo $img;?>" alt="" class="img-fluid rounded">

				<div class="blog-item-content bg-white p-5">
					<div class="blog-item-meta bg-gray py-1 px-2">
						<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i><?php echo $kategori;?></span>
						<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> <?php echo $date;?></span>
            <span class="text-black text-capitalize mr-3"><i class="ti-user mr-1"></i> <?php echo $author;?></span>
						<span class="text-muted text-capitalize mr-3"><i class="ti-eye mr-2"></i><?php echo $views;?> dibaca</span>
					</div> 

					<h2 class="mt-3 mb-4"><a href="<?php echo $url;?>"><?php echo $title;?></a></h2>

          <?php echo $isi;?>

					<div class="tag-option mt-5 clearfix">      

							<ul class="float-right list-inline">
									<li class="list-inline-item"> Share: </li>
									<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
									<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
									<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
									<li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
							</ul>
						</div>
				</div>
			</div>
		</div>

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
	<script src="<?php echo base_url().'theme/js/main.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btncari').hide();
		});
	</script>
	<script>
        jQuery(document).ready(function($) {
          $('.popup2').click(function(event) {
            var width  = 575,
                height = 400,
                left   = ($(window).width()  - width)  / 2,
                top    = ($(window).height() - height) / 2,
                url    = this.href,
                opts   = 'status=1' +
                         ',width='  + width  +
                         ',height=' + height +
                         ',top='    + top    +
                         ',left='   + left;
            window.open(url, 'facebook', opts);
            return false;
          });
        });
	</script>

	</body>
</html>
