<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="seacrh_cn">
		<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="What can we help you find? " />
		<input type="hidden" name="post_type" value="our_product" />
		<button type="submit" name="" value=""><img src="<?php echo get_template_directory_uri(); ?>/assets/images/searc_icon.png" alt=""></button>
	</div>
</form>