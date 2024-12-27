<?php if ( is_single()) : ?>
<section class="banner innerPageBanner" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/banner1.jpg);">
   <div class="slider-info">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
               <div class="slider-Content">
                  <h1 class="wow fadeInUp">
                     <span><?php single_post_title(); ?> </span>
                  </h1>
                  <div class="Breadcrumb wow fadeInUp">
                     <ul>
                        <li><a href="<?= get_site_url(); ?>">Home</a></li>
                        <li><?php single_post_title(); ?></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php else: ?>
<section class="banner innerPageBanner" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/banner1.jpg);">
   <div class="slider-info">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
               <div class="slider-Content">
                  <h1 class="wow fadeInUp">
                     <span><?= get_the_title(); ?></span>
                  </h1>
                  <div class="Breadcrumb wow fadeInUp">
                     <ul>
                        <li><a href="<?= get_site_url(); ?>">Home</a></li>
                        <li><?= get_the_title(); ?></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>