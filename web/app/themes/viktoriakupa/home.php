<?php get_header(); ?>

<h1><?php single_post_title(); ?></h1>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('parts/post-summary'); ?>
<?php endwhile; ?>

<?php the_posts_pagination(); ?>

<?php get_footer(); ?>
