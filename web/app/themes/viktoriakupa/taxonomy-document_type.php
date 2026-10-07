<?php get_header(); ?>

<h1><?php single_term_title(); ?></h1>

<?php while (have_posts()) : the_post(); ?>
    <article>
        <h2><a href="<?php echo esc_url(get_field('file')); ?>" download><?php the_title(); ?></a></h2>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
