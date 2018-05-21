<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/scss/portfolio.min.css'); ?>">

<section id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

	<!-- Indicators -->

	<!--
	<ol class="carousel-indicators">
		<li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
		<li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
		<li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
	</ol>
	-->

	<!-- Wrapper For Slides -->
	<div class="carousel-inner" role="listbox">

		<!-- Third Slide -->
		<?php foreach ($projects as $key => $value): ?>
			<?php if ($value['project_is_special'] == 1): ?>
				<div class="item <?php echo ($key == 0)? 'active' : '' ?>">
					<!-- Slide Background -->
					<div class="mask" data-animation="animated fadeInLeft">
						<img src="<?php echo site_url('assets/upload/projects/' .$value['project_image_special']) ?>" alt="slide img 1"  class="slide-image"/>
					</div>

					<!-- Slide Text Layer -->
					<div class="slide-text">
						<h3 data-animation="animated slideInLeft">Product</h3>
						<h2 data-animation="animated fadeInUp">Bootstrap Carousel</h2>
						<h2 data-animation="animated fadeInDown">Bootstrap Carousel</h2>
						<p data-animation="animated fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec lorem mi. Nulla ac metus elit. Vivamus at tellus ac tortor blandit viverra sed a arcu. Ut lacus magna, aliquam gravida molestie sed.</p>
						<a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInLeft">More Info</a>
						<a href="#" target="_blank"  class="btn btn-outline" data-animation="animated fadeInLeft">Shop Now</a>
					</div>

				</div>
			<?php endif ?>
		<?php endforeach ?>
		<!-- End of Slide -->


	</div><!-- End of Wrapper For Slides -->

	<!-- Left Control -->
	<a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
		<span class="fa fa-angle-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>

	<!-- Right Control -->
	<a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
		<span class="fa fa-angle-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

	<div class="share">

	</div>

</section> <!-- End  bootstrap-touch-slider Slider -->

<section class="porfolio container">
	<div class="porfolio-control row">
		<ul class="nav nav-pills nav-justified">
			<li><a class="filter" data-filter="*">Tất cả Dự án</a></li>
			<!--
			<li><a class="filter" data-filter=".highlights">Dự án nổi bật</a></li>
			-->
			<li><a class="filter" data-filter=".branding">Branding</a></li>
			<li><a class="filter" data-filter=".website">Website</a></li>
			<li><a class="filter" data-filter=".photography">Photography</a></li>
			<li><a class="filter" data-filter=".packaging">Packaging</a></li>
			<li><a class="filter" data-filter=".print">Print</a></li>
			<li><a class="filter" data-filter=".marketing">Marketing</a></li>
		</ul>
	</div>
	<div class="portfolio-content row">
		<div class="grid">
			<div class="grid-sizer"></div>

            <?php foreach ($projects as $key => $project): ?>
				<?php
				$type = '';
				$secondary_filter = '';
				switch ($project['project_filter']) {
					case 1:
						$type = 'Highlights';
						break;
					case 2:
						$type = 'Branding';
						break;
					case 3:
						$type = 'Website';
						break;
					case 4:
						$type = 'Photography';
						break;
					case 5:
						$type = 'Packaging';
						break;
					case 6:
						$type = 'Print';
						break;
					case 7:
						$type = 'Marketing Design';
						break;
					default:
						$type = '';
						break;
				}
				switch ($project['project_secondary_filter']) {
					case 1:
						$secondary_filter = 'Highlights';
						break;
					case 2:
						$secondary_filter = 'Branding';
						break;
					case 3:
						$secondary_filter = 'Website';
						break;
					case 4:
						$secondary_filter = 'Photography';
						break;
					case 5:
						$secondary_filter = 'Packaging';
						break;
					case 6:
						$secondary_filter = 'Print';
						break;
					case 7:
						$secondary_filter = 'Marketing Design';
						break;
					default:
						$secondary_filter = '';
						break;
				}
				?>

			<div class="grid-item mix <?php echo strtolower($type); ?> <?php echo strtolower($secondary_filter); ?>">
				<div class="inner">
					<img src="<?php echo base_url('assets/upload/projects/' . $project['project_avatar']); ?>" alt="img du an">
					<div class="overlay"></div>
					<div class="top">
						<span class="nation"><?php echo $project['project_location']; ?></span>
						<span class="name"><?php echo $project['project_title']; ?></span>
						<span class="brand">Brand</span>
						<span class="field"><?php echo $type . (($secondary_filter != '') ? (' - ' . $secondary_filter) : $secondary_filter); ?></span>
					</div>
					<div class="bottom">
						<a class="btn btn-outline" role="button" href="<?php echo base_url('porfolio/detail/'. $project['project_id']) ?>" >Explore</a>
					</div>
				</div>
			</div>

            <?php endforeach; ?>
		</div>

	</div>
</section>

<script src="<?php echo site_url('assets/public/js/sliderScript.js') ?>"></script>

<script src='https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js'></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>


<script type="text/javascript">

    // init Isotope
    var $grid = $('.grid').isotope({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            // use element for option
            columnWidth: '.grid-sizer'
        }
    });

    // filter items on button click
    $('.porfolio-control ul li').on( 'click', 'a', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // layout Isotope after each image loads
	$grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
    });





</script>