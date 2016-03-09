<?php

/**
 * The parent theme has multiple stylesheets, to to ensure our
 * style.css loads AFTER all the parent stylesheets we:
 *   1) Dequeue (remove) our child theme style.css file
 *   2) Queue (add back) our child theme style.css file
 *      with a dependency on the parent styles
 */
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);
function theme_enqueue_styles() {
    wp_dequeue_style('theme-style');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('parent-style'));
}
