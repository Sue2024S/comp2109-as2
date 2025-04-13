<?php
/**
 * Template Name: Homepage Template - Assignment 2
 * Template Post Type: page, cmsPosttype
 */
get_header();
?>
<main>
    <section class="home-masthead"
        style="background-image: url('<?php echo wp_kses_post(get_field('masthead_image')); ?>')">
        <div>
            <h1><?php echo wp_kses_post(get_field('masthead_title')); ?></h1>
        </div>
    </section>
    <section class="home-row-one">
        <h3><?php echo wp_kses_post(get_field('row_one_title')); ?></h3>
        <img src="<?php echo wp_kses_post(get_field('row_one_image')); ?>"
            alt="<?php echo wp_kses_post(get_field('row_one_image_alt')); ?>">
        <p><?php echo wp_kses_post(get_field('row_one_text')); ?></p>
    </section>
    <section class="home-row-two">
        <h3><?php echo wp_kses_post(get_field('row_two_title')); ?></h3>
        <p><?php echo wp_kses_post(get_field('row_two_text')); ?></p>
        <label for="row_two_email"><?php echo esc_html(get_field('row_two_email_label')); ?></label>
        <input type="email" name="row_two_email" id="row_two_email">
    </section>
    <section class="shortcode">
        <?php  echo do_shortcode("[cmsPost]");?>
    </section>
</main>

<?php
get_footer();
?>