<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </article>
<?php endwhile; ?>

<?php $latestPosts = new WP_Query(['posts_per_page' => 6, 'ignore_sticky_posts' => true]); ?>
<section>
    <?php while ($latestPosts->have_posts()) : $latestPosts->the_post(); ?>
        <?php get_template_part('parts/post-summary'); ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
