<!-- About JS -->
<script src="<?php echo site_url('assets/js/about.min.js'); ?>"></script>

<section class="about">
	<div class="about-title container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-2 col-xs-12">
					<div class="heading">
						<h4 class="sub-title">We are Mato Creative</h4>
						<h1 class="title">
							Welcome to <b>Mato Creative</b>
						</h1>
						<a href="#about-head">Scroll Down</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="about-cover">
		<div class="mask">
			<img src="<?php echo base_url("assets/public/img/cover/cover_about.jpg"); ?>" alt="About Cover Image">
		</div>
	</div>

	<div class="about-head" id="about-head">
		<div class="container">
			<h1>Services</h1>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-3 col-xs-12">
					<p>Mato Creative is a company specialized in brand identity design and communication. We provide a comprehensive image solution to help businesses improve their competitiveness in the marketplace. We always communicate openly and listen to our customers' requests so that we can understand the creative requirements from the very beginning and ensure consistency throughout the project implementation. Commitment to innovative and effective solutions, Mato Creative co-operates with brand building business development.</p>
				</div>
				<div class="col-sm-8 col-sm-offset-4 col-xs-12">
					<div class="row">
						<div class="item col-sm-4 col-xs-12 wow fadeInRight">
							<h3>Branding</h3>
							<ul class="list-unstyled">
								<h1>1/</h1>

								<li>Brand consulting</li>
								<li>Brand visual strategy</li>
								<li>Naming & Slogan</li>
								<li>Logotype</li>
								<li>Brand applications</li>
								<li>Visual identity</li>
								<li>Corporate brand identity</li>
								<li>Brand environmental</li>
								<li>Brand Content</li>
							</ul>
						</div>
						<div class="item col-sm-4 col-xs-12 wow fadeInRight">
							<h3>Web Design</h3>
							<ul class="list-unstyled">
								<h1>2/</h1>

								<li>Website Design</li>
								<li>Website Develop</li>
								<li>Landing page</li>
								<li>UX Design</li>
							</ul>
						</div>
						<div class="item col-sm-4 col-xs-12 wow fadeInRight">
							<h3>Photography</h3>
							<ul class="list-unstyled">
								<h1>3/</h1>

								<li>Photography</li>
								<li>Digital imaging/ Retouch</li>
								<li>Lookbook</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="item col-sm-4 col-xs-12 wow fadeInRight">
							<h3>Packaging</h3>
							<ul class="list-unstyled">
								<h1>4/</h1>

								<li>Packaging Design</li>
							</ul>
						</div>
						<div class="item col-sm-4 col-xs-12 wow fadeInRight">
							<h3>Marketing Design</h3>
							<ul class="list-unstyled">
								<h1>5/</h1>

								<li>Banner Design</li>
								<li>Print Design</li>
								<li>Brochure/ Catalouge</li>
								<li>Salekit</li>
							</ul>
						</div>
						<div class="item col-sm-4 col-xs-12 wow fadeInRight">
							<h3>Print</h3>
							<ul class="list-unstyled">
								<h1>6/</h1>

								<li>Printing Consulting</li>
								<li>Offset Printing</li>
								<li>Annual Reports</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="about-clients">
		<div class="row">
			<div class="left col-sm-6 col-xs-12">
				<h1>Clients</h1>
				<p></p>
			</div>
			<div class="right col-sm-6 col-xs-12">
				<div class="row">
                    <?php if ($partners): ?>
                        <?php foreach ($partners as $key => $value): ?>
							<div class="item col-sm-4 col-xs-6">
								<img src="<?php echo base_url("assets/upload/partners/" .$value['image']); ?>">
							</div>
                        <?php endforeach ?>
                    <?php endif ?>
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
