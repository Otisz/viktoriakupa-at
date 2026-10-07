<?php

$image = seedImage('teszt-megosztas', 1200, 630);

update_option('wpseo_social', array_merge(get_option('wpseo_social', []), [
    'og_default_image' => wp_get_attachment_url($image),
    'og_default_image_id' => $image,
]));
