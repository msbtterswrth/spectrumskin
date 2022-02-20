<?php

if (!class_exists('Kirki')) {
    return;
}

Kirki::add_section('main_menu_colors_section', array(
    'title' => esc_attr__('Main Menu', 'futurio-pro'),
    'panel' => 'colors',
    'priority' => 10,
));

/**
 * Main Menu colors
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'typography_color_mainmenu_shrink',
    'label' => esc_attr__('Floating menu font color', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'choices' => array(
        'alpha' => true,
    ),
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation.navbar.shrink, #site-navigation.navbar.shrink .navbar-nav > li > a, #site-navigation.navbar.shrink .dropdown-menu > li > a',
            'property' => 'color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'bg_color_mainmenu',
    'label' => esc_attr__('Main Menu Background', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'choices' => array(
        'alpha' => true,
    ),
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation, #site-navigation .dropdown-menu, #site-navigation.shrink, .header-cart-block .header-cart-inner ul.site-header-cart, .center-cart-middle',
            'property' => 'background-color',
        ),
        array(
            'element' => '#site-navigation .navbar-nav a, .openNav .menu-container',
            'property' => 'background-color',
            'media_query' => '@media (max-width: 767px)',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'bg_color_mainmenu_shrink',
    'label' => esc_attr__('Floating menu background', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'choices' => array(
        'alpha' => true,
    ),
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation.navbar.shrink',
            'property' => 'background-color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'text_hover_mainmenu',
    'label' => esc_attr__('Font hover', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation .navbar-nav > .open > a:hover, #site-navigation .navbar-nav > li > a:hover, #site-navigation .dropdown-menu > li > a:hover, #site-navigation .nav > li > a:before',
            'property' => 'color',
        ),
        array(
            'element' => '#site-navigation .nav > li > a:before, #site-navigation .current-page-parent:before',
            'property' => 'background-color',
        ),
        array(
            'element' => '#site-navigation .navbar-nav a:hover',
            'property' => 'color',
            'media_query' => '@media (max-width: 767px)',
            'suffix' => '!important',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'bg_text_hover_mainmenu',
    'label' => esc_attr__('Menu background hover', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation .navbar-nav > li > a:hover, #site-navigation .dropdown-menu > li > a:hover, #site-navigation .nav > li > a:before, #site-navigation .nav .open > a, #site-navigation .nav .open > a:hover, #site-navigation .nav .open > a:focus',
            'property' => 'background-color',
        ),
        array(
            'element' => '#site-navigation .navbar-nav a:hover',
            'property' => 'background-color',
            'media_query' => '@media (max-width: 767px)',
            'suffix' => '!important',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'active_text_mainmenu',
    'label' => esc_attr__('Active menu font color', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation .navbar-nav > li.active > a, #site-navigation .dropdown-menu > .active.current-menu-item > a, .dropdown-menu > .active > a, .home-icon.front_page_on i, .navbar-default .navbar-nav > .open > a',
            'property' => 'color',
        ),
        array(
            'element' => '#site-navigation .nav > li.active > a:before',
            'property' => 'background-color',
        ),
        array(
            'element' => '#site-navigation .navbar-nav .active a',
            'property' => 'color',
            'media_query' => '@media (max-width: 767px)',
            'suffix' => '!important',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'active_text_bg_mainmenu',
    'label' => esc_attr__('Active menu background', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation .navbar-nav > li.active > a, #site-navigation .dropdown-menu > .active.current-menu-item > a, .dropdown-menu > .active > a, li.home-icon.front_page_on, li.home-icon.front_page_on:before',
            'property' => 'background-color',
        ),
        array(
            'element' => '#site-navigation .navbar-nav .active.current-menu-item a, .dropdown-menu > .active > a',
            'property' => 'background-color',
            'media_query' => '@media (max-width: 767px)',
            'suffix' => '!important',
        ),
    ),
));

Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'mainmenu_border',
    'label' => esc_attr__('Menu border', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '#site-navigation',
            'property' => 'border-bottom-color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'mainmenu_bumenu_border',
    'label' => esc_attr__('Sub-menu border', 'futurio-pro'),
    'section' => 'main_menu_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '.navbar-nav li:hover .dropdown-menu',
            'property' => 'border-color',
        ),
    ),
));
