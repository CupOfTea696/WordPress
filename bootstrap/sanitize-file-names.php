<?php
/**
 * Plugin Name: Sanitize File Names
 */

add_filter('wp_handle_upload_prefilter', function($file) {
    $version = file_exists($file['tmp_name']) ? '.' . mb_substr(md5_file($file['tmp_name']), 0, 8) : '';
    
    $path = pathinfo($file['name']);
    $basename = str_slug(preg_replace_callback('/[A-z]*[A-Z][A-z]*[A-Z][A-z]*/', function ($matches) {
        return snake_case($matches[0], '-');
    }, $path['filename'])) . $version . '.' . $path['extension'];
    
    $file['name'] = str_replace($path['basename'], $basename, $file['name']);
    
    return $file;
});
