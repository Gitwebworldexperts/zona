<div class="backToTop">
   <div class="container-fluid">
      <a href="#" class="red-btn ml-auto"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon.png"> Back to top</a>
   </div>
</div>
<?php
$flogo = get_field('company_logo','option');
$about_info = get_field('about_info','option');
$copyright = get_field('copyright','option');
$label_1 = get_field('label_1','option');
$label_2 = get_field('label_2','option');
$phone_number = get_field('phone_number','option');
$email_id = get_field('email_id','option');
$address = get_field('address','option');
$fb = get_field('facebook','option');
$twitter = get_field('twitter','option');
$instagram = get_field('instagram','option');
$snapchat = get_field('snapchat','option');
?>
<div class="overlay-body" style="display: none;"></div>
<footer class="footer">
   <div class="container">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-12">
            <div class="footer-item">
               <div class="foot-logo">
                  <img src="<?php echo $flogo; ?>" class="" alt="logo" />
               </div>
               <p><?php echo $about_info; ?></p>
            </div>
         </div>
         <div class="col-lg-5 col-md-4 col-12">
            <div class="footer-title">
               <h4><?php echo $label_1; ?></h4>
            </div>
            <div class="footer-item list2Lines">
               <?php
                 wp_nav_menu(array(
                     'theme_location'  => 'footer-menu',
                 ));
                ?>
            </div>
         </div>
         <div class="col-lg-3 col-md-4 col-12">
            <div class="footer-title">
               <h4><?php echo $label_2; ?></h4>
            </div>
            <div class="footer-item border-0 m-0 p-0">
               <ul>
                  <li><a href="mailto:<?php echo $email_id; ?>"><?php echo $email_id; ?></a></li>
                  <li><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></li>
                  <li><a href="#"><?php echo $address; ?></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="copyright">
         <div class="row">
            <div class="col-md-6 ">
               <div class="copy-cont text-left">
                  <p><?php echo $copyright; ?></p>
               </div>
            </div>
            <div class="col-md-6 ">
               <div class="mediaBox">
                  <ul>
                     <?php if($fb): ?>
                     <li><a href="<?php echo $fb; ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/media/1.png" class="normal-img"> <img src="<?php bloginfo('template_directory'); ?>/assets/img/media/1-hover.png" class="hover-img"></a></li>
                     <?php endif; ?>
                     <?php if($twitter): ?>
                     <li><a href="<?php echo $twitter; ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/media/2.png" class="normal-img"> <img src="<?php bloginfo('template_directory'); ?>/assets/img/media/2-hover.png" class="hover-img"></a></li>
                     <?php endif; ?>
                     <?php if($instagram): ?>
                     <li><a href="<?php echo $instagram; ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/media/3.png" class="normal-img"> <img src="<?php bloginfo('template_directory'); ?>/assets/img/media/3-hover.png" class="hover-img"></a></li>
                     <?php endif; ?>
                     <?php if($snapchat): ?>
                     <li><a href="<?php echo $snapchat; ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/media/4.png" class="normal-img"> <img src="<?php bloginfo('template_directory'); ?>/assets/img/media/4-hover.png" class="hover-img"></a></li>
                     <?php endif; ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/owl.carousel.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/wow.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>
<script type="text/javascript">
   jQuery(document).ready(function($) {
       $('.sub-menu').each(function() {
           $(this).wrap('<div class="dropdown-menu"></div>');
       });
       $('.nav-tabs li:first-child a.nav-link').addClass('active');
      $('.ProductsTabs .tab-pane:nth-child(1)').addClass('active');
   });

</script>
</body>
</html>
