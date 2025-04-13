<?php

    //add menu function
    function my_theme_setup() {
        register_nav_menus(array(
            'header' => 'Header Menu',
            'footer' => 'Footer Menu'
        ));
}
add_action('after_setup_theme', 'my_theme_setup');
// Add Featured image support to our posts
add_theme_support('post-thumbnails');
//set up custom footer widgets
function cmsclass_widget_init(){
    register_sidebar(array(
        'name'           => __('Footer Widget 1', 'cmsclass'),
        'id'             => 'footer_widget_1',
        'description'    => __('The first footer widget area', 'cmsclass'),
        'before_widget'  => '<div class="logo-widget">',
        'after_widget'   => '</div>',
        // 'before_title'   => '<h2 class="footer-widget-title">',
        // 'after_title'    => '</h2>'
    ));
    register_sidebar(array(
        'name'           => __('Footer Widget 2', 'cmsclass'),
        'id'             => 'footer_widget_2',
        'description'    => __('The second footer widget area', 'cmsclass'),
        'before_widget'  => '<div class="about-widget">',
        'after_widget'   => '</div>',
        'before_title'   => '<h2 class="widget-title">',
        'after_title'    => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'cmsclass'),
        'id'            => 'footer_widget_3',
        'description'   => __('The third footer widget area', 'cmsclass'),
        'before_widget'  => '<div class="menu-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Widget 4', 'cmsclass'),
        'id'            => 'footer_widget_4',
        'description'   => __('The fourth footer widget area', 'cmsclass'),
        'before_widget'  => '<div class="contact-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
}
add_action('widgets_init', 'cmsclass_widget_init');

// Custom Plugin
function cms_plugin_init(){
    $args = array(
        'label'             => 'CMS Post Type',
        'public'            => true,
        'show_ui'           => true,
        'capability_type'   => 'post',
        // 'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'       => array('category'),
        'hierarchical'     => false,
        //check where the menu icons are located
        'menu_icon'        => 'dashicons-admin-site',
        'query_var'        => true,
        'supports'         => array(
            'title',
            'editor',
            'excerpts',
            'trackbacks',
            'comments',
            'thumbnail',
            'author',
            'post-formats',
            'page-attributes',   
            )
    );
    register_post_type('cmsPosttype', $args);
}
add_action('init', 'cms_plugin_init');

// shortcode for CMS post type
function cms_posttype_shortcode(){
    $query = new WP_Query(array('post_type' => 'cmsPosttype', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'ASC'));
    // if ( $query->have_posts() ) {
        while($query->have_posts()) : $query->the_post(); 
        ?>
        
        <div class="cms-posttype-container">
            <div>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
            <div>
                <h4><?php the_title(); ?></h4>
                <?php the_content(); ?>
                <p><a href="<?php the_permalink(); ?>">Read More</a></p>
            </div>
        </div>
            
            <?php endwhile;
    }
        wp_reset_postdata();
        return ob_get_clean();
//}
//register shortcode
add_shortcode('cms_posttype', 'cms_posttype_shortcode');

// adding woocommerce support to our theme no usages
function customtheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'customtheme_add_woocommerce_support');

function enqueue_wc_cart_fragments(){
    wp_enqueue_script('wc-cart-fragments');
}
add_action('wp_enqueue_scripts', 'enqueue_wc_cart_fragments');

// 'woocommerce_single_product_summary' it is like a category
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

/* Removes the price */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

/* Removes all the add to cart options */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

/* Removes all the product data tabs */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

/* Removes all the product attributes */
remove_action('woocommerce_product_additional_information', 'wc_display_product_attributes', 10);

/* Removes all the up-sale products */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

/* Removes all the related products */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/* Removes all the single product variations */
remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);

/* Removes all the single product metadata, example SKU */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// change the order in which the information is displayed
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );

// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 15);
add_action('woocommerce_product_additional_information', 'wc_display_product_attributes', 15);
add_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
function web_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_action('after_setup_theme', 'web_add_woocommerce_support');

?>