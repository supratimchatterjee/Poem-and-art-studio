<?php get_header(); ?>
<div class="banner_holder">
	<div class="inner_banner">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/about_banner.jpg" alt="">
		<div class="inner_banner_caption">
			<div class="container text-center wow fadeInUp">
				<h1><?php
					printf(
						/* translators: %s: Search term. */
						esc_html__( 'Results for "%s"', 'poemandart' ),
						'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</div>
		</div>
	</div>
</div>
<div class="inner_content_top_section">
	<div class="inner_section_1">
		<div class="container">
			<div class="section_header text-center">
				<h2><?php
					printf(
						esc_html(
							/* translators: %d: The number of search results. */
							_n(
								'We found %d result for your search.',
								'We found %d results for your search.',
								(int) $wp_query->found_posts,
								'poemandart'
							)
						),
						(int) $wp_query->found_posts
					);
					?>
				</h2>
			</div>
			<div class="product_listing_holder">
				<div class="row">

		    		<?php // Start the Loop.
					while ( have_posts() ) { the_post();
		    		$sub_title = get_field('sub_title');
					$more_details = get_field('more_details');
					$download_text = get_field('download_text');
					$download_file = get_field('download_file'); ?>	
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="product_bx">
							<div class="product_img">
								<figure class="effect-lily"><?php the_post_thumbnail('full'); ?></figure>
							</div>
							<div class="product_title"><h3><?php the_title(); ?> <span><?php echo $sub_title; ?></span></h3></div>
							<div class="product_desc">
								<?php the_content(); ?>
							</div>
							<div class="product_benefit">
								<?php echo $more_details; ?>
							</div>
							<div class="download_pro">
								<a href="<?php echo $download_file; ?>"><?php echo $download_text; ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/download_icon.png" alt=""></a>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();
