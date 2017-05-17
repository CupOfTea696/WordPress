<?php
/**
 * Plugin Name: Sanitize File Names
 */

use Illuminate\Support\Str;

add_filter('wp_handle_upload_prefilter', function($file) {
    $version = file_exists($file['tmp_name']) ? '.' . Str::substr(md5_file($file['tmp_name']), 0, 8) : '';
    
    $path = pathinfo($file['name']);
    $basename = Str::slug(preg_replace_callback_array(
        [
            '/[A-Z]{2,}/' => function ($matches) {
                return Str::lower($matches[0]);
            },
            '/[A-z]*[A-Z][A-z]*[A-Z][A-z]*/' => function ($matches) {
                return Str::snake($matches[0], '-');
            },
        ], $path['filename'])) . $version . '.' . $path['extension'];
    
    $file['name'] = str_replace($path['basename'], $basename, $file['name']);
    
    return $file;
});
