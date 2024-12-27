<?php /* Template Name: Homepage*/
get_header();

$main_heading = get_field( "main_heading" );
$bann_heading2 = get_field( "bann_heading2" );
$text = get_field( "text" );
$cta1 = get_field( "cta1" );
$cta2 = get_field( "cta2" );
$bann_video = get_field( "banner_video" );
if ($bann_video) :
?>
<section class="banner">
   <div class="slider-info">
      <video src="<?= $bann_video; ?>" loop muted autoplay></video>
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
               <div class="slider-Content">
                  <h1 class="wow fadeInUp">
                     <?= $main_heading; ?><br /> <span><?= $bann_heading2; ?></span>
                  </h1>
                  <p class="wow fadeInUp"><?= $text; ?></p>
                  <div class="slider-Content-btn wow fadeInUp">
                     <?php if ($cta1):
                        $c1_title = $cta1['title'];
                        $c1_link = $cta1['url'];
                        $c1_target = $cta1['target'] ? $cta1['target'] : '_self';
                     ?>
                     <a href="<?php echo esc_url( $c1_link ); ?>" class="red-btn" target="<?php echo esc_attr( $c1_target ); ?>"><?php echo esc_html( $c1_title ); ?></a>
                     <?php endif; ?>
                     <?php if ($cta2):
                        $c2_title = $cta2['title'];
                        $c2_link = $cta2['url'];
                        $c2_target = $cta2['target'] ? $cta2['target'] : '_self';
                     ?>
                     <a href="<?php echo esc_url( $c2_link ); ?>" class="border-white-btn" target="<?php echo esc_attr( $c2_target ); ?>"><?php echo esc_html( $c2_title ); ?></a>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
<?php if( have_rows('info_boxes') ): ?>
<section class="space pt-0">
   <div class="container">
      <div class="OurServiceMain">
         <div class="row">
            <?php while( have_rows('info_boxes') ): the_row(); 
               $image = get_sub_field('image');
               $heading = get_sub_field('heading');
               $text_grid = get_sub_field('text_grid');
            ?>
            <div class="col-md-4 col-lg-3 ">
               <div class="ServicesBox wow fadeInUp" style="background-image: url(<?php echo $image; ?>);">
                  <div class="ServicesBoxContent">
                     <span><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon.png" /></span>
                     <h5><?php echo $heading; ?></h5>
                     <?php if ($text_grid) {
                        echo "<p>".$text_grid."</p>";
                     } ?>
                  </div>
               </div>
            </div>
            <?php endwhile; ?>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
<section class="space grayBg">
   <div class="container">
      <div class="row">
         <?php
            $sec_heading = get_field('products_heading');
            if ($sec_heading):
         ?>
         <div class="col-12">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?= $sec_heading; ?></h3>
            </div>
         </div>
      <?php endif; ?>
      </div>
      <!-- Nav tabs -->
      <div class="ProductsTabs">
         <?php
            $terms = get_terms( array(
               'taxonomy'   => 'product_tax',
               'parent' => 0,
               'hide_empty' => false,
            ) );
         ?>
         <ul class="nav nav-tabs">
            <?php foreach ($terms as $key => $term) : ?>
            <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#menu<?= $term->term_id; ?>"><?= $term->name; ?></a>
            </li>
            <?php endforeach; ?>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
            <?php foreach ($terms as $key => $term): ?>
            <div class="tab-pane" id="menu<?= $term->term_id; ?>">
               <div class="row">
                  <?php
                     $args = array(
                        "post_type" => "products_strains",
                        "posts_per_page" => -1,
                        'tax_query' => array(
                           array(
                              'taxonomy' => 'product_tax',
                              'field'    => 'term_id',
                              'terms'    => $term->term_id,
                           ),
                        ),
                     );
                     $products = new WP_Query($args);
                        if ($products->have_posts()) :
                        while ($products->have_posts()) : $products->the_post();
                  ?>
                  <div class="col-md-6">
                     <div class="productItem">
                        <a href="<?= get_the_permalink(); ?>">
                           <div class="productBox">
                              <div class="productBoxImage">
                                 <img src="<?= get_the_post_thumbnail_url(); ?>" />
                              </div>
                              <div class="productBoxContent">
                                 <span><?= substr($term->name, 0, -1); ?></span>
                                 <h6><?= get_the_title(); ?></h6>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <?php endwhile;
                     wp_reset_postdata();
                    else :
                  ?>
                  <p>No products found in this category.</p>
                  <?php endif; ?>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</section>
