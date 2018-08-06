<!--Portfolio JS -->
<script src="<?php echo site_url('assets/js/team.min.js'); ?>"></script>

<section class="team">
	<div class="team-head container-fluid">
		<div class="row">
			<div class="item col-sm-6 col-xs-12">
				<h1>Our Team</h1>
			</div>
			<div class="item col-sm-6 col-xs-12">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis nulla felis, interdum tempor purus pretium vel. Ut dapibus est sit amet odio placerat, ut imperdiet odio pellentesque.</p>
				<p>Vestibulum ante ipsum primis in faucibus orci luctus et. Vestibulum luctus dictum sollicitudin.</p>
			</div>
		</div>
	</div>

	<div class="team-cover container-fluid">
		<div class="mask">
			<img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=581511fae3d6e46d55eb0b6f3d86b69d&auto=format&fit=crop&w=1950&q=80" alt="team cover image">
		</div>
	</div>

	<div class="team-detail container-fluid">
		<div class="row">
            <?php if ($teams): ?>
            <?php foreach ($teams as $key => $value): ?>
			<div class="item col-sm-6 col-xs-12">
				<div class="background">
					<div class="mask">
						<img src="<?php echo base_url("assets/upload/teams/" .$value['image']); ?>" alt="image<?php echo $value['position'] ?>">
					</div>
				</div>
				<div class="text">
					<h3><?php echo $value['name'] ?></h3>
					<p><?php echo $value['position'] ?></p>
					<ul class="list-inline">
						<li><a href="<?php echo $value['facebook'] ?>" target="_blank"><i class="fa fa-2x fa-facebook"></i></a></li>
						<li>
                            <?php if ($value['instagram'] != ''): ?>
								<a href="<?php echo $value['instagram'] ?>" target="_blank"><i class="fa fa-2x fa-instagram"></i></a>
                            <?php endif ?>
						</li>
					</ul>
				</div>
			</div>
                <?php endforeach ?>
            <?php endif ?>
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