<?php /* Template Name: Flowers Page */
get_template_part( 'template-parts/inner-banner' );
get_header();
$pid = get_the_ID();
 ?>
<section class="space AboutSection ">
   <div class="container">
   <div class="AboutMainContent afterNone mt-0 ">
      <div class="row  align-items-center justify-content-between">
         <?php if( have_rows('about_images') ): ?>
         <div class="col-md-6">
            <div class="AboutImageSection">
               <div class="AboutImageBox">
                  <?php while( have_rows('about_images') ): the_row(); 
                     $image = get_sub_field('image');
                  ?>
                  <div class="Aboutimg Aboutimg1">
                     <img src="<?= $image; ?>">
                  </div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <div class="col-md-6 col-lg-5">
            <?php
               $p_sheading = get_field('sub_heading');
               $p_mheading = get_field('main_heading');
            ?>
            <div class="AboutContent">
               <h4 class="wow fadeInUp">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/img/icon3.svg"> <?= $p_sheading; ?>
               </h4>
               <h2 class="wow fadeInUp"><?= $p_mheading; ?> <img src="<?php bloginfo('template_directory'); ?>/assets/img/img1.png">
               </h2>
               <?php if( have_rows('right_text',$pid) ): ?>
                  <?php while( have_rows('right_text',$pid) ): the_row();
                      $text = get_sub_field('text');
                   ?>
                     <p class="wow fadeInUp"><?= $text; ?></p>
                 <?php endwhile; ?>
               <?php endif; ?>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 mt-5">
            <?php
               $fpage_cont1 = get_field('flower_content1');
               $fpage_cont2 = get_field('flower_content2');
               $fpage_cont3 = get_field('flower_content3');
               
            ?>
            <div class="AboutContent contentFull wow fadeInUp">
               <?= $fpage_cont1; ?>
            </div>
         </div>
         <div class="col-md-6 col-lg-5">
            <div class="AboutContent wow fadeInUp">
               <?= $fpage_cont2; ?>
            </div>
         </div>
         <div class="col-md-6 col-lg-7">
            <?php
               $fs_head = get_field('fheading');
               $fm_head = get_field('fm_heading');
            ?>
            <div class="contact-RightSide">
               <div class="contact-RightHeading">
                  <p><?= $fs_head ; ?></p>
                  <h4><?= $fm_head; ?></h4>
               </div>
               <div class="BannerFormBox">
                  <?= do_shortcode('[contact-form-7 id="250ab3a" title="Contact form"]'); ?>
               </div>
            </div>
         </div>
         <div class="col-md-12 mt-5">
            <div class="AboutContent wow fadeInUp contentFull">
              <?= $fpage_cont3; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="space">
   <div class="container">
   	  <?php if (get_field('parterns_heading')) : ?>
      <div class="row">
         <div class="col-12">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?php the_field('parterns_heading'); ?></h3>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <div class="row">
         <?php if( have_rows('partners') ): ?>
         	<?php while( have_rows('partners') ): the_row(); 
	           $logo = get_sub_field('logo');
	           $link = get_sub_field('link');
	        ?>
	        <div class="col-lg-2 col-md-2">
	            <div class="partnershipsItem wow fadeInUp">
	               <div class="partnershipsImage">
	                  <a href="<?= $link; ?>"><img src="<?= $logo; ?>" class="img-fluid"></a>
	               </div>
	            </div>
	        </div>
            <?php endwhile; ?>
            <?php endif; ?>
      </div>
    </div>
</section>
<?php get_footer(); ?>