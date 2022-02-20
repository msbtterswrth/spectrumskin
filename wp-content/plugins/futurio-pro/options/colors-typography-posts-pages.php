<?php

if (!class_exists('Kirki')) {
    return;
}

Kirki::add_panel('colors', array(
    'priority' => 10,
    'title' => esc_attr__('Colors and Typography', 'futurio-pro'),
));

Kirki::add_section('post_page_colors_section', array(
    'title' => esc_attr__('Posts & Pages', 'futurio-pro'),
    'panel' => 'colors',
    'priority' => 10,
));


/**
 * Colors
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'single_meta_date',
    'label' => esc_attr__('Date colors', 'futurio-pro'),
    'section' => 'post_page_colors_section',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'text' => esc_attr__('Text', 'futurio-pro'),
        'bg' => esc_attr__('Background', 'futurio-pro'),
    ),
    'default' => array(
        'text' => '',
        'bg' => '',
    ),
    'output' => array(
        array(
            'choice' => 'text',
            'element' => '.single .content-date-comments span',
            'property' => 'color',
        ),
        array(
            'choice' => 'bg',
            'element' => '.single .date-meta',
            'property' => 'background-color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'single_meta_comments',
    'label' => esc_attr__('Comments colors', 'futurio-pro'),
    'section' => 'post_page_colors_section',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'text' => esc_attr__('Text', 'futurio-pro'),
        'bg' => esc_attr__('Background', 'futurio-pro'),
    ),
    'default' => array(
        'text' => '',
        'bg' => '',
    ),
    'output' => array(
        array(
            'choice' => 'text',
            'element' => '.single .comments-meta, .single .comments-meta a',
            'property' => 'color',
        ),
        array(
            'choice' => 'bg',
            'element' => '.single .comments-meta',
            'property' => 'background-color',
        ),
    ),
));
