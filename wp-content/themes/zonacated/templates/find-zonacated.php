<?php /* Template Name: Find Zonacated */
get_header(); 
get_template_part( 'template-parts/inner-banner' );
$map_heading = get_field('map_heading',8);
$map_img = get_field('map',8);
?>
<section class="space ">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?= $map_heading; ?></h3>
            </div>
         </div>
         <div class="col-md-12 wow fadeInUp">
            <img src="<?= $map_img; ?>" class="w-100">
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>
