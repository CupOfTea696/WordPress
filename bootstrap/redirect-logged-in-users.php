<?php
/**
 * Plugin Name: Redirect Logged-in Users
 */

function __redirectLoggedInUser()
{
    global $action;
    
    if ($action == 'logout' || ! is_user_logged_in()) {
        return;
    }
    
    wp_redirect(current_user_can('read') ? admin_url() : home_url(), 302);
	
	die();
};

add_action('login_init', '__redirectLoggedInUser');
