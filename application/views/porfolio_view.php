<!-- Work Style-->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/scss/portfolio.min.css'); ?>">

<!-- Animate CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/animate/animate.min.css'); ?>">

<!--Portfolio JS -->
<script src="<?php echo site_url('assets/js/portfolio.min.js'); ?>"></script>

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
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
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

							<div class="grid-item mix <?php echo strtolower($type); ?> <?php echo strtolower($secondary_filter); ?> <?php echo $project['project_class'] ?> wow fadeInUp">
								<a href="<?php echo base_url('porfolio/detail/'. $project['project_id']) ?>">
									<div class="mask">
										<img src="<?php echo base_url('assets/upload/projects/' . $project['project_avatar']); ?>" alt="project image">
									</div>
									<span class="brand"><?php echo $project['project_customer']; ?></span>
									<span class="name"><?php echo $project['project_title']; ?></span>


									<a class="see-detail" href="<?php echo base_url('porfolio/detail/'. $project['project_id']) ?>" >View Work</a>
									<span class="id"><?php echo $project['project_id']; ?></span>
								</a>
							</div>

                        <?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="footer container-fluid">
	<section class="container">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-xs-12">
				<ul class="list-inline">
					<li>
						<a href="<?php echo base_url('porfolio/') ?>">Work</a>
					</li>
					<li>
						<a href="<?php echo base_url('about/') ?>">About Us</a>
					</li>
					<li>
						<a href="<?php echo base_url('team/') ?>">Team</a>
					</li>
					<li>
						<a href="<?php echo base_url('contact/') ?>">Contact</a>
					</li>
				</ul>
				<h5>MATO CREATIVE 2018</h5>
			</div>
		</div>
	</section>
	<section class="bottom container-fluid" style="background-image: url('https://images.unsplash.com/photo-1517292987719-0369a794ec0f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=79cbb47c2fa1dab8479b31a61567638a&auto=format&fit=crop&w=1867&q=80')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3 col-xs-12">
					<p>Wanna Start a Project</p>
					<h1>
						<a href="<?php echo base_url('contact/') ?>">
							<b>Starting</b> Right now
						</a>
					</h1>
				</div>
			</div>
		</div>
	</section>
</footer>

<script src="<?php echo base_url('assets/lib/wow/wow.min.js') ?>"></script>
<script>
    new WOW().init();
</script>

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
    $('.work-control ul li').on( 'click', 'a', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
    });

</script>

