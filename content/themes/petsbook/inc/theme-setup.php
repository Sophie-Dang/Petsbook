<?php
if (!function_exists('petsbook_setup')) {
    function petsbook_setup() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        register_nav_menus([
            'header-nav-left-connect' => 'Menu du header left connecte',
            'header-nav-left-deconnect' => 'Menu du header left deconnecte',
            'header-nav-right-deconnect' => 'Menu du header right deconnecte',
            'header-nav-right-connect' => 'Menu du header right connecte',
            'footer-nav' => 'Menu du footer'
        ]);
    }
}
add_action('after_setup_theme', 'petsbook_setup');