<?php

function petsbook_carousel($wp_customize) 
{
    // Carousel visibility
    $wp_customize->add_setting (
        'petsbook_carousel_active',
        [
            'default' => true
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_active',
        [
            'type' => 'checkbox',
            'label' => 'Activer le carousel',
            'section' => 'petsbook_carousel',
            'priority' => 1,
        ]
    );

    /*----------------------Slide #1 -------------------------*/
    // Change Illu
    $wp_customize->add_setting (
        'petsbook_carousel_slide1_Illu',
        [
            'default' => get_theme_file_uri('public/images/Illu-3.png')
        ]
    );

    $illu_slider_1 = new WP_Customize_Media_Control ( 
        $wp_customize, 
        'petsbook_carousel_slide1_Illu',	
        [			
            'label'    => 'Slide #1',
            'description' => 'Changer l\'illustration slide 1', 
            'section'  => 'petsbook_carousel',
            'priority' => 2,
            'mime_type' => 'image'
        ]
        
    );

    $wp_customize->add_control($illu_slider_1);

    /*------------------------------*/
    // Change content title
    $wp_customize->add_setting(
        'petsbook_carousel_slide1_title',
        [
            'default' => 'Qu\'est-ce que Pets Book ?'
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_slide1_title',
        [
            'type' => 'text',
            'label' => 'Slide #1',
            'description' => 'Titre slide 1',
            'section' => 'petsbook_carousel',
            'priority' => 3,
        ]
    );

    /*------------------------------*/
    // Change text content
    $wp_customize->add_setting(
        'petsbook_carousel_slide1_content',
        [
            'default' => 'Nulla vitae elit libero, a pharetra augue mollis interdum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, dolor laboriosam. Quibusdam saepe quidem quos nulla illum maxime magni dignissimos ut inventore. Architecto sit, esse distinctio autem facilis fugit cumque.?'
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_slide1_content',
        [
            'type' => 'textarea',
            'label' => 'Slide #1',
            'description' => 'Texte slide 1',
            'section' => 'petsbook_carousel',
            'priority' => 4,
        ]
    );


    /*----------------------Slide #2 -------------------------*/
    // Change Illu
    $wp_customize->add_setting (
        'petsbook_carousel_slide2_Illu',
        [
            'default' => get_theme_file_uri('public/images/Illu-1-2.png')
        ]
    );

    $illu_slider_1 = new WP_Customize_Media_Control ( 
        $wp_customize, 
        'petsbook_carousel_slide2_Illu',	
        [			
            'label'    => 'Slide #2',
            'description' => 'Changer l\'illustration du slide 2', 
            'section'  => 'petsbook_carousel',
            'priority' => 5,
            'mime_type' => 'image'
        ]
        
    );

    $wp_customize->add_control($illu_slider_1);

    /*------------------------------*/
    // Change content title
    $wp_customize->add_setting(
        'petsbook_carousel_slide2_title',
        [
            'default' => 'Des timelines uniques !'
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_slide2_title',
        [
            'type' => 'text',
            'label' => 'Slide #2',
            'description' => 'Titre slide 2',
            'section' => 'petsbook_carousel',
            'priority' => 6,
        ]
    );

    /*------------------------------*/
    // Change text content
    $wp_customize->add_setting(
        'petsbook_carousel_slide2_content',
        [
            'default' => 'Nulla vitae elit libero, a pharetra augue mollis interdum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, dolor laboriosam. Quibusdam saepe quidem quos nulla illum maxime magni dignissimos ut inventore. Architecto sit, esse distinctio autem facilis fugit cumque.?'
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_slide2_content',
        [
            'type' => 'textarea',
            'label' => 'Slide #2',
            'description' => 'Texte slide 2',
            'section' => 'petsbook_carousel',
            'priority' => 7,
        ]
    );
    
    /*----------------------Slide #3 -------------------------*/
    // Change Illu
    $wp_customize->add_setting (
        'petsbook_carousel_slide3_Illu',
        [
            'default' => get_theme_file_uri('public/images/Illu-1-2.png')
        ]
    );

    $illu_slider_1 = new WP_Customize_Media_Control ( 
        $wp_customize, 
        'petsbook_carousel_slide3_Illu',	
        [			
            'label'    => 'Slide #3',
            'description' => 'Changer l\'illustration du slide 3', 
            'section'  => 'petsbook_carousel',
            'priority' => 8,
            'mime_type' => 'image'
        ]
        
    );

    $wp_customize->add_control($illu_slider_1);

    /*------------------------------*/
    // Change content title
    $wp_customize->add_setting(
        'petsbook_carousel_slide3_title',
        [
            'default' => 'À toi de jouer !'
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_slide3_title',
        [
            'type' => 'text',
            'label' => 'Slide #3',
            'description' => 'Titre slide 3',
            'section' => 'petsbook_carousel',
            'priority' => 9,
        ]
    );

    /*------------------------------*/
    // Change text content
    $wp_customize->add_setting(
        'petsbook_carousel_slide3_content',
        [
            'default' => 'Nulla vitae elit libero, a pharetra augue mollis interdum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, dolor laboriosam. Quibusdam saepe quidem quos nulla illum maxime magni dignissimos ut inventore. Architecto sit, esse distinctio autem facilis fugit cumque.?'
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_slide3_content',
        [
            'type' => 'textarea',
            'label' => 'Slide #3',
            'description' => 'Texte slide 3',
            'section' => 'petsbook_carousel',
            'priority' => 10,
        ]
    );

    /*----------------------INTERVAL-------------------------*/
    // Interval  
    $wp_customize->add_setting (
        'petsbook_carousel_interval',
        [
            'default' => 15000
        ]
    );

    $wp_customize->add_control(
        'petsbook_carousel_interval',
        [
            'type' => 'number',
            'input_attrs' => 
            [
                'min' => 0,
                'step' => 100
            ],
            'label' => 'Interval',
            'description' => 'Interval entre 2 slides (ms)',
            'section' => 'petsbook_carousel',
            'priority' => 11,
        ]
    );   
}