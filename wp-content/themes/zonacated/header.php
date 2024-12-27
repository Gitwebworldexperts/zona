<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favicon.svg" />
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/common.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <?php wp_head(); ?>
</head>
<body>
<body <?php body_class(); ?>>
    <header class="header js-header">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="logo-web">
            <?php
             $custom_logo_id = get_theme_mod( 'custom_logo' );
             $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>
            <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                <div class="logo-box">
                    <img src="<?php echo $logo[0]; ?>" />
                </div>
            </a>
         </div>
         <div class="mobile-menu">
            <div class="nav-btn nav-slider">
               <span class="navbar-toggler-icon"></span>
            </div>
         </div>
         <div class="right-head">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'primary-menu',
                        'menu_class' => 'navbar-nav ml-lg-auto',
                    ));
                ?>
            </div>
         </div>
      </nav>
   </div>
</header>
<nav class="sidebar" id="accordion-menu">
   <div class="authfy-body">
      <div class="nav-header">
         <div class="logo-wrap">
            <div class="mobile-menu">
                <?php
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
               <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                  <div class="logo-box">
                     <img src="<?php echo $logo[0]; ?>" />
                  </div>
               </a>
            </div>
         </div>
      </div>
      <?php
        wp_nav_menu(array(
            'theme_location'  => 'primary-menu',
            'menu_class' => 'navbar-nav',
        ));
      ?>
      <!-- <ul class="navbar-nav">
         <li class="nav-item active">
            <a class="nav-link" href="index.html">Home</a>
         </li>
         <li><a href="index.html">Home</a></li>
         <li><a href="product.html">Products/Strains</a></li>
         <li><a href="find-zonacated.html">Find Zonacated</a></li>
         <li><a href="testing.html">Testing</a></li>
         <li><a href="about.html">Our Story</a></li>
         <li><a href="#">Merchandise</a></li>
         <li><a href="contact.html">Contact</a></li>
         <li class="nav-item dropdown Mobile-megamenu">
            <a class="nav-link" href="product.html">Products/Strains</a>
            <div class="dropdown-menu">
               <ul>
                  <li><a href="product-details.html">Mimosa</a></li>
                  <li><a href="product-details.html">Pineapple Burst</a></li>
                  <li><a href="product-details.html">Super Buff Cherries</a></li>
                  <li><a href="product-details.html">Meat Breath</a></li>
                  <li><a href="product-details.html">Slurricane</a></li>
                  <li><a href="product-details.html">Sundae Driver</a></li>
                  <li><a href="product-details.html">Skunk Piss</a></li>
                  <li><a href="product-details.html">Buttermilk Biscuits</a></li>
                  <li><a href="product-details.html">Strawberry Cheesecake</a></li>
                  <li><a href="product-details.html">Octane Mintz</a></li>
                  <li><a href="product-details.html">Garlic Breath</a></li>
                  <li><a href="product-details.html">Tear Gas</a></li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="find-zonacated.html">Find Zonacated</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="testing.html">Testing</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="about.html">Our Story</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#">Merchandise</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
         </li>
      </ul> -->
   </div>
</nav>