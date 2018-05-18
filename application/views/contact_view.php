<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/scss/contact.min.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<section class="map" id="map">
</section>

<section class="contact container">
	<div class="title">
		<div class="heading">
			<h4>Contact Us</h4>
			<h1>Mato Creative</h1>
		</div>
	</div>
	<div class="row">
		<div class="left col-md-4 col-sm-4 col-xs-12">
			<h4>Address</h4>
			<p>Tầng 4 - 19 Nguyễn Bỉnh Khiêm</p>
			<p>Hai Bà Trưng - Hà Nội</p>
			<h4>Email / Hotline</h4>
			<p>hello@matocreative.vn</p>
			<p>(+84) 988 613 690</p>
		</div>
		<div class="right col-md-8 col-sm-8 col-xs-12">
			<div>
				<span style="color:red"><?php echo $this->session->flashdata('message'); ?></span>
			</div>
            <?php
            echo form_open_multipart(base_url('contact/send_mail'), array('class' => 'form-horizontal'));
            ?>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
                    <?php
                    echo form_error('contact_name');
                    echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="InputName" placeholder="Name"');
                    ?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
                    <?php
                    echo form_error('contact_phone');
                    echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="InputPhone" placeholder="Phone"');
                    ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    echo form_error('contact_email');
                    echo form_input('contact_email', set_value('contact_email'), 'class="form-control" id="InputMail" placeholder="Email"');
                    ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    echo form_error('contact_content');
                    echo form_textarea('contact_content', set_value('contact_content', ''), 'class="form-control" rows="5" placeholder="Message..."');
                    ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12">
                    <?php echo form_submit('submit', 'Send', 'class="btn btn-default button"'); ?>
				</div>
			</div>
			<?php
            echo form_close();
            ?>
		</div>
	</div>
</section>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVldQrvD6TdflBLsoI9eNdXBUwHFwvp-c&callback=initMap">
</script>
<script>
    function initMap() {
        var uluru = {lat: 21.0166644, lng: 105.8484143};
        var iconBase = {
        }

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: uluru,
            scrollwheel: false,
            styles: [
                {elementType: 'geometry', stylers: [{color: '#d7d7d7'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#dfdfdf'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#646464'}]},
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#646464'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#989898'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#6b9a76'}]
                },
                {
                    featureType: 'poi.building',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#646464'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#ffffff'}]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#dfdfdf'}]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#646464'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#dfdfdf'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#868686'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{color: '#cccccc'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#646464'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#ababab'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#515c6d'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#17263c'}]
                }
            ]
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: "assets/public/img/marker.png"
        });
    }
</script>