<?php
$para_heading = get_field( "para_heading" );
$para_text = get_field( "para_text" );
$para_cta = get_field( "para_cta" );
$para_bg_image = get_field( "para_bg_image" );
if ($para_bg_image) :
?>
<section class="StripSection ">
   <div class="container">
      <div class="StripBox wow fadeInUp" style="background-image:url(<?= $para_bg_image; ?>);">
         <div class="row w-100 align-items-center">
            <div class="col-md-8">
               <div class="StripContent">
                  <?php
                     if ($para_heading):
                     echo "<h3>".$para_heading."</h3>"; 
                     endif;

                     if ($para_text):
                     echo "<p>".$para_text."</p>"; 
                     endif;
                  ?>
               </div>
            </div>
            <div class="col-md-4">
               <?php
                  if ($para_cta):
                  $p_url = $para_cta['url'];
                  $p_title = $para_cta['title'];
                  $p_target = $para_cta['target'] ? $para_cta['target'] : '_self';
               ?>
               <div class="StripBtn">
                  <a href="<?php echo esc_url( $p_url ); ?>" class="red-btn ml-auto" target="<?php echo esc_attr( $p_target ); ?>"><?php echo esc_html( $p_title ); ?></a>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
<?php 
$map_heading = get_field('map_heading');
$map = get_field('map');
if ($map_heading): 
?>
<section class="space pb-0">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?= $map_heading; ?></h3>
            </div>
         </div>
         <div class="col-md-12 wow fadeInUp">
            <img src="<?= $map; ?>" class="w-100">
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
<section class="space AboutSection">
   <div class="container">
      <?php
        $cont_head = get_field('cont_heading');
        $cont_sub_head = get_field('cont_sub_heading');
        $cont_text = get_field('cont_text');
        if ($cont_text): 
      ?>
   <div class="row">
      <div class="col-12">
         <div class="heading-pnel text-center wow fadeInUp">
            <h3><?= $cont_head; ?></h3>
            <p><?= $cont_sub_head; ?></p>
            <span><?= $cont_text; ?></span>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <div class="AboutMainContent">
      <div class="row pt-5 mt-5 align-items-center justify-content-between">
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
         <div class="col-md-6 col-lg-5">
            <?php 
               $abt_head = get_field('abt_main_heading');
               $abt_sub_head = get_field('abt_sub_heading');
               $abt_txt = get_field('abt_text');
               $abt_cta = get_field('abt_cta');
            ?>
            <div class="AboutContent">
               <h4 class="wow fadeInUp"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon3.svg"> <?php echo $abt_sub_head; ?></h4>
               <h2 class="wow fadeInUp"><?php echo $abt_head; ?><img src="<?php bloginfo('template_directory'); ?>/assets/img/img1.png">
               </h2>
               <p class="wow fadeInUp"><?php echo $abt_txt; ?></p>
               <?php
                  if ($abt_cta): 
                  $abt_title = $abt_cta['title'];
                  $abt_url = $abt_cta['url'];
                  $atb_target = $abt_cta['target'] ? $abt_cta['target'] : '_self';
               ?>
               <a href="<?php echo esc_url( $abt_url ); ?>" class="red-btn wow fadeInUp" target="<?php echo esc_attr( $atb_target ); ?>"><?php echo esc_html( $abt_title ); ?></a>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="space grayBg BlogsSection">
   <div class="container">
       <?php
         $blog_heading = get_field('section_heading');
         if ($blog_heading): 
      ?>
      <div class="row">
         <div class="col-12">
            <div class="heading-pnel text-center wow fadeInUp">
               <h3><?php echo $blog_heading; ?></h3>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <?php 
      $args = array(
         "post_type" => "post",
         "posts_per_page" => 4,
         "order" => "DESC"
      );
      $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <div class="row">
         <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
         <div class="col-lg-3 col-md-4">
            <div class="BlogItems wow fadeInUp">
               <a href="<?php the_permalink(); ?>">
                  <div class="BlogImage">
                     <?php $terms = get_the_terms( get_the_ID(), 'category' ); ?>
                     <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                  </div>
                  <div class="BlogContent">
                     <h4>Legalization of marijuana for medicinal use</h4>
                     <div class="BlogInfo">
                        <div class="BlogCategory">
                           <img src="<?php bloginfo('template_directory'); ?>/assets/img/icon.svg"> <?php 
                           $term_names = array();

                           // Collect all term names
                           foreach ( $terms as $term ) {
                              $term_names[] = $term->name;
                           }

                           echo implode( ', ', $term_names );
                           ?>
                        </div>
                        <div class="BlogDate">
                           <p><?php echo get_the_date( 'j F Y' ); ?></p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <?php endwhile; ?>
          <?php 
            $blog_cta = get_field('blog_cta',8);
            if( $blog_cta ): 
               $burl = $blog_cta['url'];
               $btitle = $blog_cta['title'];
               $btarget = $blog_cta['target'] ? $blog_cta['target'] : '_self';
            ?>
         <div class="col-lg-12 text-center mt-5 wow fadeInUp">
            <div class="space pt-0 ">
               <a href="<?php echo esc_url( $burl ); ?>" class="border-black-btn mx-auto" target="<?php echo esc_attr( $btarget ); ?>"><?php echo esc_html( $btitle ); ?></a>
            </div>
         </div>
         <?php endif; ?>
      </div>
      <?php endif; ?>
   </div>
</section>
<?php get_footer(); ?>