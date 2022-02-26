<?php $logo = of_get_option('logo');
  $facebook = of_get_option('facebook');
  $twitter = of_get_option('twitter');
  $instagram = of_get_option('instagram');
  $phone = of_get_option('phone');
  $email = of_get_option('email');
  $copyright = of_get_option('copyright'); ?>
  <div class="section4">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-5">
                    <div class="formHolder">
                        <h2>Contact Now</h2>
                        <?php echo do_shortcode('[contact-form-7 id="61" title="Contact form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 text-center">
                    <?php if(!empty($logo)){ ?>
                    <div class="footerLogo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo $logo; ?>" alt="">
                        </a>
                    </div>
                    <?php } ?>
                    <div class="social">
                        <ul>
                            <?php if(!empty($facebook)){ ?><li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
                            <?php if(!empty($twitter)){ ?><li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li><?php } ?>
                            <?php if(!empty($instagram)){ ?><li><a href="<?php echo $instagram; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li><?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="footerPadding">
                        <!-- <h2>Quick Link</h2> -->
                        <div class="footNav">
                            <?php //wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
                            <?php if ( is_active_sidebar( 'footerwidget2' ) ) : // if used.
                            dynamic_sidebar( 'footerwidget2' );  // show the sidebar.
                            endif;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <!-- <h2>Categories</h2> -->
                    <div class="footNav">
                        <?php if ( is_active_sidebar( 'footerwidget1' ) ) : // if used.
                            dynamic_sidebar( 'footerwidget1' );  // show the sidebar.
                            endif;
                        ?>
                        <?php //wp_nav_menu( array( 'theme_location' => 'categorymenu' ) ); ?>
                    </div>
                </div>
                <div class="col-xl-3">
                    <h2>Contact</h2>
                    <div class="contactDetails">
                      <?php if(!empty($phone)){ ?>
                        <div class="conHolder">
                            <div class="conIcon"><i class="fas fa-phone-alt"></i></div>
                            <div class="conDetails">
                                <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($email)){ ?>
                        <div class="conHolder">
                            <div class="conIcon"><i class="fas fa-envelope"></i></div>
                            <div class="conDetails">
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($copyright)){ ?>
                        <div class="copyright">
                            <?php echo wpautop($copyright); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>  
            </div>
        </div>
        <div id="toTop">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/backtoTop.png" alt=""></a>
        </div>
    </footer>
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js" integrity="sha512-UU0D/t+4/SgJpOeBYkY+lG16MaNF8aqmermRIz8dlmQhOlBnw6iQrnt4Ijty513WB3w+q4JO75IX03lDj6qQNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">var templateUrl = "<?php echo get_template_directory_uri(); ?>";</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script> 
<?php wp_footer(); ?>
</body>
</html>