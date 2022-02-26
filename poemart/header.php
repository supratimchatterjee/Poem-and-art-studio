<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- Bootstrap core CSS -->
<link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link href="<?php echo get_template_directory_uri(); ?>/assets/fonts/fonts.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.css" integrity="sha512-NDcw4w5Uk5nra1mdgmYYbghnm2azNRbxeI63fd3Zw72aYzFYdBGgODILLl1tHZezbC8Kep/Ep/civILr5nd1Qw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/css/hover.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
</head>
  
<body>
  <?php $logo = of_get_option('logo');
  $topbar = of_get_option('topbar');
  $topbaren = of_get_option('topbaren');
  $hire = of_get_option('hire'); ?>
    <header class="header">
      <?php if(!empty($topbaren)){ ?>
        <div class="headerTop">
            <div class="container text-center">
                <?php echo wpautop($topbar); ?>
            </div>
        </div>
      <?php } ?>
        <div class="headerMain">
            <div class="container">
                <div class="headerCn">
                    <?php if(!empty($logo)){ ?>
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <picture><img src="<?php echo $logo; ?>" alt=""></picture>
                        </a>
                    </div>
                    <?php }else{ ?>
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <picture><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt=""></picture>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="headerRight">
                        
                        <div class="navHolderDesktop">
                            <div class="menuDesk">
                                <?php wp_nav_menu( array( 'theme_location' => 'primaryDesktop', 'container' => '', 'menu_class' => '' ) ); ?>
                            </div>
                        </div>

                        <div class="navHolder">
                            <div class="ddsmoothmenu navigation" id="smoothmenu1">
                                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => '' ) ); ?>
                            </div>
                        </div>
                        <?php if(!empty($hire)){ ?>
                        <div class="hireBtn">
                            <a href="<?php echo $hire; ?>" class="hvr-shutter-out-horizontal2">Contact Us</a>
                        </div>
                        <?php } ?>
                        <div class="menuIcon">
                            <a class="animateddrawer" id="ddsmoothmenu-mobiletoggle" href="#"><span></span></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="smallNav"></div>
        <div class="clearfix"></div>
    </header>