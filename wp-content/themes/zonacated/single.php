<?php
get_header(); 
get_template_part( 'template-parts/inner-banner');
$short_desc = get_field('bshort_description');
$long_desc = get_field('blong_description');
?>
<section class="space AboutSection ">
   <div class="container">
   <div class="AboutMainContent afterNone mt-0 ">
      <div class="row  align-items-center justify-content-between">
         <div class="col-md-6">
            <div class="  ProductsPopupBox">
               <div class="ProductsPopupImage">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>">
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-5">
            <div class="AboutContent">
               <!-- <h4 class="wow fadeInUp">Category</h4> -->
               <h2 class="wow fadeInUp"><?php the_title(); ?></h2>
               <p class="wow fadeInUp"><?php echo $short_desc; ?></p>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 mt-5">
            <div class="AboutContent contentFull wow fadeInUp">
               <?php echo $long_desc; ?>
            </div>
         </div>

      </div>
   </div>
	</div>
</section>
<?php get_footer(); ?>