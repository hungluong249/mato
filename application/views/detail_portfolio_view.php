<!-- Work Style-->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/scss/portfolio.min.css'); ?>">

<!--Portfolio JS -->
<script src="<?php echo site_url('assets/js/portfolio.min.js'); ?>"></script>

<?php
$type = '';
$secondary_filter = '';
switch ($detail['project_filter']) {
	case 1:
	$type = 'Branding';
	break;
	case 2:
	$type = 'Website';
	break;
	case 3:
	$type = 'Photography';
	break;
	case 4:
	$type = 'Packaging';
	break;
	case 5:
	$type = 'Print';
	break;
	case 6:
	$type = 'Marketing Design';
	break;
	default:
	$type = '';
	break;
}
switch ($detail['project_secondary_filter']) {
	case 1:
	$secondary_filter = 'Branding';
	break;
	case 2:
	$secondary_filter = 'Website';
	break;
	case 3:
	$secondary_filter = 'Photography';
	break;
	case 4:
	$secondary_filter = 'Packaging';
	break;
	case 5:
	$secondary_filter = 'Print';
	break;
	case 6:
	$secondary_filter = 'Marketing Design';
	break;
	default:
	$secondary_filter = '';
	break;
}
?>

<section class="work-detail">
	<div class="work-detail-head container-fluid">
		<div class="row">
			<div class="item col-sm-6 col-xs-12">
				<h1><?php echo $detail['project_title'] ?></h1>
			</div>
			<div class="item col-sm-6 col-xs-12">
				<p><?php echo $detail['project_description'] ?></p>
			</div>
		</div>
	</div>

	<div class="work-detail-cover container-fluid" style="background-color: #<?php echo $detail['project_color'] ?>;">
		<div class="mask">
			<img src="<?php echo base_url('assets/upload/projects/'. $detail['project_avatar']) ?>">
		</div>
	</div>

	<div class="work-detail-head container">
		<div class="row">
			<!--
			<div class="work-detail-description col-sm-8 col-sm-offset-3 col-xs-12">
				<p><?php echo $detail['project_description'] ?></p>
			</div>
			-->
			<div class="work-detail-info col-sm-8 col-sm-offset-3 col-xs-12">
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<h4>Project Name:</h4>
						<span><?php echo $detail['project_title'] ?></span>
						<h4>Client:</h4>
						<span><?php echo $detail['project_customer'] ?></span>
					</div>
					<div class="col-sm-4 col-xs-12">
						<h4>Project Field</h4>
						<span><?php echo $type ?> - <?php echo $secondary_filter ?></span>
					</div>
					<div class="col-sm-4 col-xs-12">
						<h4>Created At</h4>
						<span><?php echo $detail['project_year'] ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="work-detail-body">
		<article>
            <?php if ($detail['project_description_image'] != null): ?>
                <?php $image = json_decode($detail['project_description_image']) ?>
                <?php foreach ($image as $key => $value): ?>
                    <?php if ($detail['project_avatar'] != $value): ?>
						<img src="<?php echo base_url('assets/upload/projects/' . $value) ?>" alt="img" class="wow fadeInUp">
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
		</article>
	</div>
</section>

<section class="container-fluid">

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

		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-xs-12">
				<p>Wanna See More?</p>
				<h1>
					<b>Related</b> <span class="light">Works</span>
				</h1>
			</div>
		</div>
	</section>
	<section class="related container-fluid">
		<div class="row">
            <?php if ($projects): ?>
            <?php foreach ($projects as $key => $value): ?>
            <?php
            $type = '';
            $secondary_filter = '';
            switch ($value['project_filter']) {
                case 1:
                    $type = 'Branding';
                    break;
                case 2:
                    $type = 'Website';
                    break;
                case 3:
                    $type = 'Photography';
                    break;
                case 4:
                    $type = 'Packaging';
                    break;
                case 5:
                    $type = 'Print';
                    break;
                case 6:
                    $type = 'Marketing Design';
                    break;
                default:
                    $type = '';
                    break;
            }
            switch ($value['project_secondary_filter']) {
                case 1:
                    $secondary_filter = 'Branding';
                    break;
                case 2:
                    $secondary_filter = 'Website';
                    break;
                case 3:
                    $secondary_filter = 'Photography';
                    break;
                case 4:
                    $secondary_filter = 'Packaging';
                    break;
                case 5:
                    $secondary_filter = 'Print';
                    break;
                case 6:
                    $secondary_filter = 'Marketing Design';
                    break;
                default:
                    $secondary_filter = '';
                    break;
            }
            ?>
			<div class="item col-sm-4 col-xs-12">
				<div class="mask">
					<img src="<?php echo base_url('assets/upload/projects/'. $value['project_avatar']) ?>" alt="img">

					<span class="name"><?php echo $value['project_title'] ?></span>
					<span class="brand"><?php echo $value['project_customer'] ?></span>

					<a class="see-detail" href="<?php echo base_url('porfolio/detail/'. $value['project_id']) ?>">Explore</a>
					<!--<span class="id"><?php echo $project['project_id']; ?></span>-->
				</div>
			</div>

                <?php endforeach ?>
            <?php endif ?>
		</div>
	</section>
</footer>

<script src="<?php echo base_url('assets/lib/wow/wow.min.js') ?>"></script>
<script>
    new WOW().init();
</script>