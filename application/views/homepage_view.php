<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/'); ?>fullpage/css/jquery.fullpage.min.css">

<!--Homepage JS -->
<script src="<?php echo site_url('assets/js/homepage.min.js'); ?>"></script>
  
<section class="homepage">
	<div id="fullpage">
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

		<div class="section">
			<div class="mask">
				<img src="<?php echo site_url('assets/upload/projects/' .$value['project_avatar']) ?>" alt="image project <?php echo $value['project_title'] ?> ">
			</div>
			<div class="overlay"></div>
			<div class="container">
				<div class="content col-md-offset-2 col-sm-offset-2">
					<div class="head">
                        <?php echo $value['project_title'] ?> - <?php echo $value['project_customer'] ?>
					</div>
					<div class="body">
						<a href="<?php echo base_url('porfolio/detail/'. $value['project_id']) ?>"><?php echo $value['project_title'] ?></a>
					</div>
					<div class="foot">
						<a href="<?php echo base_url('porfolio/detail/'. $value['project_id']) ?>">View detail</a>
					</div>
				</div>
			</div>
			<div class="quotation-request">
				<a href="">Quotation Request</a>
			</div>
		</div>
            <?php endif ?>
        <?php endforeach ?>

		<!-- Section About -->
		<div class="section">
			<div class="mask">
				<img src="https://images.unsplash.com/photo-1509395062183-67c5ad6faff9?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=fbaf57cfb9374309ad3153a5d27b7c78&auto=format&fit=crop&w=1400&q=80" alt="img About Us">
			</div>
			<div class="overlay"></div>
			<div class="container">
				<div class="content col-md-offset-2 col-sm-offset-2">
					<div class="head">
						Welcome to Mato Creative
					</div>
					<div class="body">
						<a href="<?php echo base_url('about/') ?>">Let's Find out Who we are</a>
					</div>
					<div class="foot">
						<a href="<?php echo base_url('about/') ?>">About Us</a>
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