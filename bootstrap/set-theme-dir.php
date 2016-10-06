<?php
/**
 * Plugin Name: Set Theme Directory
 */

if (! is_blog_installed()) {
    return;
}

register_theme_directory(dirname(__DIR__) . '/' . env('APP_PUBLIC', 'public') . '/themes');
