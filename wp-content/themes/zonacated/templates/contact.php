<?php /* Template Name: Contact Page */
get_header(); 
get_template_part( 'template-parts/inner-banner' );
?>
<section class="ContactSection space grayBg">
   <div class="container">
      <div class="row no-gutters">
         <?php if( have_rows('contact_info') ): ?>
         <div class="col-lg-4 col-md-5">
            <div class="contact-leftside">
               <div class="contact-leftImage">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/img/footer-logo.png" class="img-fluid">
               </div>
               <div class="ContactContent mb-0">
                  <ul>
                    <?php while( have_rows('contact_info') ): the_row(); 
                        $main_heading = get_sub_field('main_heading');
                        $sub_heading = get_sub_field('sub_heading');
                        $text = get_sub_field('text');
                     ?>
                     <li>
                        <?php if ($main_heading) :
                           echo "<h5>" .$main_heading. "</h5>";
                        endif; ?>
                        <?php if ($sub_heading) :
                           echo "<p>" .$sub_heading. "</p>";
                        endif; ?>
                        <?php if ($text) : ?>
                        <a href="mailto:<?= $text; ?>"><?= $text; ?></a>
                        <?php endif; ?>
                     </li>
                     <?php endwhile; ?>
                  </ul>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <div class="col-lg-8 col-md-7">
            <?php 
               $form_sub_heading = get_field('form_sub_heading');
               $form_main_heading = get_field('form_main_heading');
               $embed_map = get_field('map');
            ?>
            <div class="contact-RightSide">
               <div class="contact-RightHeading">
                  <p><?= $form_sub_heading; ?></p>
                  <h4><?= $form_main_heading; ?></h4>
               </div>
               <div class="BannerFormBox">
                   <?php echo do_shortcode('[contact-form-7 id="250ab3a" title="Contact form"]'); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?= $embed_map; ?>
<?php get_footer(); ?>