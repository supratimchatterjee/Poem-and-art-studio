<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>
<div class="banner" id="bg">
        <div class="topSliderListing">
            <div class="sliderItem">
                <div class="bannerImage">
                    <img src="<?php echo get_header_image(); ?>" alt="">
                </div>
            </div>
        </div>
    </div>

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
        </div>
    </div>
<?php get_footer();
