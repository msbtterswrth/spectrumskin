<?php

if (!class_exists('Kirki')) {
    return;
}


Kirki::add_panel('colors', array(
    'priority' => 10,
    'title' => esc_attr__('Colors and Typography', 'futurio-pro'),
));

Kirki::add_section('footer_credits_section', array(
    'title' => esc_attr__('Footer credits', 'futurio-pro'),
    'panel' => 'colors',
    'priority' => 10,
));


/**
 * Footer credits colors
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'copyright_bg_color',
    'label' => esc_attr__('Copyright background', 'futurio-pro'),
    'section' => 'footer_credits_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '.footer-credits, .footer-credits-text',
            'property' => 'background-color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'copyright_links_color',
    'label' => esc_attr__('Copyright', 'futurio-pro'),
    'section' => 'footer_credits_section',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'color' => esc_attr__('Color', 'futurio-pro'),
        'link' => esc_attr__('Links', 'futurio-pro'),
        'hover' => esc_attr__('Hover', 'futurio-pro'),
    ),
    'default' => array(
        'color' => '',
        'link' => '',
        'hover' => '',
    ),
    'output' => array(
        array(
            'choice' => 'color',
            'element' => '.footer-credits, .footer-credits-text',
            'property' => 'color',
        ),
        array(
            'choice' => 'link',
            'element' => '.footer-credits a',
            'property' => 'color',
        ),
        array(
            'choice' => 'hover',
            'element' => '.footer-credits a:hover',
            'property' => 'color',
        ),
    ),
));
