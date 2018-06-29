<!-- Contact Style-->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/scss/contact.min.css'); ?>">

<!--Contact JS -->
<script src="<?php echo site_url('assets/js/contact.min.js'); ?>"></script>

<section class="contact container-fluid">
	<div class="contact-head container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="heading">
					<h4 class="sub-title">Come and Talk with US</h4>
					<h1 class="title">
						Feeling <b>Free</b> to <b>Say Hello</b>
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-body container">
		<div class="row">
			<div class="intro col-sm-8 col-sm-offset-3 col-xs-12">
				<p>Vestibulum malesuada ipsum egestas gravida aliquam. Nullam pretium, massa non egestas congue, est dui tincidunt nunc, a eleifend dolor lorem id libero.</p>
			</div>
			<div class="info col-sm-8 col-sm-offset-4 col-xs-12">
				<div class="time" id="time">
					<h1></h1>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<h3>Our Address</h3>
						<p>4th Floor</p>
						<p>19 Nguyen Binh Khiem Street, Hai Ba Trung Dictrict,</p>
						<p>Hanoi, Vietnam</p>
					</div>
					<div class="col-sm-6 col-xs-12">
						<h3>Contact Us</h3>
						<p><a href="tel:(+84) 988 613 690">(+84) 988 613 690</a></p>
						<p><a href="mailto: hello@matocreative.vn">hello@matocreative.vn</a></p>
					</div>
				</div>
			</div>
			<div class="follow col-sm-8 col-sm-offset-3 col-xs-12">
				<h4>Follow Us on</h4>
				<ul class="list-inline">
					<li>
						<a href="https://www.facebook.com/Mato-Creative-330391013990260/" target="_blank">Facebook</a>
					</li>
					<li>/</li>
					<li>
						<a href="https://www.instagram.com/mato.creative/" target="_blank">Instagram</a>
					</li>
					<li>/</li>
					<li>
						<a href="https://www.pinterest.com/matocreative/" target="_blank">Pinterest</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="contact-request container">
		<div class="background"></div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="heading">
					<h4 class="sub-title">Send us a Message</h4>
					<h1 class="title">
						Fill this <b>Form</b>, please!
					</h1>
				</div>
				<div class="body">
                    <?php
                    echo form_open_multipart(base_url('contact/send_mail'), array('class' => 'form-horizontal'));
                    ?>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            
                            echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="InputName" placeholder="Name"');
                            echo form_error('contact_name', '<span class="error">', '</span>');
                            ?>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            
                            echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="InputPhone" placeholder="Phone"');
                            echo form_error('contact_phone', '<span class="error">', '</span>');
                            ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
                            <?php
                            
                            echo form_input('contact_email', set_value('contact_email'), 'class="form-control" id="InputMail" placeholder="Email"');
                            echo form_error('contact_email', '<span class="error">', '</span>');
                            ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
                            <?php
                            
                            echo form_textarea('contact_content', set_value('contact_content', ''), 'class="form-control" rows="5" placeholder="Message..."');
                            echo form_error('contact_content', '<span class="error">', '</span>');
                            ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
                            <?php echo form_submit('submit', 'Send your Message', 'class="btn btn-default button"'); ?>
						</div>
					</div>
                    <?php
                    echo form_close();
                    ?>
				</div>

				<div class="heading">
					<h4 class="sub-title">Wanna Start a Project</h4>
					<h1 class="title">
						Start <b>Right now</b>
					</h1>
					<a data-toggle="collapse" href="#requestForm" aria-expanded="false" aria-controls="requestForm">Request Form</a>
                    <?php if (isset($check)): ?>
                        <div class="collapse in" id="requestForm">
                    <?php else: ?>
                        <div class="collapse" id="requestForm">
                    <?php endif ?>
                    
                        <?php
                        echo form_open_multipart(base_url('contact/register_project'), array('class' => 'form-horizontal'));
                        ?>
						<h3>How can we contact you?</h3>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_input('request_name', set_value('request_name'), 'class="form-control" id="request_name" placeholder="Name"');
                                echo form_error('request_name', '<span class="error">', '</span>');
                                ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_input('request_position', set_value('request_position'), 'class="form-control" id="request_position" placeholder="Position"');
                                echo form_error('request_position', '<span class="error">', '</span>');
                                ?>
							</div>
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_input('request_company', set_value('request_company'), 'class="form-control" id="request_company" placeholder="Company"');
                                echo form_error('request_company', '<span class="error">', '</span>');
                                ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_input('request_email', set_value('request_email'), 'class="form-control" id="request_email" placeholder="Email"');
                                echo form_error('request_email', '<span class="error">', '</span>');
                                ?>
							</div>
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_input('request_phone', set_value('request_phone'), 'class="form-control" id="request_phone" placeholder="Phone Number"');
                                echo form_error('request_phone', '<span class="error">', '</span>');
                                ?>
							</div>
						</div>

						<h3>Which service are you looking for?</h3>
						<div class="row">
							<div class="col-sm-4 col-xs-12">
								<div class="checkbox">
									<label>
                                        <?php
                                        
                                        echo form_checkbox('request_service', 'Branding', FALSE);
                                        echo 'Branding';
                                        echo '<br />';
                                        echo form_error('request_service', '<span class="error">', '</span>');
                                        ?>
									</label>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="checkbox">
									<label>
                                        <?php
                                        
                                        echo form_checkbox('request_service', 'Website Design', FALSE);
                                        echo 'Website Design';
                                        echo '<br />';
                                        echo form_error('request_service', '<span class="error">', '</span>');
                                        ?>
									</label>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="checkbox">
									<label>
                                        <?php
                                        
                                        echo form_checkbox('request_service', 'Photography', FALSE);
                                        echo 'Photography';
                                        echo '<br />';
                                        echo form_error('request_service', '<span class="error">', '</span>');
                                        ?>
									</label>
								</div>
							</div>
						</div>

						<h3>Can you tell us about your budget and timeline?</h3>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_dropdown('request_budget', $option = array('' => 'Select One','0' => 'Under 500$', '1' => '500$ - 1500$', '2' => 'Above 1500$'), '', 'class="form-control"');
                                echo form_error('request_budget', '<span class="error">', '</span>');
                                ?>
							</div>
							<div class="col-sm-6 col-xs-12">
                                <?php
                                
                                echo form_dropdown('request_timeline', $option = array('' => 'Select One','0' => 'Under 1 month', '1' => '1 month - 3 month', '2' => 'Above 3 month'), '', 'class="form-control"');
                                echo form_error('request_timeline', '<span class="error">', '</span>');
                                ?>
							</div>
						</div>

						<h3>Tell us more about your plan?</h3>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_error('request_plan');
                                echo form_textarea('request_plan', set_value('request_plan', ''), 'class="form-control" rows="5" placeholder="Describe about your plan..."');
                                ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-xs-12">
                                <?php echo form_submit('submit', 'Submit your Request', 'class="btn btn-default button"'); ?>
							</div>
						</div>
                        <?php
                        echo form_close();
                        ?>
					</div>
				</div>
			</div>
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