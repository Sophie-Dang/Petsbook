<?php

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

/*
    // Redirection si l'utilisateur n'est pas admin et qu'il tape /admin/ ou /wp/wp-admin dans l'url
    // https://wordpress.org/support/topic/how-to-prevent-members-access-to-wp-admin/
    function redirect_non_admin_users() {
        if ( ! current_user_can( 'manage_options' ) && ('/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF']) ) {
            wp_redirect( home_url() );
            exit;
        }
    }
    add_action( 'admin_init', 'redirect_non_admin_users' );
*/

// Redirection si l'utilisateur n'est pas admin et qu'il tape /admin/ ou /wp/wp-admin dans l'url
// https://jeroensormani.com/block-dashboard-access-non-admins/
function redirect_non_admin_users() {
    if ( is_admin() && !current_user_can( 'administrator' ) && !( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( home_url() );
        exit;
    }
}

add_action( 'admin_init', 'redirect_non_admin_users' );