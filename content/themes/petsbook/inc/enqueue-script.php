<?php

function petsbook_scripts()
{
    wp_enqueue_style('theme-css', get_theme_file_uri('public/css/style.css'), [], '20200120', 'all');
    wp_enqueue_script('theme-script', get_theme_file_uri('public/js/app.js'), [], '20200120', true);
}

add_action('wp_enqueue_scripts', 'petsbook_scripts');