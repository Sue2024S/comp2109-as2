<?php
/**
 * Template Name: Account Page
 * Template Post Type: page
 */
get_header();
?>
<section>
    <?php
    echo do_shortcode('[woocommerce_my_account]');
    ?>
</section>
<?php
get_footer();   
?>