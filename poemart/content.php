<div class="blogListingRepeater">
	<div class="blogdate">
		<div class="dateTop">
			<?php the_time( 'd' ); ?><span><?php the_time( 'm, Y' ); ?></span>
		</div>
		<div class="dateBottom">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/penIcon.png" alt="">
		</div>
	</div>
	<?php
	if ( has_post_thumbnail() ) {
	?>
	<div class="bloImage hover15">
		<figure><?php the_post_thumbnail('blog_thumb'); ?></figure>
	</div>
	<?php } ?>
	<div class="blogContent">
		<h2><?php the_title();?></h2>
		<div class="author">by <a href="#"><?php the_author(); ?></a></div>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="btnExplore hvr-shutter-out-horizontal2">Continue Reading</a>
	</div>
</div>