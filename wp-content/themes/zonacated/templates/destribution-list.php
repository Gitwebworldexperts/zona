<?php /* Template Name: Destribution Page */
get_template_part( 'template-parts/inner-banner' );
get_header();
?>
<section class="space AboutSection">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?php the_field('des_heading'); ?></h3>
               <p><?php the_field('des_text'); ?></p>
            </div>
         </div>
      </div>
      <div class="AboutMainContent mt-5">
         <div class="row align-items-center justify-content-between">
            <div class="col-md-6 text-center">
               <div class="AboutImages">
                  <img src="<?php the_field('destribution_image'); ?>" class="img-fluid" />
               </div>
            </div>
            <div class="col-md-6 col-lg-6">
               <div class="AboutContent">
                  <h4 class="wow fadeInUp mb-5"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon3.svg" /> <?php the_field('destribution_heading'); ?></h4>
                    <?php if( have_rows('destribution_text') ): ?>
	 				  <?php while( have_rows('destribution_text') ): the_row(); 
				        $text = get_sub_field('text');
				      ?>
		                <p class="wow fadeInUp"><?= $text; ?></p>
                      <?php endwhile; ?>
                    <?php endif; ?>
                    <?php
                        $link = get_field('des_cta');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						?>
                    
                    <a href="<?php echo esc_url( $link_url ); ?>" class="red-btn wow fadeInUp" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a> 	
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="space DistributionSection grayBg">
   <div class="container">
      <div class="row">
         <div class="col-12 mb-5">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?php the_field('dsection_heading'); ?></h3>
            </div>
         </div>
      </div>
      <div class="row">
      	<?php if( have_rows('destribution_list') ): ?>
            <?php while( have_rows('destribution_list') ): the_row(); 
		        $heading = get_sub_field('heading');
		    ?>
        <div class="col-md-6">
            <div class="DistributionItem wow fadeInUp">
               <h3><?= $heading; ?></h3>
               <ul>
               	  <?php if( have_rows('text') ): ?>
               	  	<?php while( have_rows('text') ): the_row(); ?>
                      <li><?php echo  get_sub_field('title'); ?></li>
                    <?php endwhile; ?>.
                  <?php endif; ?>
               </ul>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
   </div>
</section>
<?php get_footer(); ?>