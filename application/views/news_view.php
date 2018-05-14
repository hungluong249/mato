<!--<section class="cover cover_blog">
	<div class="cover_inner">
    	<img src="<?php echo base_url('assets/public/img/about_cover.jpg'); ?>">
    </div>
    <div class="cover_wrapper">
    </div>
</section>-->

<section class="main_content col-lg-12 col-md-12 col-sm-12 col-xs-12">
	
	<div class="container center-block">
    	<!--<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
        </div>-->
        <?php foreach($news as $key => $item): ?>
        	<div class="blog_item col-lg-6 col-md-6 col-sm-6 col-xs-12">
            	<div class="blog_title">
                	<h2><?php echo $item['news_title']; ?></h2>
                    <p class="post_date"><?php echo $item['news_created']; ?></p>
                </div>
                <div class="blog_cover">
                	<img src="<?php echo base_url('assets/upload/news/' . $item['news_description_image']); ?>">
                </div>
                <div class="blog_content">
                	<p class="post_date"><?php echo $item['news_description']; ?></p>
                    <a href="<?php echo site_url('news/detail/' . $item['news_id']); ?>" class="blog_readmore">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>    
        <?php endforeach; ?>
    </div>
    
</section>