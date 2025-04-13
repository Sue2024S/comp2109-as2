<?php

get_header();

//declare global $post to ensure it's available to use
global $post;

//fuction added to our functions.php and create a variable to collect it here.
$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
?>

<section class="post-masthead" style="background: url('<?php echo $featuredImg[0];?>')">
    <div>
        <h1><?php the_title(); ?></h1>
    </div>
    <div><?php
if ( woocommerce_product_loop() ) {
    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();
            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();
} else {
    do_action( 'woocommerce_no_products_found' );
}
?>
</section>
<section class="homepage-content">
    <?php echo get_the_content(); ?>
</section>

<?php
get_footer();
?>