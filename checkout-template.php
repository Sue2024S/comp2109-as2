<?php
/**
 * Template Name: Checkout Page
 * Template Post Type: page
 */
get_header();
?>
<section>
    <?php
    echo do_shortcode('[woocommerce_checkout]'); 
    ?>
</section>
<?php
get_footer();   
?>