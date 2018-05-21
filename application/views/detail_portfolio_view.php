<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/scss/portfolio.min.css'); ?>">
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
<section class="portfolio-cover container-fluid">
    <div class="row">
        <div class="left col-md-6 col-sm-6 col-xs-12">
            <span class="nation"><?php echo $detail['project_location'] ?></span>
            <span class="name"><?php echo $detail['project_title'] ?></span>
            <span class="brand"><?php echo $detail['project_customer'] ?></span>
            <span class="field"><?php echo $type ?> - <?php echo $secondary_filter ?></span>
        </div>
        <div class="right col-md-6 col-sm-6 col-xs-12">
            <div class="mask">
                <img src="<?php echo base_url('assets/upload/projects/'. $detail['project_avatar']) ?>">
            </div>
        </div>
    </div>

</section>

<section class="portfolio-detail container">
	<article>
		<p><?php echo $detail['project_description'] ?></p>
		<?php if ($detail['project_description_image'] != null): ?>
		<?php $image = json_decode($detail['project_description_image']) ?>
		<?php foreach ($image as $key => $value): ?>
			<?php if ($detail['project_avatar'] != $value): ?>
				<img src="<?php echo base_url('assets/upload/projects/' . $value) ?>" alt="img">
			<?php endif ?>
		<?php endforeach ?>
		<?php endif ?>
		
	</article>
</section>

<section class="portfolio-related container">
	<div class="title">
		<div class="heading">
			<h4>Portfolio</h4>
			<h1>Related Works</h1>
		</div>
	</div>
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
			<div class="item col-md-4 col-sm-4 col-xs-12">
				<div class="inner">
					<div class="mask">
						<img src="<?php echo base_url('assets/upload/projects/'. $value['project_avatar']) ?>" alt="img">
						<div class="overlay"></div>
						<div class="top">
							<span class="nation"><?php echo $value['project_location'] ?></span>
							<span class="name"><?php echo $value['project_title'] ?></span>
							<span class="brand"><?php echo $value['project_customer'] ?></span>
							<span class="field"><?php echo $type ?> - <?php echo $secondary_filter ?></span>
						</div>
						<div class="bottom">
							<a class="btn btn-outline" role="button">Explore</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		<?php endif ?>
	</div>
</section>