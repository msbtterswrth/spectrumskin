<?php

if (!class_exists('Kirki')) {
    return;
}

Kirki::add_panel('colors', array(
    'priority' => 10,
    'title' => esc_attr__('Colors and Typography', 'futurio-pro'),
));

Kirki::add_section('archive_colors_section', array(
    'title' => esc_attr__('Blog & Archive', 'futurio-pro'),
    'panel' => 'colors',
    'priority' => 10,
));


/**
 * Colors
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'global_meta_date',
    'label' => esc_attr__('Date colors', 'futurio-pro'),
    'section' => 'archive_colors_section',
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
            'element' => '.content-date-comments span',
            'property' => 'color',
        ),
        array(
            'choice' => 'bg',
            'element' => '.date-meta',
            'property' => 'background-color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'global_meta_comments',
    'label' => esc_attr__('Comments colors', 'futurio-pro'),
    'section' => 'archive_colors_section',
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
            'element' => '.comments-meta, .comments-meta a',
            'property' => 'color',
        ),
        array(
            'choice' => 'bg',
            'element' => '.comments-meta',
            'property' => 'background-color',
        ),
    ),
));
