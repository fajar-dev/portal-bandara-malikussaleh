
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
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                <div class="col-lg-12 mb-5">
			<div class="single-blog-item">
				<img src="<?= base_url('assets/images/')?><?= $profil->foto ?>" alt="" class="img-fluid rounded">

				<div class="blog-item-content bg-white p-5">

					<h2 class="mt-3 mb-4">Profil Bandara Malikussaleh</h2>

          <?= $profil->isi ?>

					<div class="tag-option mt-5 clearfix">      
						</div>
				</div>
			</div>
		</div>
  </div>
</div>
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
