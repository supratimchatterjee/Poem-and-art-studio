<?php
if ( ! isset( $content_width ) )
	$content_width = 604;



function poemandart_setup() {

	register_nav_menu( 'primary', __( 'Navigation Menu', 'poemandart' ) );
    register_nav_menu( 'primaryDesktop', __( 'Desktop Navigation Menu', 'poemandart' ) );    
    register_nav_menu( 'footer', __( 'Footer Menu', 'poemandart' ) );
    register_nav_menu( 'categorymenu', __( 'Category Menu', 'poemandart' ) );
    register_nav_menu( 'subcatmenu', __( 'Sub Category Menu', 'poemandart' ) );
    register_nav_menu( 'portraitsmenu', __( 'Portraits Menu', 'poemandart' ) );
    register_nav_menu( 'paintingsmenu', __( 'Paintings Menu', 'poemandart' ) );


 	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'customer', 72, 72, true );
	add_image_size( 'prot_thumb', 506, 288, true );
	add_image_size( 'blog_thumb', 413, 299, true );


	set_post_thumbnail_size( 604, 270, true );
}
add_action( 'after_setup_theme', 'poemandart_setup' );



function poemandart_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'poemandart_wp_title' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'poemandart_wp_title', 10, 2 );



function poemandart_scripts_styles() {
    wp_enqueue_style( 'poemandart-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'poemandart-style', get_stylesheet_uri(), array(), '2021-10-07' );
	
}
add_action( 'wp_enqueue_scripts', 'poemandart_scripts_styles' );



function poemandart_widgets_init() {   
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'poemandart' ),
        'id'            => 'sidebar1',
        'before_widget' => '<div class="blog-right-first-bx">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
	
	register_sidebar( array(
        'name'          => __( 'Poem Sidebar', 'poemandart' ),
        'id'            => 'sidebar2',
        'before_widget' => '<div class="blog-right-first-bx">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer widget 1', 'poemandart' ),
        'id'            => 'footerwidget1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer widget 2', 'poemandart' ),
        'id'            => 'footerwidget2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'poemandart_widgets_init' );


function poemandart_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

function poemandart_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';
	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';
	return $classes;
}
add_filter( 'body_class', 'poemandart_body_class' );


/**
 * Allow HTML in term (category, tag) descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
    if ( ! current_user_can( 'unfiltered_html' ) ) {
        add_filter( $filter, 'wp_filter_post_kses' );
    }
}
 
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}


function custom_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length');


include("inc-function/theme-setting.php");

/**
 * Add poem post type
 */
