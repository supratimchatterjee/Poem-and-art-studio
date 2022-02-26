<?php
/* Template Name: Poems */

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
	
	<div class="blogHolder">
        <div class="container">
            <div class="blogListingHolder">
                <div class="blogleft">
				    <?php
					$limit = get_option('posts_per_page');
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$poem = array('post_type' => 'poem', 'posts_per_page' => $limit,'order' => 'DESC', 'paged' => $paged);
					$tv_query = new WP_Query($poem);
					 while ($tv_query->have_posts()) : $tv_query->the_post();
					  get_template_part( 'content', get_post_format() ); 
					 endwhile;
					?>
					<ul class="prev_nextarea">
					<?php posts_nav_link(); ?>
					<li><?php previous_posts_link('<i class="fas fa-long-arrow-alt-left"></i>Prev') ?></li>
					<li><?php next_posts_link('Next<i class="fas fa-long-arrow-alt-right"></i>', $tv_query->max_num_pages) ?></li>
				 	</ul>					
						
					<?php /* else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; */?>                    
                </div>
                <div class="blogRight">
					<?php dynamic_sidebar( 'sidebar2' ); ?>		
                </div>
            </div>
        </div>
    </div>
            
<?php get_footer();
