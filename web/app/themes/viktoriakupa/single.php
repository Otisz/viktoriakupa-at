<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <article>
        <h1><?php the_title(); ?></h1>
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
        <?php the_excerpt(); ?>
        <?php the_post_thumbnail('large'); ?>
        <?php the_content(); ?>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
