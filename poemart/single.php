<?php
/**
 * The template for displaying all single posts
 */

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
			<li><a href="#">Home</a></li>
			<li class="current-menu-item"><a href="#">Blog</a></li>
		</ul>
	</div>
</div>
<div class="blogHolder">
	<div class="container">
		<div class="blogListingHolder">
			<div class="blogleft">	
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="blogmain-details">	
			<h2><?php the_title(); ?></h2>
			<h3>by <?php the_author(); ?>/ <?php the_time( 'F j, Y' ); ?></h3>
			<div class="blgdtlsimg"><?php the_post_thumbnail('full'); ?></div>		   				
					<?php the_content(); ?>	

			<div class="contactdtls">
			<h4>Contact me:</h4>
			 <p>If you would like to have your BRAND headshot for LinkedIn, please call <a href="tel:(925) 878-1992" class="a-brown">(925) 878-1992</a> or <br>
			 email: <a href="mailto:info@10PlusBrand.com" class="a-brown">info@10PlusBrand.com</a> or visit my website for branding: <a href="javascript:void(0);" class="a-blue">10PlusBrand.com</a>, or my website for photography: <a href="javascript:void(0);" class="a-blue">www.PoemAndArt.com</a></p>
			 <p>Thank you!</p>
			<p>Written by Joanne Tan. Text edited by Glenn Perkins. “After” versions of photos by Joanne Tan. 
			© Joanne Tan, 2020. All rights reserved.</p>
			 </div>			
			</div>
			
			<div class="leavearea">
			<?php comments_template(); ?>
				<a href="javascript:void(0);" onclick="history.back()"  class="prv-btn-frm"><i class="fas fa-long-arrow-alt-left"></i>Previous</a>
			</div>
					
			<?php endwhile; ?>	
			</div>
			<div class="blogRight">			    
				<?php dynamic_sidebar( 'sidebar1' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();



