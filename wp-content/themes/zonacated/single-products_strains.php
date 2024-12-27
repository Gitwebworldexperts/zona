<?php
get_header(); 
get_template_part( 'template-parts/inner-banner');
$posts_data = get_queried_object();
$post_id = $posts_data->ID;
$cmp_logo = get_field('company_logo');
?>

<section class="space AboutSection ">
   <div class="container">
   <div class="AboutMainContent afterNone mt-0 ">
      <div class="row  align-items-center justify-content-between">
         <div class="col-md-6">
            <div class="ProductsPopupBox">
               <div class="ProductsPopupImage">
                  <img src="<?= get_the_post_thumbnail_url(); ?>">
                  <?php if ($cmp_logo): ?>
                  <div class="ProductsPopupLogo">
                     <img src="<?php echo $cmp_logo; ?>">
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-5">
            <div class="AboutContent">
               <?php
                  
                  $taxonomy = 'product_tax'; // Replace with your custom taxonomy name

                  $terms = wp_get_post_terms($post_id, $taxonomy);

                  if (!is_wp_error($terms) && !empty($terms)) {
                      $term_names = []; // Initialize an array to hold term names
                      
                      foreach ($terms as $term) {
                          $term_names[] = $term->name; // Add each term name to the array
                      }
                      // Join the term names with a comma and echo the result
                      ?>
                      <h4 class="wow fadeInUp" style="text-transform: uppercase;"><?= implode(', ', $term_names); ?></h4> 
                      <?php
                  }
               ?>
               <h2 class="wow fadeInUp"><?php the_title(); ?> </h2>
               <p class="wow fadeInUp"><?php the_field('short_description'); ?></p>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 mt-5">
            <div class="AboutContent contentFull wow fadeInUp">
               <?php the_field('long_description'); ?>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<?php get_footer(); ?>