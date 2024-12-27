<?php /* Template Name: Products*/
get_header(); 
get_template_part( 'template-parts/inner-banner');
?>
<section class="space grayBg">
   <div class="container">
      <div class="ProductsTabs productListing">
         <?php
            $args = array(
                'post_type' => 'products_strains',
                "posts_per_page" => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_tax',
                        'field'    => 'term_id',
                        'terms'    => array(11),
                        'operator' => 'NOT IN',
                    ),
                ),
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
//                      $cat_name = $value->slug;  18 Dec 24 Sanjeev
						$cat_name = $value->name;

                  }
                  
               ?>
               <div class="col-lg-3 col-md-4">
                  <div class="BlogItems wow fadeInUp">
                     <a href="<?php the_permalink(); ?>" data-toggle="modal" data-target="#Popup<?= get_the_ID(); ?>">
                        <div class="BlogImage"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" /> </div>
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