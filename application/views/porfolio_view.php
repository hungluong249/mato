<section id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!--
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    
    <div class="carousel-inner" role="listbox">
        <div class="item active" id="slide_01">
            <img src="<?php echo base_url('assets/public/img/slide/slide_01.jpg'); ?>" alt="...">
            <div class="carousel-caption" id="slide_01_caption">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales lacus quis mauris mattis interdum. Fusce facilisis hendrerit libero, sit amet interdum nulla iaculis vitae. Fusce congue ultricies nulla, in pharetra felis mattis eget. Vivamus ornare nulla nulla, accumsan lobortis erat faucibus rutrum. Pellentesque cursus magna id tempus tincidunt.</p>
                <a class="hvr-outline-in">Read more...</a>
            </div>
        </div>
        <div class="item" id="slide_02">
            <img src="<?php echo base_url('assets/public/img/slide/slide_01.jpg'); ?>" alt="...">
            <div class="carousel-caption" id="slide_02_caption">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales lacus quis mauris mattis interdum. Fusce facilisis hendrerit libero, sit amet interdum nulla iaculis vitae. Fusce congue ultricies nulla, in pharetra felis mattis eget. Vivamus ornare nulla nulla, accumsan lobortis erat faucibus rutrum. Pellentesque cursus magna id tempus tincidunt.</p>
                <a class="hvr-outline-in">Read more...</a>
            </div>
        </div>
        <div class="item" id="slide_03">
            <img src="<?php echo base_url('assets/public/img/slide/slide_01.jpg'); ?>" alt="...">
            <div class="carousel-caption" id="slide_03_caption">
                <h1>Lorem ipsum dolor sit amet</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales lacus quis mauris mattis interdum. Fusce facilisis hendrerit libero, sit amet interdum nulla iaculis vitae. Fusce congue ultricies nulla, in pharetra felis mattis eget. Vivamus ornare nulla nulla, accumsan lobortis erat faucibus rutrum. Pellentesque cursus magna id tempus tincidunt.</p>
                <a class="hvr-outline-in">Read more...</a>
            </div>
        </div>
    </div>

    
    <a class="left carousel-control hidden-xs" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="fa fa-2x fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control hidden-xs" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="fa fa-2x fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    -->
</section>


<section class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container-fluid center-block">
        <div class="porfolio_index col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="porfolio_list col-lg-12 col-md-12 col-sm-12 col-xs-12" id="controls">
                <ul>
                    <li><a class="filter" data-filter="*">Tất cả Dự án</a></li>
                    <li><a class="filter" data-filter=".highlights">Dự án nổi bật</a></li>
                    <li><a class="filter" data-filter=".branding">Branding</a></li>
                    <li><a class="filter" data-filter=".website">Website</a></li>
                    <li><a class="filter" data-filter=".photography">Photography</a></li>
                    <li><a class="filter" data-filter=".packaging">Packaging</a></li>
                    <li><a class="filter" data-filter=".print">Print</a></li>
                    <li><a class="filter" data-filter=".marketing">Marketing</a></li>
                </ul>
            </div>
            <div class="porfolio_content col-lg-12 col-md-12 col-sm-12 col-xs-12" id="porfolio_index">
                <div class="porfolio-sizer"></div>
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
                    <div class="porfolio_item mix <?php echo strtolower($type); ?> <?php echo strtolower($secondary_filter); ?>" data-toggle="modal" data-target="#<?php echo $project['project_filter'] . '-' . $project['project_id']; ?>">
                        <div class="porfolio_inner">
                            <img src="<?php echo base_url('assets/upload/projects/' . $project['project_description_image']); ?>">
                            <div class="porfolio_wrapper brand_color">
                                <div class="porfolio_wrapper_content">
                                    <h2><?php echo $project['project_title']; ?></h2>
                                    <div class="porfolio_line"></div>
                                    <p><?php echo $type . (($secondary_filter != '') ? (' - ' . $secondary_filter) : $secondary_filter); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="<?php echo $project['project_filter'] . '-' . $project['project_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo $project['project_title']; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="prj_tags col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                        <h4> </h4>
                                        <h4>__</h4>
                                        <p class="post_date"><?php echo $project['project_created']; ?></p>
                                    </div>
                                    <div class="prj_info col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <h4>Thông tin dự án</h4>
                                        <h4>__</h4>
                                        <p><b>Khách hàng:</b> <?php echo $project['project_customer']; ?></p>
                                        <p><b>Địa điểm:</b> <?php echo $project['project_location']; ?></p>
                                        <p><b>Lĩnh vực:</b> <?php echo $project['project_type']; ?></p>
                                    </div>
                                    <div class="prj_intro col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h4><?php echo $type . (($secondary_filter != '') ? (' - ' . $secondary_filter) : $secondary_filter); ?></h4>
                                        <h1><?php echo $project['project_title']; ?></h1>
                                        <h4>__</h4>
                                        <p style="text-align:justify"><?php echo $project['project_description']; ?></p>
                                    </div>
                                    <div class="modal_content">
                                        <div class="blog_img">
                                            <?php echo $project['project_content']; ?>
                                        </div>
                                    </div>  
                                </div>
                                <!--<div class="modal-footer">
                                    <a class="hvr-sweep-to-top" data-dismiss="modal">Đóng</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>	        
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo site_url('assets/public/js/jquery-1.9.1.min.js'); ?>"></script>
<script src='http://imagesloaded.desandro.com/imagesloaded.pkgd.js'></script>
<script src="<?php echo site_url('assets/public/js/isotope.pkgd.min.js'); ?>"></script>
<script type="text/javascript">


	$('.porfolio_content').isotope({
		  // set itemSelector so .grid-sizer is not used in layout
		  itemSelector: '.porfolio_item',
		  percentPosition: true,
		  masonry: {
			columnWidth: '.porfolio_item'
		  }
	})
	var $grid = $('.porfolio_content').isotope({
	  // options
	});
	$('.porfolio_list li').on( 'click', 'a', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});
	$grid.imagesLoaded().progress( function() {
      $grid.isotope('layout');
    });

</script>