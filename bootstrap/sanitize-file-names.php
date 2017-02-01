<?php
/**
 * Plugin Name: Sanitize File Names
 */

add_filter('sanitize_file_name', function ($filename) {
    $path = pathinfo($filename);
    $basename = str_slug(preg_replace_callback('/[A-z]*[A-Z][A-z]*[A-Z][A-z]*/', function ($matches) {
        return snake_case($matches[0], '-');
    }, $path['filename'])) . '.' . $path['extension'];
    
    return str_replace($path['basename'], $basename, $filename);
});