function create_poems_post_type() {
	register_post_type( 'poem',
		array(
			'labels' => array(
				'name' => 'Poems',
				'singular_name' => 'Poem',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Poem',
				'edit_item' => 'Edit Poem',
				'new_item' => 'New Poem',
				'view_item' => 'View Poem',
				'search_items' => 'Search Poems',
				'not_found' =>  'Nothing Found',
				'not_found_in_trash' => 'Nothing found in the Trash',
				'parent_item_colon' => ''
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-text-page',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		)
	);
}
add_action( 'init', 'create_poems_post_type' );

function my_taxonomies_poems() {
    $labels = array(
        'name'              => _x( 'Poem Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Poem Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Poem Categories' ),
        'all_items'         => __( 'All Poem Categories' ),
        'parent_item'       => __( 'Parent Poem Category' ),
        'parent_item_colon' => __( 'Parent Poem Category:' ),
        'edit_item'         => __( 'Edit Poem Category' ), 
        'update_item'       => __( 'Update Poem Category' ),
        'add_new_item'      => __( 'Add New Poem Category' ),
        'new_item_name'     => __( 'New Poem Category' ),
        'menu_name'         => __( 'Poem Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'poem-cat', 'poem', $args );
}
add_action( 'init', 'my_taxonomies_poems', 0 );



/*Create FAQ Post*/
add_action( 'init', 'register_slider' );
function register_slider() {
    $labels = array( 
        'name' => _x( 'All Slider', 'slider' ),
        'singular_name' => _x( 'Slider', 'slider' ),
        'add_new' => _x( 'Add New', 'slider' ),
        'add_new_item' => _x( 'Add New Slider', 'slider' ),
        'all_items'    =>  _x( 'All Slider', 'slider' ),
        'edit_item' => _x( 'Edit Slider', 'slider' ),
        'new_item' => _x( 'New Slider', 'slider' ),
        'view_item' => _x( 'View Slider', 'slider' ),
        'search_items' => _x( 'Search Property', 'slider' ),
        'not_found' => _x( 'No property found', 'slider' ),
        'not_found_in_trash' => _x( 'No property found in Trash', 'slider' ),
        'parent_item_colon' => _x( 'Parent Slider:', 'slider' ),
        'menu_name' => _x( 'Slider', 'slider' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor' , 'thumbnail'),
        'public' => true,
        'menu_icon' => 'dashicons-insert',
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'slider', $args );
}



add_action( 'init', 'create_portfolio' );
function create_portfolio() {
    register_post_type( 'ourportfolio',
        array(
            'labels' => array(
                'name' => _x( 'Portfolio', 'ourportfolio' ),
                'singular_name' => _x( 'Portfolio', 'ourportfolio' ),
                'add_new' => 'Add New Portfolio',
                'add_new_item' => 'Add New Portfolio',
                'all_items'    =>  _x( 'All Portfolio', 'ourportfolio' ),
                'edit_item' => 'Edit Menu',
                'new_item' => 'New Portfolio',
                'view_item' => 'View Menu',
                'search_items' => 'Search Menu',
                'not_found' =>  'Nothing Found',
                'not_found_in_trash' => 'Nothing found in the Trash',
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_icon' => 'dashicons-insert',
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title','thumbnail')
        )
    );
}

function my_taxonomies_port_cat() {
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Portfolio Categories' ),
        'all_items'         => __( 'All Portfolio Categories' ),
        'parent_item'       => __( 'Parent Portfolio Category' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:' ),
        'edit_item'         => __( 'Edit Portfolio Category' ), 
        'update_item'       => __( 'Update Portfolio Category' ),
        'add_new_item'      => __( 'Add New Portfolio Category' ),
        'new_item_name'     => __( 'New Portfolio Category' ),
        'menu_name'         => __( 'Portfolio Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_admin_column' => true,
        'supports' => array( 'thumbnail' ),
        'show_ui' => true
    );
    register_taxonomy( 'portfolio_cat', 'ourportfolio', $args );
}
add_action( 'init', 'my_taxonomies_port_cat', 0 );


function javascript_variables() { ?>
    <script type="text/javascript">
        var ajax_url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        var ajax_nonce = '<?php echo wp_create_nonce( "secure_nonce_name" ); ?>';
    </script>
<?php
}
add_action ( 'wp_head', 'javascript_variables' );

add_action('wp_ajax_enquiry_form', 'enquiry_form'); // This is for authenticated users
add_action('wp_ajax_nopriv_enquiry_form', 'enquiry_form'); // This is for unauthenticated users.
function enquiry_form() {
    if ( empty( $_POST["first_name"] ) ) {
        echo "Please enter first name";
        wp_die();
    }
    if ( empty( $_POST["last_name"] ) ) {
        echo "Please enter last name";
        wp_die();
    }
    if ( ! filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL ) ) {
        echo 'Please enter valid email';
        wp_die();
    }
    if ( empty( $_POST["comment"] ) ) {
        echo "Please enter comment";
        wp_die();
    }

    if ( !empty( $_POST["first_name"] ) && !empty( $_POST["last_name"] ) && !empty( $_POST["email"] ) ) {
        $to     = 'virginworkz@gmail.com';
        $subject= 'Enquiry Form - '. get_option('blogname');
        
        $body  = 'Post Title: ' . $_POST['pname'] . '<br>';
        $body  = 'First Name: ' . $_POST['first_name'] . '<br>';
        $body .= 'Last Name: ' . $_POST['last_name'] . '<br>';
        $body .= 'Email: ' . $_POST['email'] . '<br>';
        $body .= 'Phone No: ' . $_POST['phone_number'] . '<br>';
        $body .= 'Order Type: ' . $_POST['orderPrint'] . '<br>';
        if ($_POST['orderPrint'] == 'Order print') {
            if ( isset($_POST['order_print_arr']) && count($_POST['order_print_arr']) > 1) {
                $sizes = implode(',', $_POST['order_print_arr']);
            } else {
                $sizes = $_POST['order_print_arr'][0];
            }
            $body .= 'Size Of The Print: ' . $sizes . '<br>';
        }
        $body .= 'Comment: ' . $_POST['comment'] . '<br>';
        $body .= 'Image: <a href="'.$_POST['pimage'].'">Click here</a><br>';

        $headers[] = 'Content-type: text/html; charset=UTF-8';
        $headers[] = 'From: ' . get_option('blogname') . ' <' . get_option('admin_email') . '>';
 
        // $headers = array('Content-Type: text/html; charset=UTF-8');
     
        if (wp_mail( $to, $subject, stripslashes($body), $headers ) ) {
            echo 'success';
        } else {
            echo 'error';
        }
 
        wp_die();
    } else {
        echo 'error';
        wp_die();
    }
}


function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');




