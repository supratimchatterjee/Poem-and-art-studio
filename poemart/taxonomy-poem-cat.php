<?php 
get_header(); ?>
<div class="banner" id="bg">
	<div class="topSliderListing">
		<div class="sliderItem">
			<div class="bannerImage">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blogbanner.jpg" alt="">
			</div>
		</div>
	</div>
</div>

<div class="breadcumbHolder">
	<div class="container">
		<ul>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
			<li class="current-menu-item"><a href="<?php echo esc_url( home_url( '/poems' ) ); ?>">Poems</a></li>
			<li class="current-menu-item"><a href="#"><?php if (have_posts()) : 
				if (is_category()) {
				 	echo single_cat_title();
				  } elseif ( function_exists ('is_tag') && (is_tag()) ) { 
				  	echo single_tag_title(); 
				  } elseif (is_day()) { 
				    the_time('jS F Y'); 
				  } elseif (is_month()) { 
				    the_time('F Y'); 
				  } elseif (is_year()) { 
				    the_time('Y'); 
				  } elseif (is_author()) { }
				endif; ?></a>
			</li>
		</ul>
	</div>
</div>


<div class="blogHolder">
	<div class="container">
		<div class="blogListingHolder">
			<div class="blogleft">		
				  <?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<div class="clearfix"></div>
					
					<ul class="prev_nextarea">
					<li><?php previous_posts_link( '<i class="fas fa-long-arrow-alt-left"></i>Prev' ); ?></li>
					<li><?php next_posts_link( 'Next<i class="fas fa-long-arrow-alt-right"></i>' ); ?></li>
					</ul>
					

					<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<div class="blogRight">			    
				<?php dynamic_sidebar( 'sidebar1' ); ?>
			</div>
		</div>
	</div>
</div>	

<?php get_footer(); ?>
