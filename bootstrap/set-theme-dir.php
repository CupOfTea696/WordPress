<?php
/**
 * Plugin Name: Set Theme Directory
 */

if (! is_blog_installed()) {
    return;
}

register_theme_directory(public_path('themes'));

add_filter('wp_prepare_themes_for_js', function ($themes) {
    foreach ($themes as &$theme) {
        if (! empty($theme['screenshot'])) {
            foreach ($theme['screenshot'] as &$screenshot) {
                $screenshot = str_replace(public_path(), '', $screenshot);
            }
        }
    }
    
    return $themes;
});
