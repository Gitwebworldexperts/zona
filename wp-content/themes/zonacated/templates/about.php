<?php /* Template Name: About Us */
get_header(); 
get_template_part( 'template-parts/inner-banner' );
$sub_heading = get_field('abt_sub_heading');
$main_heading = get_field('abt_main_heading');
$content1 = get_field('content_full_width1');
$content2 = get_field('content_full_width2');
$content3 = get_field('content_full_width3');
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
                  <div class="Aboutimg Aboutimg1"><img src="<?php echo $image; ?>"></div>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <?php if( have_rows('blurb') ): ?>
         <div class="col-md-6 col-lg-5">
            <div class="AboutContent">
               <h4 class="wow fadeInUp"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon3.svg"> <?php echo $sub_heading; ?></h4>
               <h2 class="wow fadeInUp"><?php echo $main_heading; ?><img src="<?php bloginfo('template_directory'); ?>/assets/img/img1.png"></h2>
               <?php while( have_rows('blurb') ): the_row(); 
                  $text = get_sub_field('text');
               ?>
               <p class="wow fadeInUp"><?= $text; ?></p>
               <?php endwhile; ?>
            </div>
         </div>
         <?php endif; ?>
         <?php if ($content1) : ?>
         <div class="col-md-12 col-lg-12 mt-5">
            <div class="AboutContent contentFull wow fadeInUp">
              <?= $content1; ?>
            </div>
         </div>
         <?php endif; ?>
         <?php if ($content2) : ?>
         <div class="col-12">
            <div class="AboutContent contentFull wow fadeInUp">
               <?= $content2; ?>
            </div>
         </div>
         <?php endif; ?>
         <?php if ($content2) : ?>
         <div class="col-md-12 mt-5">
            <div class="AboutContent wow fadeInUp contentFull">
               <?= $content3; ?>
            </div>
         </div>
         <?php endif; ?>
      </div>
   </div>
</section>
<section class="space grayBg">
   <div class="container">
      <div class="ProductsTabs productListing">
         <div class="row">
            <div class="col-12">
               <div class="heading-pnel text-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
				  <?php if($stains_heading = get_field('stains_heading')){ ?>
                  <h3><?php echo $stains_heading; ?></h3>
				   <?php } ?>
               </div>
            </div>
         </div>
         <?php
            $args = array(
               "post_type" => "products_strains",
               'posts_per_page' => 4,
            );
            $the_query = new WP_Query( $args ); 
         ?>
         <?php if ( $the_query->have_posts() ) : ?>
         <div class="row">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                  $popup_logo = get_field('company_logo');
                  $terms = get_the_terms(get_the_ID(), 'product_tax');

                  foreach ($terms as $key => $value) {
                     $cat_slug = $value->slug;
                     $cat_name = $value->slug;

                  }
                  
               ?>
            <div class="col-lg-3 col-md-4">
               <div class="BlogItems wow fadeInUp">
                  <a href="#" data-toggle="modal" data-target="#Popup<?= get_the_ID(); ?>">
                     <div class="BlogImage">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                     </div>
                     <div class="BlogContent">
                        <?php
                           if($cat_slug == "indica"){
                              $class = "purple";
                           }elseif($cat_slug == "sativa"){
                              $class = "green";
                           }else{
                              $class = "";
                           }
                        ?>
                        <h6 class="<?= $class; ?>"><?= $cat_name; ?></h6>
                        <h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                     </div>
                  </a>
               </div>
            </div>
            <div id="Popup<?= get_the_ID(); ?>" class="modal fade ProductsPopup" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="ProductsPopupBox">
                           <div class="row align-items-center">
                              <div class="col-md-6">
                                 <div class="ProductsPopupImage">
                                       <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                                       <?php if ($popup_logo) : ?>
                                       <div class="ProductsPopupLogo"> <img src="<?= $popup_logo; ?>" /> </div>
                                       <?php endif; ?>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="ProductsPopupContent">
                                     <?php
                                          if($cat_slug == "indica"){
                                             $class = "purple";
                                          }elseif($cat_slug == "sativa"){
                                             $class = "green";
                                          }else{
                                             $class = "";
                                          }
                                       ?>
                                    <h6 class="<?= $class; ?>" style="text-transform: uppercase;"><?= $cat_name; ?></h6>
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
         </div>
         <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no products matched your criteria.' ); ?></p>
         <?php endif; ?>
      </div>
   </div>
</section>
<?php get_footer(); ?>