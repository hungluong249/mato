<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/scss/about.min.css'); ?>">

<section class="cover cover_about">
	<div class="cover_inner">
    	<img src="<?php echo base_url("assets/public/img/cover/cover_about.jpg"); ?>">
    </div>
    <div class="cover_wrapper">
    </div>
</section>


<section class="intro container">
	<div class="title">
		<div class="heading">
			<h4>About Us</h4>
			<h1>Mato Creative</h1>
		</div>
		<div class="content">
			<p>Mato Creative là công ty chuyên sâu về thiết kế nhận diện và truyền thông thương hiệu. Chúng tôi cung cấp một giải pháp về hình ảnh toàn diện để giúp doanh nghiệp nâng cao năng lực cạnh tranh trên thị trường. Chúng tôi luôn giao tiếp cởi mở và lắng nghe yêu cầu của khách hàng để có thể đảm bảo thấu hiểu yêu cầu sáng tạo ngay từ khi mới bắt đầu và đảm bảo tính nhất quán trong suốt quá trình thực thi dự án. Cam kết mang lại những giải pháp sáng tạo và hiệu quả, Mato Creative đồng hành cùng doanh nghiệp xây dựng thương hiệu phát triển.</p>
		</div>
	</div>
</section>

<section class="services container">
	<div class="title">
		<div class="heading">
			<h4>About Us</h4>
			<h1>Services</h1>
		</div>
	</div>

	<div class="content row">

		<div class="item col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0s">
			<a href="<?php echo base_url("services"); ?>" class="services_hover">
				<div class="item_head">
					<i class="flaticon-light-bulb"></i>
				</div>
				<div class="item_body">
					<h4>Branding</h4>
					<!--<p>Branding takes a very important part in customer’s decision making.</p>-->
				</div>
			</a>
		</div>
		<div class="item col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.1s">
			<a href="<?php echo base_url("services"); ?>" class="services_hover">
				<div class="item_head">
					<i class="flaticon-devices"></i>
				</div>
				<div class="item_body">
					<h4>Website Design</h4>
					<!--<p>Branding takes a very important part in customer’s decision making.</p>-->
				</div>
			</a>
		</div>
		<div class="item col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
			<a href="<?php echo base_url("services"); ?>" class="services_hover">
				<div class="item_head">
					<i class="flaticon-photo-camera"></i>
				</div>
				<div class="item_body">
					<h4>Photography</h4>
					<!--<p>Branding takes a very important part in customer’s decision making.</p>-->
				</div>
			</a>
		</div>
		<div class="item col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
			<a href="<?php echo base_url("services"); ?>" class="services_hover">
				<div class="item_head">
					<i class="flaticon-book"></i>
				</div>
				<div class="item_body">
					<h4>Packaging</h4>
					<!--<p>Branding takes a very important part in customer’s decision making.</p>-->
				</div>
			</a>
		</div>
		<div class="item col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
			<a href="<?php echo base_url("services"); ?>" class="services_hover">
				<div class="item_head">
					<i class="flaticon-symbol"></i>
				</div>
				<div class="item_body">
					<h4>Marketing Design</h4>
					<!--<p>Branding takes a very important part in customer’s decision making.</p>-->
				</div>
			</a>
		</div>
		<div class="item col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay=".5s">
			<a href="<?php echo base_url("services"); ?>" class="services_hover">
				<div class="item_head">
					<i class="flaticon-printer"></i>
				</div>
				<div class="item_body">
					<h4>Print</h4>
					<!--<p>Branding takes a very important part in customer’s decision making.</p>-->
				</div>
			</a>
		</div>
	</div>
</section>

<section class="clients container">
	<div class="title">
		<div class="heading">
			<h4>About Us</h4>
			<h1>Clients</h1>
		</div>
	</div>
	<div class="row">
		<?php if ($partners): ?>
		<?php foreach ($partners as $key => $value): ?>
			<div class="item col-sm-3 col-xs-6">
				<img src="<?php echo base_url("assets/upload/partners/" .$value['image']); ?>">
			</div>
		<?php endforeach ?>
		<?php endif ?>
	</div>

</section>

<section class="team container">
	<div class="title">
		<div class="heading">
			<h4>About Us</h4>
			<h1>Team</h1>
		</div>
	</div>

	<div class="row">
		<?php if ($teams): ?>
		<?php foreach ($teams as $key => $value): ?>
		<div class="item col-sm-3 col-xs-12 wow zoomIn" data-wow-delay="0s">
			<div class="inner">
				<img src="<?php echo base_url("assets/upload/teams/" .$value['image']); ?>">
				<div class="wrapper">
					<div class="content">
						<h3><?php echo $value['name'] ?></h3>
						<p><?php echo $value['position'] ?></p>
						<a href="<?php echo $value['facebook'] ?>" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
						<?php if ($value['instagram'] != ''): ?>
							<a href="<?php echo $value['instagram'] ?>" target="_blank"><i class="fa fa-2x fa-instagram"></i></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach ?>
		<?php endif ?>
	</div>

</section>


<!-- InstanceEndEditable -->