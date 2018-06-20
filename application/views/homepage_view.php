<!-- CSS -->

<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/scss/'); ?>homepage.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/'); ?>fullpage/css/jquery.fullpage.min.css">
  
<section class="homepage">
	<div id="fullpage">
		<?php for ( $i = 0; $i < 3; $i ++){ ?>

		<div class="section">
			<img src="https://images.unsplash.com/photo-1510919945876-42d130e37f38?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=0ebcda83e8dc37429b671838c369f804&auto=format&fit=crop&w=2689&q=80" alt="img ">
			<div class="overlay"></div>
			<div class="container">
				<div class="content col-md-offset-2 col-sm-offset-2">
					<div class="head">
						Work name - Work Client
					</div>
					<div class="body">
						<a href="">Work name | Morbi malesuada ipsum non dapibus viverra. Phasellus luctus ipsum ac ex mollis varius. Donec nec enim nulla. Phasellus magna ex, porta vel odio at, cursus laoreet lorem</a>
					</div>
					<div class="foot">
						<a href="">View detail</a>
					</div>
				</div>
			</div>
			<div class="quotation-request">
				<a href="">Quotation Request</a>
			</div>
		</div>
        <?php } ?>

		<!-- Section About -->
		<div class="section">
			<img src="https://images.unsplash.com/photo-1509395062183-67c5ad6faff9?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=fbaf57cfb9374309ad3153a5d27b7c78&auto=format&fit=crop&w=1400&q=80" alt="img About Us">
			<div class="overlay"></div>
			<div class="container">
				<div class="content col-md-offset-2 col-sm-offset-2">
					<div class="head">
						Welcome to Mato Creative
					</div>
					<div class="body">
						<a href="">Let's Find out Who we are</a>
					</div>
					<div class="foot">
						<a href="">About Us</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>



<!-- JS -->

<script src="<?php echo site_url('assets/lib/') ?>fullpage/js/jquery.fullpage.min.js"></script>
<script type="text/javascript">
    $('#fullpage').fullpage();
</script>