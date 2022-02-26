<?php
/* Template Name: About */
get_header(); 

$content_box_title = get_field('content_box_title');
$content_box_subtitle = get_field('content_box_subtitle');
$middle_title = get_field('middle_title');
$middle_content = get_field('middle_content');
$middle_image = get_field('middle_image');
$last_title = get_field('last_title');
$last_content = get_field('last_content');
$last_image = get_field('last_image');
$video_title = get_field('video_title');
$video_content = get_field('video_content');
$video_image = get_field('video_image');
$video_url = get_field('video_url'); ?>
	<?php if(has_header_image()){ ?>
	<div class="banner" id="bg">
        <div class="topSliderListing">
            <div class="sliderItem">
                <div class="bannerImage">
                    <img src="<?php echo get_header_image(); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
    <div class="breadcumbHolder">
        <div class="container">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li class="current-menu-item"><a href="#"><?php the_title(); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="aboutholder">
        <div class="container">
            <div class="about-float-img-sec pb-142">
                <div class="about-img">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <?php while ( have_posts() ) : the_post(); ?>
		        <?php the_content(); ?>
		        <?php endwhile; ?>
            </div>

            <div class="about-secnd-sec pb-142">
                <?php if(!empty($content_box_title)){ ?><h3><?php echo $content_box_title; ?></h3><?php } ?>
                <?php if(!empty($content_box_subtitle)){ ?><h4><?php echo $content_box_subtitle; ?></h4><?php } ?>
                <?php if( have_rows('content_box_info') ): ?>
                <?php 
				$row = get_field('content_box_info', $post->ID);
				if($row < 1) {
				 $rows = 0;
				} else {
				 $rows = count($row);
				} 
				$c = 1; while( have_rows('content_box_info') ): the_row(); 
		        $title = get_sub_field('title');
		        $content = get_sub_field('content');
		        $image = get_sub_field('image');
		        ?>
		        <?php if($c%2 == 0){
		        $cls1 = '';
		        $cls2 = '';
		        }else{
		        $cls1 = 'order-xl-2';
		        $cls2 = 'order-xl-1';	
		        }  
		        if($c == $rows){
		        	$last = 'mb-0';
		        }else{
		        	$last = '';
		        } ?>
                <div class="flex-box <?php echo $last; ?>">
                    <div class="row justify-content-lg-between align-items-center">
                        <div class="col-xl-4 <?php echo $cls1; ?>">
                            <div class="flex-img"><img src="<?php echo $image; ?>" alt=""></div>
                        </div>
                        <div class="col-xl-7 <?php echo $cls2; ?>">
                            <h5><?php echo $title; ?></h5>
                            <?php echo wpautop($content); ?>
                        </div>
                    </div>
                </div>
                <?php $c++; endwhile; ?>
                <?php endif; ?>
             
            </div>
            <?php if(!empty($middle_image)){ ?>
            <div class="about-float-img-sec oilpainting-sec pb-142">
                <h3><?php echo $middle_title; ?></h3>
                <div class="about-img">
                    <img src="<?php echo $middle_image; ?>" alt="">
                </div>
                <?php echo wpautop($middle_content); ?>
            </div>
        	<?php } ?>

            <div class="about-secnd-sec about-frth-sec">
            	<?php if(!empty($last_image)){ ?>
                <div class="flex-box">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-6 order-xl-2">
                            <div class="flex-img"><img src="<?php echo $last_image; ?>" alt=""></div>
                        </div>
                        <div class="col-xl-5 order-xl-1">
                            <h3><?php echo $last_title; ?></h3>
                            <?php echo wpautop($last_content); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if(!empty($video_image)){ ?>
                <div class="flex-box mb-0">
                    <h3><?php echo $video_title; ?></h3>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-6 ">
                            <div class="flex-img position-relative"><img src="<?php echo $video_image; ?>" alt=""><a href="<?php echo $video_url; ?>" class="playbtn" data-lity><img src="<?php echo get_template_directory_uri(); ?>/assets/images/playbtn.png" alt=""></a></div>
                        </div>
                        <div class="col-xl-5">
                            <?php echo wpautop($video_content); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
<?php get_footer();
