<?php get_header(); ?>

<h1><?php post_type_archive_title(); ?></h1>

<?php while (have_posts()) : the_post(); ?>
    <?php $website = get_field('website'); ?>
    <article>
        <?php the_post_thumbnail('medium'); ?>
        <?php if ($website) : ?>
            <h2><a href="<?php echo esc_url($website); ?>"><?php the_title(); ?></a></h2>
        <?php else : ?>
            <h2><?php the_title(); ?></h2>
        <?php endif; ?>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
