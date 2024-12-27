<?php /* Template Name: Testing Page */
get_template_part( 'template-parts/inner-banner' );
get_header();
?>
<section class="space grayBg">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="ListingSideBar">
               <div class="ListingSearch">
                  <input type="text" name="" id="search" placeholder="Search" />
                  <button class="SearchBtn"><i class="fa fa-search" aria-hidden="true"></i></button>
               </div>
               <div class="Filtter-Box">
                   <div class="FillterHeading">
                       <h3>FILTER BY PRODUCT TYPE</h3>
                   </div>
                   <div class="filter-list">
                       <?php
                          $terms = get_terms([
                              'taxonomy' => 'product_tax',
                              'parent' => 0,
                              'hide_empty' => false,
                              'exclude' => array(9),
                          ]);

                          foreach ($terms as $term) { ?>
                              <?php 
                              $child_terms = get_terms([
                                  'taxonomy' => 'product_tax',
                                  'parent' => $term->term_id,
                                  'hide_empty' => false,
                                  'exclude' => array(9, 11),
                              ]);
                              foreach ($child_terms as $child) : ?>
                                 <div class="form-group" >
                                    <input type="checkbox" class="category" id="<?= $child->slug; ?>" value="<?= $child->term_id; ?>" />
                                    <label for="<?= $child->slug; ?>"><?= $child->name; ?></label>
                                 </div>
                             <?php endforeach;
                          }
                       ?>
                   </div>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <!-- Nav tabs -->
            <div class="ProductsTabs productListing">
               <div class="row" id="search-results">
                  <?php 
                     $args = array(
                         'post_type' => 'products_strains',
                         "posts_per_page" => -1,
                         'tax_query' => array(
                             array(
                                 'taxonomy' => 'product_tax',
                                 'field'    => 'term_id',
                                 'terms'    => array(9),
                                 'operator' => 'NOT IN',
                             ),
                         ),
                     );

                     $the_query = new WP_Query( $args );
                     if ( $the_query->have_posts() ) : 
                     while ( $the_query->have_posts() ) : $the_query->the_post();
                        $clogo = get_field('testing_logo');

                        $terms = get_the_terms(get_the_ID(), 'product_tax');
                        $category_names = [];
                        foreach ($terms as $key => $value) {
                           // echo "<pre>";
                           // print_r($value);
                           $cat_slug = $value->slug;
                           $category_names[] = $value->slug;

                        }
                  ?>
                  <div class="col-lg-6 col-md-6">
                     <div class="BlogItems NewTestingItems wow fadeInUp">
                        <div class="BlogContent">
                           <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                 <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#<?php the_title(); ?>" aria-expanded="false">
                                    <?php
                                       if($category_names[0] == "indica"){
                                          $class = "indica-purple";
                                       }elseif($category_names[0] == "sativa"){
                                          $class = "stiva-yellow";
                                       }elseif($category_names[0] == "hybird"){
                                          $class = "hybrid-green";
                                       }
                                       else{
                                          $class = "";
                                       }
                                    ?>
                                    <h6 class="<?= $class; ?>"><?php echo $category_names[0]; ?></h6>
                                    <h4><?php the_title(); ?></h4>
                                 </a>
                                 <div id="<?php the_title(); ?>" class="panel-collapse collapse">
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="BlogImage">
                                             <img src="<?php echo $clogo; ?>" />
                                          </div>
                                       </div>
                                       <div class="col-md-8">
                                          <div class="panel-group" id="accordion">
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                   <h4 class="panel-title">
                                                      <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2a<?= get_the_ID(); ?>" aria-expanded="false"><?php the_field('Ingredients_title'); ?></a>
                                                   </h4>
                                                </div>
                                                <div id="collapse2a<?= get_the_ID(); ?>" class="panel-collapse collapse">
                                                   <div class="Ingredients-list">
                                                      <p><?php the_field('Ingredients_text'); ?></p>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                   <h4 class="panel-title">
                                                      <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2<?= get_the_ID(); ?>" aria-expanded="false"><?php the_field('lab_result_title'); ?></a>
                                                   </h4>
                                                </div>
                                                <div id="collapse2<?= get_the_ID(); ?>" class="panel-collapse collapse">
                                                   <div class="filter-list">
                                                      <?php if( have_rows('date') ): ?>
                                                         <?php while( have_rows('date') ): the_row(); 
                                                            $title = get_sub_field('title');
                                                            $date = get_sub_field('lab_rdate');
                                                         ?>
                                                         <div class="BlogInfo">
                                                            <div class="BlogCategory"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon.svg" /> <?= $title; ?></div>
                                                            <div class="BlogDate">
                                                               <p><?= $date; ?></p>
                                                            </div>
                                                         </div>
                                                         <?php endwhile; ?>
                                                         <?php endif; ?>

                                                      <div class="row">
                                                         <?php if( have_rows('cta_btns') ): ?>
                                                            <?php while( have_rows('cta_btns') ): the_row(); 
                                                               $button = get_sub_field('button');
                                                               if( $button ): 
                                                                  $link_url = $button['url'];
                                                                  $link_title = $button['title'];
                                                                  $link_target = $button['target'] ? $button['target'] : '_self';
                                                            ?>
                                                            <div class="col-md-6 col-6">
                                                               <a href="<?php echo esc_url( $link_url ); ?>" class="red-btn Distribution" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                            </div>
                                                            <?php endif; ?>
                                                            <?php endwhile; ?>
                                                         <?php endif; ?>
                                                      </div>
                                                      <div class="panel-group" id="accordion-sub-biscuits2<?= get_the_ID(); ?>">
                                                          <div class="panel panel-default">
                                                              <div class="panel-heading">
                                                                  <h4 class="panel-title"><a aria-expanded="false" class="collapsed" data-parent="#accordion-sub-biscuits2<?= get_the_ID(); ?>" data-toggle="collapse" href="#previousHarvestBiscuits2<?= get_the_ID(); ?>">
                                                                     <?php the_field('ph_title'); ?>
                                                                  </a></h4>
                                                              </div>

                                                              <div class="panel-collapse collapse" id="previousHarvestBiscuits2<?= get_the_ID(); ?>" style="">
                                                                  <div class="panel-body">
                                                                      <table border="1">
                                                                          <thead>
                                                                              <tr>
                                                                                  <th style="color: black; font-size: 14px; text-align: center; border: 1px solid transparent;"><?php the_field('harvest_date_label'); ?></th>
                                                                                  <th style="color: black; font-size: 14px; text-align: center; border: 1px solid transparent;"><?php the_field('lab_results_label'); ?></th>
                                                                                  <th style="color: black; font-size: 14px; text-align: center; border: 1px solid transparent;"><?php the_field('ph_title'); ?></th>
                                                                              </tr>
                                                                          </thead>
                                                                          <tbody>
																			  <?php if( have_rows('previous_harvest') ):
																			  while( have_rows('previous_harvest') ) : the_row();
																			  $harvest_date = get_sub_field('harvest_date');
																			  $lab_results = get_sub_field('lab_results');
																			  $lab_report = get_sub_field('lab_report');
																			  ?>
                                                                              <tr>
                                                                                  <td style="font-size: 12px; text-align: center; border: 1px solid transparent;"><?php echo $harvest_date; ?></td>
                                                                                  <td style="font-size: 12px; text-align: center; border: 1px solid transparent;"><?php echo $lab_results; ?></td>
                                                                                  <td style="text-align: center; border: 1px solid transparent;">
                                                                                      <a href="<?php echo $lab_report['url']; ?>" style="font-size: 11pt; color: red; text-align: center; display: block;" target="<?php echo $lab_report['target'] ? $lab_report['target'] : '_self'; ?>"><?php echo $lab_report['title']; ?></a>
                                                                                  </td>
                                                                              </tr>
																			  <?php 
																			  endwhile;
																			  endif;
																			  ?>
                                                                              <!-- Additional rows can be added here -->
                                                                          </tbody>
                                                                      </table>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>

                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                   <h4 class="panel-title">
                                                      <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#METHOD<?php echo get_the_ID(); ?>" aria-expanded="false"><?php the_field('moe_title'); ?></a>
                                                   </h4>
                                                </div>
                                                <div id="METHOD<?php echo get_the_ID(); ?>" class="panel-collapse collapse">
                                                   <div class="Ingredients-list">
                                                      <p><?php the_field('moe_text'); ?></p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
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
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>
