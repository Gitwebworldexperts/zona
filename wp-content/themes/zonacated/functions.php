<?php

add_theme_support('custom-logo');
add_theme_support( 'post-thumbnails' );
add_theme_support('menus');
register_nav_menus(
    array(
        'primary-menu'=>'Header Menu',
        'footer-menu' => 'Footer Links',
        'mobile-menu'=> 'Mobile Menu'
    )
);

add_action('template_redirect', 'redirect_broken_links');

function redirect_broken_links() {
    if (is_404()) { // Check if the current request is a 404 error
        wp_redirect(home_url('/404-page-not-found/'), 301); // Replace '/your-target-page/' with the path of your desired page
        exit; // Make sure to exit after redirection
    }
}




function add_menu_classes_custom($classes, $item, $args) {
    if ($args->theme_location == 'primary-menu' || $args->theme_location == 'mobile-menu') {
    $classes[] = 'nav-item';
    if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'dropdown';
    }
   }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_classes_custom', 10, 3);


function add_menu_link_attributes_csutom($atts, $item, $args) {
    if ($args->theme_location == 'primary-menu' || $args->theme_location == 'mobile-menu') {
    $atts['class'] = 'nav-link';
}
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_attributes_csutom', 10, 3);

// dropdown

// Acf theme settings
if( function_exists('acf_add_options_page') ) {

    // Register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Theme Settings'),
        'menu_title'    => __('Theme Settings'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


function custom_product_and_post_type() {
    $labels = array(
        'name'                  => 'Products & Strains',
        'singular_name'         => 'Products & Strains',
        'menu_name'             => 'Products',
        'name_admin_bar'        => 'Products & Strains',
        'all_items'             => 'Products & Strains',
        'add_new_item'          => 'Add New Product',
        'add_new'               => 'Add New',
        'new_item'              => 'New Product',
        'edit_item'             => 'Edit Product',
        'update_item'           => 'Update Product',
        'view_item'             => 'View Product',
        'view_items'            => 'View Products',
        'search_items'          => 'Search Products',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash'
    );
    
    $args = array(
        'labels'                => $labels,
        'rewrite'               => array( 'slug' => 'products-strains' ),
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
    );
    
    register_post_type( 'products_strains', $args );
}
add_action( 'init', 'custom_product_and_post_type', 0 );


function create_products_taxonomy() {
    // Labels for the custom taxonomy
    $labels = array(
        'name'              => 'Categories',
        'singular_name'     => 'Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories'
    );

    // Arguments for the custom taxonomy
    $args = array(
        'hierarchical'      => true, // true for categories-like behavior
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product_category' ),
    );

    // Register the custom taxonomy for 'products_strains' post type
    register_taxonomy( 'product_tax', array( 'products_strains' ), $args );
}
add_action( 'init', 'create_products_taxonomy' );


// Filter




function enqueue_ajax_filter_scripts() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/assets/js/pfilter.js', array('jquery'), null, true);
    wp_localize_script('ajax-filter', 'ajaxfilter', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_filter_scripts');


function filter_posts() {

if (isset($_POST['searchData'])) {
    $search_term = trim($_POST['searchData']);
}

if (isset($_POST['categories'])) {
    $categories = $_POST['categories'];
}

if (!empty($search_term) && !empty($categories)) {
    // Both search term and categories are provided
      $args = array(
        'post_type' => 'products_strains',
        'posts_per_page' => -1,
        's' => $search_term,
        'tax_query' => array(
            'relation' => 'AND', // 'AND' relation for combining conditions
            array(
                'taxonomy' => 'product_tax',
                'field'    => 'term_id',
                'terms'    => array(9), // Exclude these term IDs
                'operator' => 'NOT IN',
            ),
            array(
                'taxonomy' => 'product_tax',
                'field'    => 'term_id',
                'terms'    => $categories, // Use selected categories
                'operator' => 'IN',
            ),
        ),
      );
} elseif (!empty($search_term)) {
    // Only search term is provided
    $args = array(
        'post_type' => 'products_strains',
        'posts_per_page' => -1,
        's' => $search_term,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tax',
                'field'    => 'term_id',
                'terms'    => array(9), // Exclude these term IDs
                'operator' => 'NOT IN',
            ),
        ),
    );
} elseif (!empty($categories)) {
    // Only categories are provided
    $args = array(
        'post_type' => 'products_strains',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND', // 'AND' relation for combining conditions
            array(
                'taxonomy' => 'product_tax',
                'field'    => 'term_id',
                'terms'    => array(9), // Exclude these term IDs
                'operator' => 'NOT IN',
            ),
            array(
                'taxonomy' => 'product_tax',
                'field'    => 'term_id',
                'terms'    => $categories, // Use selected categories
                'operator' => 'IN',
            ),
        ),
    );
} else {
    // Neither search term nor categories provided
    $args = array(
        'post_type' => 'products_strains',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tax',
                'field'    => 'term_id',
                'terms'    => array(9), // Exclude these term IDs
                'operator' => 'NOT IN',
            ),
        ),
      );
}

    $the_query = new WP_Query( $args );
     if ( $the_query->have_posts() ) : 
        while ( $the_query->have_posts() ) : $the_query->the_post();
           $clogo = get_field('testing_logo');

           $terms = get_the_terms(get_the_ID(), 'product_tax');

            $category_names = [];
               foreach ($terms as $key => $value) {
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
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="panel panel-default">
                                                <div class="panel-heading">
                                                   <h4 class="panel-title">
                                                      <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#METHOD<?= get_the_ID(); ?>" aria-expanded="false"><?php the_field('moe_title'); ?></a>
                                                   </h4>
                                                </div>
                                                <div id="METHOD<?= get_the_ID(); ?>" class="panel-collapse collapse">
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
                  
                  <?php else: ?>
                    <p>No results were found based on your search.</p>
                  <?php endif; ?>

    <?php
    die();
}
add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');


// test
function enqueue_custom_script() {
    // Ensure this only loads on the relevant admin or frontend pages
    if ( is_admin() ) {
        wp_enqueue_script('acf-file-remove', get_template_directory_uri() . '/assets/js/acf-file-remove.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_script');



// Handle the AJAX request to remove the ACF file attachment
function handle_acf_file_removal() {
    // Check if the correct parameters are passed
    if ( isset($_POST['post_id']) && isset($_POST['field_name']) ) {
        $post_id = intval($_POST['post_id']);
        $field_name = sanitize_text_field($_POST['field_name']);
        
        // Make sure the field_name matches 'pdf_file'
        if ($field_name === 'pdf_file') {
            // Get the file ID stored in the ACF field
            $file_id = get_field($field_name, $post_id);
            
            if ($file_id) {
                // Delete the file from the Media Library
                wp_delete_attachment($file_id, true);

                // Remove the ACF field value (file ID) from the post
                update_field($field_name, null, $post_id);
                
                // Return success response
                wp_send_json_success();
            } else {
                wp_send_json_error('No file to remove.');
            }
        } else {
            wp_send_json_error('Invalid field name.');
        }
    }
    
    // If the required data isn't set, send an error
    wp_send_json_error('Missing parameters.');
}

// Register the AJAX action for logged-in users
add_action('wp_ajax_remove_acf_attachment', 'handle_acf_file_removal');

?>