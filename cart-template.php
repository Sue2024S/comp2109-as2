<?php
/**
 * Template Name: Cart Page
 * Template Post Type: page
 */
get_header();
?>
<section>
    <?php
    echo do_shortcode('[woocommerce_cart]'); 
    ?>
</section>
<?php
get_footer();   
?>