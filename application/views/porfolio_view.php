<!-- Work Style-->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/scss/portfolio.min.css'); ?>">

<section class="work">
	<div class="cover">
		<div class="overlay"></div>
		<div class="mask">
			<img src="https://images.unsplash.com/photo-1504608245011-62d9758c1bb9?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4f55a58cec78baa23d950fd25871e463&auto=format&fit=crop&w=1950&q=80" alt="work cover image">
		</div>
		<div class="intro">
			<div class="head">
				Live. Play. Creat
			</div>
			<div class="body">
				Works
			</div>
			<div class="foot">
				<a href="#work-head">Scroll Down</a>
			</div>
		</div>
	</div>
	<div class="work-head" id="work-head">
		<div class="container">
			<div class="row">
				<div class="work-intro col-sm-8 col-sm-offset-3 col-xs-12">
					<p>Vestibulum malesuada ipsum egestas gravida aliquam. Nullam pretium, massa non egestas congue, est dui tincidunt nunc, a eleifend dolor lorem id libero. Proin luctus sollicitudin bibendum. Nunc vel nunc leo. Donec ut augue velit. Quisque eu mauris rhoncus, ornare nisi ac, facilisis leo.</p>
				</div>
				<div class="work-control col-sm-8 col-sm-offset-3 col-xs-12">
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<ul class="list-unstyled">
								<li><a class="filter" data-filter="*">All Works</a></li>
								<!--
                                <li><a class="filter" data-filter=".highlights">Dự án nổi bật</a></li>
                                -->
							</ul>
						</div>
						<div class="col-sm-4 col-xs-12">
							<ul class="list-unstyled">
								<li><a class="filter" data-filter=".branding">Branding</a></li>
								<li><a class="filter" data-filter=".website">Website</a></li>
								<li><a class="filter" data-filter=".photography">Photography</a></li>
							</ul>
						</div>
						<div class="col-sm-4 col-xs-12">
							<ul class="list-unstyled">
								<li><a class="filter" data-filter=".packaging">Packaging</a></li>
								<li><a class="filter" data-filter=".print">Print</a></li>
								<li><a class="filter" data-filter=".marketing">Marketing</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="work-content col-sm-9 col-sm-offset-1 col-xs-12">
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

							<div class="grid-item mix <?php echo strtolower($type); ?> <?php echo strtolower($secondary_filter); ?> <?php echo $project['project_class'] ?>">
								<div class="mask">
									<img src="<?php echo base_url('assets/upload/projects/' . $project['project_avatar']); ?>" alt="project image">
								</div>
								<span class="brand"><?php echo $project['project_customer']; ?></span>
								<span class="name"><?php echo $project['project_title']; ?></span>


								<a class="see-detail" href="<?php echo base_url('porfolio/detail/'. $project['project_id']) ?>" >View Work</a>
								<span class="id"><?php echo $project['project_id']; ?></span>
							</div>

                        <?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
                <?php
                $type = '';
                $secondary_filter = '';
                switch ($value['project_filter']) {
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
                switch ($value['project_secondary_filter']) {
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
				<div class="item <?php echo ($key == 0)? 'active' : '' ?>">
					<!-- Slide Background -->
					<div class="mask" data-animation="animated fadeInLeft">
						<img src="<?php echo site_url('assets/upload/projects/' .$value['project_image_special']) ?>" alt="slide img 1"  class="slide-image"/>
					</div>

					<!-- Slide Text Layer -->
					<div class="slide-text">
						<span class="nation" data-animation="animated slideInLeft"><?php echo $value['project_location'] ?></span>
						<span class="name" data-animation="animated fadeInUp"><?php echo $value['project_title'] ?></span>
						<span class="brand" data-animation="animated fadeInUp"><?php echo $value['project_customer'] ?></span>
						<span class="field" data-animation="animated fadeInUp"><?php echo $type ?> - <?php echo $secondary_filter ?></span>
						<p data-animation="animated fadeInUp"><?php echo $value['project_description'] ?></p>
						<a href="<?php echo base_url('porfolio/detail/'. $value['project_id']) ?>" class="btn btn-primary" data-animation="animated fadeInLeft">More Info</a>
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

<section class="porfolio container-fluid">
	<div class="porfolio-control">
		<ul class="nav nav-pills nav-justified">
			<li><a class="filter" data-filter="*">Tất cả</a></li>
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

<!--            --><?php //foreach ($projects as $key => $project): ?>
<!--				--><?php
//				$type = '';
//				$secondary_filter = '';
//				switch ($project['project_filter']) {
//					case 1:
//						$type = 'Highlights';
//						break;
//					case 2:
//						$type = 'Branding';
//						break;
//					case 3:
//						$type = 'Website';
//						break;
//					case 4:
//						$type = 'Photography';
//						break;
//					case 5:
//						$type = 'Packaging';
//						break;
//					case 6:
//						$type = 'Print';
//						break;
//					case 7:
//						$type = 'Marketing Design';
//						break;
//					default:
//						$type = '';
//						break;
//				}
//				switch ($project['project_secondary_filter']) {
//					case 1:
//						$secondary_filter = 'Highlights';
//						break;
//					case 2:
//						$secondary_filter = 'Branding';
//						break;
//					case 3:
//						$secondary_filter = 'Website';
//						break;
//					case 4:
//						$secondary_filter = 'Photography';
//						break;
//					case 5:
//						$secondary_filter = 'Packaging';
//						break;
//					case 6:
//						$secondary_filter = 'Print';
//						break;
//					case 7:
//						$secondary_filter = 'Marketing Design';
//						break;
//					default:
//						$secondary_filter = '';
//						break;
//				}
//				?>
<!---->
<!--			<div class="grid-item mix --><?php //echo strtolower($type); ?><!-- --><?php //echo strtolower($secondary_filter); ?><!-- --><?php //echo $project['project_class'] ?><!--">-->
<!--				<div class="inner">-->
<!--					<img src="--><?php //echo base_url('assets/upload/projects/' . $project['project_avatar']); ?><!--" alt="img du an">-->
<!--					<div class="overlay"></div>-->
<!--					<div class="top">-->
<!--						<span class="nation">--><?php //echo $project['project_location']; ?><!--</span>-->
<!--						<span class="name">--><?php //echo $project['project_title']; ?><!--</span>-->
<!--						<span class="brand">--><?php //echo $project['project_customer']; ?><!--</span>-->
<!--						<br>-->
<!--						<span class="field">--><?php //echo $type . (($secondary_filter != '') ? (' - ' . $secondary_filter) : $secondary_filter); ?><!--</span>-->
<!--					</div>-->
<!--					<div class="bottom">-->
<!--						<a class="btn btn-outline" role="button" href="--><?php //echo base_url('porfolio/detail/'. $project['project_id']) ?><!--" >Explore</a>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!---->
<!--            --><?php //endforeach; ?>
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