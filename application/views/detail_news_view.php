<section class="cover cover_blog">
    <div class="cover_inner">
        <img src="<?php echo base_url('assets/public/img/about_cover.jpg'); ?>">
    </div>
    <div class="cover_wrapper">
    </div>
</section>

<section class="main_content col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="container center-block">
    	<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
        </div>
    	<div class="blog_post col-lg-8 col-md-8 col-sm-8 col-xs-12">
        	<div class="blog_post_shadow">
            </div>
            <div class="blog_post_inner">
            </div>
            <div class="blog_title">
            	<h2><?php echo $news['news_title']; ?></h2>
                <p class="post_date"><?php echo $news['news_created']; ?></p>
            </div>
            <div class="blog_cover">
            	<img src="<?php echo base_url('assets/upload/news/' . $news['news_description_image']); ?>">
            </div>
            <div class="blog_content">
            	<?php echo $news['news_content']; ?>
            </div>
        </div>
    </div>
</section>