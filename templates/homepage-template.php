<?php
/**
 * Template Name: Homepage Template - Assignment 2
 * Template Post Type: page, cmsPosttype
 */
get_header();
?>
<main>
    <!-- search bar to find products easily -->
    <section class="home-search">
        <?php get_search_form(); ?>
    </section>

    <!-- masthead -->
    <section class="home-masthead"
        style="background-image: url('<?php echo wp_kses_post(get_field('masthead_image')); ?>')">
        <div class="home-masthead-content">
            <h1><?php echo wp_kses_post(get_field('masthead_title')); ?></h1>
        </div>
    </section>

    <!-- featured section -->
    <section class="home-featured">
        <div class="suggested-book">
            <h3><?php echo wp_kses_post(get_field('row_one_title')); ?></h3>
            <img src="<?php echo wp_kses_post(get_field('row_one_image')); ?>"
            alt="<?php echo wp_kses_post(get_field('row_one_image_alt')); ?>">
            <p><?php echo esc_html(get_field('row_one_text')); ?></p>
        </div>

        <div class="latest-posts">
            <h3>Latest Posts</h3>
            <?php
            $latest_posts = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3,
            ]);
            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                <article class="latest-post">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>

    <!-- subscribe section -->
    <section class="home-suscribe">
        <h3><?php echo wp_kses_post(get_field('row_two_title')); ?></h3>
        <p><?php echo wp_kses_post(get_field('row_two_text')); ?></p>
        <label for="row_two_email"><?php echo esc_html(get_field('row_two_email_label')); ?></label>
        <input type="email" name="row_two_email" id="row_two_email" placeholder="Enter your email">
    </section>


    <section class="shortcode">
        <h3>Featured Books</h3>
        <?php echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC" visibility="featured"]'); ?>
    </section>
</main>

<?php
get_footer();
?>