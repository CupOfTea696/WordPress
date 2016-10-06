<?php
/**
 * Plugin Name: Ensure Correct URL
 */

if (! is_blog_installed()) {
    return;
}

$__ensureCorrectBackendUrl = function ()
{
    $siteurl = get_option('siteurl');
    
    if (! preg_match('/\\/wp\\/?$/', $siteurl)) {
        update_option('siteurl', $siteurl . (preg_match('/\\/$/', $siteurl) ? 'wp' : '/wp'));
    }
};

$__ensureCorrectBackendUrl();

$__ensureCorrectFrontendUrl = function ()
{
    $home = get_option('home');
    
    if (! preg_match('/\\/wp\\/?$/', $home)) {
        update_option('home', preg_replace('/\\/wp(\\/?)$/', '$1', $home));
    }
};

$__ensureCorrectFrontendUrl();

unset($__ensureCorrectBackendUrl, $__ensureCorrectFrontendUrl);
