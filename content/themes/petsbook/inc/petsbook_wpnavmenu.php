<?php
if (!function_exists('petsbook_wpnavmenu')):

// Header left connect
function header_nav_left_connect()
{
    $menu3 = wp_nav_menu( 
        array(
        'theme_location' => 'header-nav-left-connect',
        'container' => 'nav', 
        'menu_class' => 'header-nav__items__left',  
        'echo' => false,
        ) 
    ); 
    $menu3 = str_replace('menu-item', 'nav-link header-nav__items__left__part__link', $menu3);
    $menu3 = str_replace(' href', ' class="nav-link header-nav__items__left__part__link" href', $menu3);
    echo $menu3;
}

// Header left deconnect
function header_nav_left_deconnect()
{
    $menu3 = wp_nav_menu( 
        array(
        'theme_location' => 'header-nav-left-deconnect',
        'container' => 'nav', 
        'menu_class' => 'header-nav__items__left',  
        'echo' => false,
        ) 
    ); 
    $menu3 = str_replace('menu-item', 'nav-link header-nav__items__left__part__link', $menu3);
    $menu3 = str_replace(' href', ' class="nav-link header-nav__items__left__part__link" href', $menu3);
    echo $menu3;
}

// header right connect
function header_nav_right_connect()
{
    $menu2 = wp_nav_menu( 
        array(
        'theme_location' => 'header-nav-right-connect',
        'container' => 'nav', 
        'menu_class' => 'header-nav__items__right', 
        'echo' => false, 
        ) 
    );  
    $menu2 = str_replace('menu-item', 'nav-link header-nav__items__right__part__link', $menu2);
    $menu2 = str_replace(' href', ' class="nav-link header-nav__items__right__part__link" href', $menu2);
    echo $menu2;
}

// header right deconnect
function header_nav_right_deconnect()
{
    $menu2 = wp_nav_menu( 
        array(
        'theme_location' => 'header-nav-right-deconnect',
        'container' => 'nav', 
        'menu_class' => 'header-nav__items__right', 
        'echo' => false, 
        ) 
    );  
    $menu2 = str_replace('menu-item', 'nav-link header-nav__items__right__part__link', $menu2);
    $menu2 = str_replace(' href', ' class="nav-link header-nav__items__right__part__link" href', $menu2);
    echo $menu2;
}

//footer
function footer_nav()
{
    $menu1 = wp_nav_menu( 
        array(
        'theme_location' => 'footer-nav',
        'container' => 'nav', 
        'menu_class' => 'footer-archives__list',  
        'echo' => false
        ) 
    );  
    $menu1 = str_replace('menu-item', 'footer-archives__list__link', $menu1);
    $menu1 = str_replace(' href', ' class="footer-archives__list__link" href', $menu1);
    echo $menu1;
}
endif;
    