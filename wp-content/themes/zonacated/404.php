<?php /* Template Name: 404 Page */
get_header(); 

$sub_heading = get_field('404_sub_heading');
$main_heading = get_field('404_main_heading');
$text = get_field('404_text');
$cta = get_field('cta');
?>
<div class="Error-Page-head"></div>
<section class="space AboutSection ">
   <div class="container">
	   <div class="AboutMainContent afterNone mt-0 ">
	      <div class="row  align-items-center justify-content-center">
	         <div class="col-md-8 col-lg-7">
	            <div class="AboutContent text-center contentFull ">
	               <h4 class="wow fadeInUp"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icon3.svg"> <?= $sub_heading; ?></h4>
	               <h2 class="wow fadeInUp mw-100 text-center"><?= $main_heading; ?><img src="<?php bloginfo('template_directory'); ?>/assets/img/img1.png"></h2>
	               <p class="wow fadeInUp text-center"><?= $text; ?></p>
	               <?php if ($cta): 
	                    $link_url = $cta['url'];
					    $link_title = $cta['title'];
					    $link_target = $cta['target'] ? $cta['target'] : '_self';
	               ?>
	               <a href="<?php echo esc_url( $link_url ); ?>" class="red-btn wow fadeInUp mx-auto" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	               <?php endif; ?>
	            </div>
	         </div>
	      </div>
	   </div>
    </div>
</section>
<?php get_footer(); ?>