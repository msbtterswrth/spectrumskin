<?php

if (!class_exists('Kirki')) {
    return;
}


Kirki::add_section('header_colors_section', array(
    'title' => esc_attr__('Header & Title', 'futurio-pro'),
    'panel' => 'colors',
    'priority' => 10,
));


/**
 * Header colors
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'header_bg_color_header',
    'label' => esc_attr__('Header Background', 'futurio-pro'),
    'section' => 'header_colors_section',
    'default' => '',
    'choices' => array(
        'alpha' => true,
    ),
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '.site-header',
            'property' => 'background-color',
        ),
    ),
));
