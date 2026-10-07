</main>
<?php
use function ViktoriaKupa\setting;

$applications = array_filter([
    'Ideiglenes jelentkezés' => setting('temporary_application_url'),
    'Állandó jelentkezés' => setting('permanent_application_url'),
]);
?>
<footer>
    <?php wp_nav_menu(['theme_location' => 'footer', 'container' => 'nav', 'fallback_cb' => false]); ?>
    <?php if ($applications) : ?>
        <ul>
            <?php foreach ($applications as $label => $url) : ?>
                <li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <address>
        <?php if (setting('phone')) : ?>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^\d+]/', '', setting('phone'))); ?>"><?php echo esc_html(setting('phone')); ?></a>
        <?php endif; ?>
        <?php if (setting('email')) : ?>
            <a href="mailto:<?php echo esc_attr(setting('email')); ?>"><?php echo esc_html(setting('email')); ?></a>
        <?php endif; ?>
        <?php if (setting('facebook_url')) : ?>
            <a href="<?php echo esc_url(setting('facebook_url')); ?>">Facebook</a>
        <?php endif; ?>
    </address>
</footer>
<?php wp_footer(); ?>
</body>
</html>
