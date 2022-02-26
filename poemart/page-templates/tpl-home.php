<?php
/* Template Name: Home */

$portfolio_content = get_field('portfolio_content');
/* Video */
$mp4_video = get_field('mp4_video'); 
$video_title = get_field('video_title'); 
$create_video_link = get_field('create_video_link'); 
get_header(); ?>

<!-- Banner Section -->
  <div class="banner" id="bg">
        <div class="topSlider">
        	<?php $loop = new WP_Query( array( 'post_type' => 'slider', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="sliderItem">
                <div class="bannerImage">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <div class="bannerCaption">
                    <div class="container">
                        <div class="bannerCn">
                            <?php the_content(); ?>
                            <div class="buttonGroup">
                                <ul>
                                    <li><a href="#" class="hvr-shutter-out-horizontal">View Gallery</a></li>
                                    <li><a href="#" class="btnCategory hvr-shutter-out-horizontal">See Category</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
    <!-- End Banner Section -->
    <div class="section1" id="section1">
        <div class="scrollBottom">
            <a href="#section1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/scrollBottom.png" alt="">
            </a>
        </div>
        <div class="container">
        	<?php if(!empty($portfolio_content)){ ?>
            <div class="sectionHeading text-center">
		        <?php echo wpautop($portfolio_content); ?>
            </div>
        	<?php } ?>
            <div class="sec1Repeater">
                <div class="row">
                	<?php $categories = get_terms(array('taxonomy' => 'portfolio_cat', 'hide_empty' => false,'parent' => 0 ));
                    foreach ( $categories as $cat ) { 
                    	$image = get_field('image',$cat); ?>
                    <div class="col-lg-4">
                        <a href="<?php echo get_term_link($cat->slug, 'portfolio_cat') ?>">
                            <div class="repCard">
                                <div class="repImage hover15">
                                    <figure><img src="<?php echo $image; ?>" alt=""></figure>
                                </div>
                                <div class="repTitle">
                                    <h2><?php echo $cat->name; ?></h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($mp4_video)){ ?>
    <div class="section2">
        <video width="100%" autoplay muted loop muted style="object-fit: cover;" height="auto">
            <source src="<?php echo $mp4_video; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="section2Caption">
            <div class="container text-center">
                <h2><?php echo $video_title; ?></h2>
                <div class="text-center"><a href="<?php echo $create_video_link; ?>" class="btnExplore hvr-shutter-out-horizontal2" target="_blank">CREATE - Video</a></div>
            </div>
        </div>
    </div>
	<?php } ?>
    <div class="section3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="absoutImage">
                                <div class="aboutImageBorder">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutImageBorder.png" alt="">
                                </div>
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="aboutContent">
                            	<?php while ( have_posts() ) : the_post(); ?>
						        <?php the_content(); ?>
						        <?php endwhile; ?>
                                <a href="<?php the_permalink('7'); ?>" class="btnExplore hvr-shutter-out-horizontal2">Read Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php get_footer();
