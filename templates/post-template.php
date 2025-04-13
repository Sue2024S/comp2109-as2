<?php
/**
 * Template Name: Custom Post
 * Template Post Type: post
 */
get_header();
$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
<section class="post-main-content">
    <div class="post-featured-image">
        <img src="<?php echo esc_url($featuredImg[0]); ?>" alt="<?php the_title_attribute(); ?>">
    </div>
    <div>
        <h1><?php the_title(); ?></h1>
        <p><?php echo get_the_content(); ?></p>
    </div>
</section>

<?php
get_footer();
?>