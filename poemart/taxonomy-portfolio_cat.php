<?php
/**
 * The template for displaying all portfolio category pages
 */
get_header(); ?>
    <?php 
$tax = get_queried_object();

$term = get_queried_object();
$children = get_terms( $term->taxonomy, array(
    'parent'    => $term->term_id,
    'hide_empty' => false
) );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$limit = get_option('posts_per_page');
?>
    <div class="banner" id="bg">
        <div class="topSliderListing">
            <div class="sliderItem">
                <?php $bf= the_field('category_banner');?>
                <?php if ($bf):?>
                <div class="bannerImage"> <img src="<?php the_field('category_banner'); ?>" alt=""> </div>
            <?php else:?>
            <img src="<?php echo get_template_directory_uri();?>/assets/images/tistingPageBanner.jpg" alt="">            
            <?php endif;?>
            </div>
        </div>
    </div>
    <div class="breadcumbHolder">
        <div class="container">
            <ul>
                <li><a href="<?php echo site_url();?>">Home</a></li>
                <li><a href="<?php echo site_url();?>/portfolio">Portfolio</a></li>
                <li class="current-menu-item"><a href="#"><?php echo $tax->name; ?></a></li>
            </ul>
        </div>
    </div>
    <?php if($children) { ?>
        <div class="listingHolder">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3">
                        <div class="sideBar">
                            <h2><?php echo $tax->name; ?></h2>
                            <div class="sideMenu">
                                <ul>
                                    <?php wp_nav_menu( array( 'theme_location' => 'subcatmenu', 'container_class' => '' ) );?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="mainListingSection">
                        <?php
                        $args = array (
                            'post_type'              => 'ourportfolio',
                            'showposts'              => $limit,
                            'order'                  => 'DESC',
                            'orderby'                => 'ID',
                            'paged'                  => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'portfolio_cat',
                                    'field' => 'term_id',
                                    'terms' => $term->term_id,
                                )
                            )
                        );
                        $query = new WP_Query( $args );
                        if ($query-> have_posts() ) {
                        ?>
                            <div class="row">
                                <?php
                                while ( $query->have_posts() ) { $query->the_post();
                                    $pimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                ?>
                                    <div class="col-lg-6">
                                        <a class="popup" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#interestedtoBuy_1" data-pname="<?php the_title(); ?>" data-pimage="<?php echo $pimage; ?>">
                                            <div class="repCard">
                                                <div class="repImage hover15">
                                                    <figure>
                                                        <?php the_post_thumbnail('prot_thumb');?>
                                                    </figure>
                                                </div>
                                                <div class="repTitle">
                                                    <h2><?php the_title(); ?></h2> </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php
                        }
                        ?>
                            <div class="pageBreadcumb text-center">
                                <?php wp_pagenavi( array( 'query' => $query ) );?>
                                <?php wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
            <?php 
    }else{
    if($term->parent==0){   
    ?>
                <div class="gallerySliderHolder">
                    <div class="sliderHolder">
                        <div class="center">
                            <?php $args = array('post_type' => 'ourportfolio','tax_query' => array(array('taxonomy' => 'portfolio_cat','field' => 'term_id','terms' => $tax->term_id)),'posts_per_page' => -1);
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="item">
                                    <figure>
                                        <?php the_post_thumbnail('full'); ?>
                                    </figure>
                                </div>
                                <?php endwhile; wp_reset_query(); ?>
                        </div>
                        <div id="prev" class="carousel-prev"><i class="fas fa-long-arrow-alt-left"></i></div>
                        <div id="next" class="carousel-next"><i class="fas fa-long-arrow-alt-right"></i></div>
                    </div>
                </div>
                <?php }else{ ?>
                    <div class="listingHolder">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-xl-3">
                                    <div class="sideBar">
                                        <h2><?php echo $tax->name; ?></h2>
                                        <div class="sideMenu">
                                            <ul>
                                                <?php //add active class
                                                    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

                                                    function special_nav_class ($classes, $item) {
                                                        if (in_array('current-menu-item', $classes) ){
                                                            $classes[] = 'current-menu-item ';
                                                        }
                                                        return $classes;
                                                    }?>
                                                <?php wp_nav_menu( array( 'theme_location' => 'subcatmenu', 'container_class' => '' ) );?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="mainListingSection">
                                        <?php                           
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    $args = array (
                        'post_type'              => 'ourportfolio',
                        'showposts'              => $limit,
                        'order'                  => 'DESC',
                        'orderby'                => 'ID',
                        'paged'                  => $paged,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio_cat',
                                'field' => 'term_id',
                                'terms' => $term->term_id,
                            )
                        )
                    );
                    $query = new WP_Query( $args );
                    if ($query-> have_posts() ) {
                    ?>
                                            <div class="row">
                                                <?php
                                                while ( $query->have_posts() ) { $query->the_post();
                                                    $pimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                                ?>
                                                    <div class="col-lg-6">
                                                        <a class="popup" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#interestedtoBuy_1" data-pname="<?php the_title(); ?>" data-pimage="<?php echo $pimage; ?>">
                                                            <div class="repCard">
                                                                <div class="repImage hover15">
                                                                    <figure>
                                                                        <?php the_post_thumbnail('prot_thumb');?>
                                                                    </figure>
                                                                </div>
                                                                <div class="repTitle">
                                                                    <h2><?php  the_title(); ?></h2> </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                            </div>
                                            <?php } ?>
                                                <div class="pageBreadcumb text-center">
                                                    <?php wp_pagenavi( array( 'query' => $query ) );?>
                                                        <?php wp_reset_query(); ?>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>

                    <!-- Modal common for all -->
                    <div class="modal fade" id="interestedtoBuy_1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable buyPopup">
                            <div class="modal-content">
                                <div class="modal-body buyPopup2">
                                    <div class="closeBtn">
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri();?>/assets/images/closeBtn.png" alt=""></button>
                                    </div>
                                    <div class="buyPopupInner">
                                        <div class="buyPopImage"> <img id="propertyImage" src="<?php echo get_template_directory_uri();?>/assets/images/popupImage.jpg" alt=""> </div>
                                        <div class="buyPopDetails">
                                            <h2>Interested tao buy</h2>
                                            <p>Each piece of art is unique. Each piece is priced uniquely. Please fill out your contact information and specification, we will let you know the price for your order.</p>
                                            <div class="response"></div>
                                            <form action="" method="post" name="enquiry" id="enquiry">
                                                <input type="hidden" name="pname" id="pname" value="">
                                                <input type="hidden" name="pimage" id="pimage" value="">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" name="first_name" id="first_name" placeholder="First Name:*"> </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="last_name" id="last_name" placeholder="Last Name:*"> </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="email" id="email" placeholder="Email:*"> </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="phone_number" id="phone_number" placeholder="Phone No:"> </div>
                                                    <div class="col-lg-12">
                                                        <div class="buyPopDetailsBottom">
                                                            <p>Please let us know if you'd like to order download license or print, and what size of the print, by checking below:</p>
                                                            <div class="chkHolder">
                                                                <div class="radHolder">
                                                                    <input type="radio" name="orderPrint" id="radio1" class="css-checkbox" value="Digital download license" checked>
                                                                    <label for="radio1" class="css-label radGroup2">Digital download license</label>
                                                                </div>
                                                                <div class="radHolder minWidthCn">
                                                                    <input type="radio" name="orderPrint" id="watch-me" class="css-checkbox" value="Order print">
                                                                    <label for="watch-me" class="css-label radGroup2">Order print</label>
                                                                    <div id="show-me" class="showRadOption">
                                                                        <div class="selectedMessage"></div>
                                                                        <div class="chkCn">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="5 X 7">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 5 X 7</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="4 X 6">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 4 X 6</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="8 X 10">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 8 X 10</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="8.5 X 11">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 8.5 X 11</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="9 X 16">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 9 X 16</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="10 X 16">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 10 X 16</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="12 X 24">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 12 X 24</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="5 X 7">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 16 X 24</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input sizeCheckBox" type="checkbox" name="order_print_arr[]" value="5 X 7">
                                                                                <label class="form-check-label" for="flexCheckDefault"> 24 X 36 or larger</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="radHolder">
                                                                    <input type="radio" name="orderPrint" id="radio3" class="css-checkbox" value="Digital download license">
                                                                    <label for="radio3" class="css-label radGroup2">NFT</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="popfrmFooter">
                                                            <textarea placeholder="Comments:*" name="comment" id="comment"></textarea>
                                                        </div>
                                                        <div class="submitBtnHolder">
                                                            <input type="submit" name="" value="Submit Now" id="submit-btn">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="action" value="enquiry_form" style="display: none; visibility: hidden; opacity: 0;">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php get_footer();?>

                    <script type="text/javascript">
                    jQuery(document).on('click', '.popup', function() {
                        jQuery('.response').html('');
                        var pname   = jQuery(this).data('pname');
                        var pimage  = jQuery(this).data('pimage');
                        jQuery('#pname').val(pname);
                        jQuery('#pimage').val(pimage);
                        jQuery('#propertyImage').attr("src", pimage);
                    });
                    jQuery( 'form[name="enquiry"]' ).on('submit', function() {
                        jQuery('.response').html('');
                        jQuery('.selectedMessage').html('');
                        if (jQuery('#first_name').val() != '' && jQuery('#last_name').val() != '' && jQuery('#email').val() != '' && jQuery('#comment').val() != '') {
                            if ( jQuery('#watch-me').val() == 'Order print' ) {
                                if ( jQuery('.sizeCheckBox').filter(':checked').length < 1 ) {
                                    jQuery('.selectedMessage').html('<p style="color: red;">Please select atleast one size.</p>');
                                    return false;
                                } else {
                                    jQuery('.selectedMessage').html('');
                                }
                            } else {
                                jQuery('.selectedMessage').html('');
                            }

                            jQuery('#submit-btn').val('Submitting...');
                            jQuery('#submit-btn').prop('disabled', true);
                            jQuery.ajax({
                                url : '<?php echo admin_url( "admin-ajax.php" ); ?>',
                                type : 'POST',
                                data : jQuery(this).serialize(),
                                success : function( response ) {
                                    if (response == 'success') {
                                        jQuery('.response').html('<p style="color: green;">Email sent successfully.</p>');
                                        if ( jQuery('#watch-me').val() == 'Order print' ) {
                                            jQuery('#show-me').hide();
                                        }
                                        jQuery('#enquiry')[0].reset();
                                        setTimeout(function() {
                                            jQuery('#interestedtoBuy_1').modal('toggle');
                                        }, 3000);
                                    } else {
                                        jQuery('.response').html('<p style="color: red;">Oops! Something went wrong, please try again later.</p>');
                                    }
                                    jQuery('#submit-btn').val('Submit Now');
                                    jQuery('#submit-btn').prop('disabled', false);
                                    jQuery('.selectedMessage').html('');
                                },
                                fail : function( err ) {
                                    jQuery('.response').html('<p style="color: red;">Oops! Something went wrong, please try again later.</p>');
                                    jQuery('#submit-btn').val('Submit Now');
                                    jQuery('#submit-btn').prop('disabled', false);
                                    jQuery('.selectedMessage').html('');
                                }
                            });
                        } else {
                            jQuery('.response').html('<p style="color: red;">*Please fill the required fields.</p>');
                            jQuery('.selectedMessage').html('');
                        }
                        // This return prevents the submit event to refresh the page.
                        return false;
                    });
                    </script>
                    
                    