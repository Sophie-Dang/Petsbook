<?php

require 'customizer/petsbook_carousel.php';
require 'customizer/petsbook_carousel_login.php';


if(!function_exists('petsbook_customize_register')) {

    function petsbook_customize_register($wp_customize) {

        // PANEL
        $wp_customize->add_panel(
            'petsbook_theme_panel', 
            [
                'title' => 'Petsbook',
                'description' => 'Gestion du thème oAgency',
                'priority' => 1
            ]);

        /*----------------------------------------*/
        /* - SECTIONS -*/
        
        // Carousel
        $wp_customize->add_section(
            'petsbook_carousel', 
            [
                'title' => 'Carousel',
                'panel' => 'petsbook_theme_panel',
                'description' => 'Gestion du carousel et de son contenu',
                'priority' => 1,
            ]
        );

        // Carousel login
        $wp_customize->add_section(
            'petsbook_carousel_login', 
            [
                'title' => 'Carousel login',
                'panel' => 'petsbook_theme_panel',
                'description' => 'Gestion du carousel de la page d\'accueil login',
                'priority' => 1,
            ]
        );
        /*----------------------------------------*/
        petsbook_carousel($wp_customize);
        petsbook_carousel_login($wp_customize);
    }
}
add_action('customize_register', 'petsbook_customize_register');