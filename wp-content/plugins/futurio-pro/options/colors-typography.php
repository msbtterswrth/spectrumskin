<?php

if (!class_exists('Kirki')) {
    return;
}


Kirki::add_panel('colors', array(
    'priority' => 10,
    'title' => esc_attr__('Colors and Typography', 'futurio-pro'),
));

Kirki::add_section('main_colors_section', array(
    'title' => esc_attr__('Content', 'futurio-pro'),
    'panel' => 'colors',
    'priority' => 10,
));


/**
 * Colors
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'main_color_content_bg',
    'label' => esc_attr__('Background', 'futurio-pro'),
    'section' => 'main_colors_section',
    'default' => '',
    'transport' => 'auto',
    'priority' => 10,
    'output' => array(
        array(
            'element' => '.main-container, .container-fluid.head-bread, .offcanvas-sidebar .widget-title h3, #sidebar .widget-title h3, .container-fluid.archive-page-header, .offcanvas-sidebar, .woo-float-info, #product-nav > a',
            'property' => 'background-color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'main_color_links',
    'label' => esc_attr__('Links', 'futurio-pro'),
    'section' => 'main_colors_section',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'link' => esc_attr__('Color', 'futurio-pro'),
        'hover' => esc_attr__('Hover', 'futurio-pro'),
    ),
    'default' => array(
        'link' => '',
        'hover' => '',
    ),
    'output' => array(
        array(
            'choice' => 'link',
            'element' => 'a, .author-meta a, .tags-links a, nav.navigation.pagination .nav-links a',
            'property' => 'color',
        ),
        array(
            'choice' => 'link',
            'element' => '.widget-title:before, nav.navigation.pagination .current:before',
            'property' => 'background-color',
        ),
        array(
            'choice' => 'link',
            'element' => 'nav.navigation.pagination .current:before',
            'property' => 'border-color',
        ),
        array(
            'choice' => 'hover',
            'element' => 'a:active, a:hover, a:focus, .tags-links a:hover',
            'property' => 'color',
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'multicolor',
    'settings' => 'main_color_buttons',
    'label' => esc_attr__('Buttons', 'futurio-pro'),
    'section' => 'main_colors_section',
    'priority' => 10,
    'transport' => 'auto',
    'choices' => array(
        'color' => esc_attr__('Color', 'futurio-pro'),
        'bg' => esc_attr__('Background', 'futurio-pro'),
        'border' => esc_attr__('Border', 'futurio-pro'),
    ),
    'default' => array(
        'color' => '',
        'bg' => '',
        'border' => '',
    ),
    'output' => array(
        array(
            'choice' => 'color',
            'element' => '.read-more-button a, #searchsubmit, .btn-default, input[type="submit"], input#submit, input#submit:hover, button, a.comment-reply-link, .btn-default:hover, input[type="submit"]:hover, button:hover, a.comment-reply-link:hover',
            'property' => 'color',
        ),
        array(
            'choice' => 'bg',
            'element' => '.read-more-button a, #searchsubmit, .btn-default, input[type="submit"], input#submit, input#submit:hover, button, a.comment-reply-link, .btn-default:hover, input[type="submit"]:hover, button:hover, a.comment-reply-link:hover',
            'property' => 'background-color',
        ),
        array(
            'choice' => 'border',
            'element' => '.read-more-button a, #searchsubmit, .btn-default, input[type="submit"], input#submit, input#submit:hover, button, a.comment-reply-link, .btn-default:hover, input[type="submit"]:hover, button:hover, a.comment-reply-link:hover',
            'property' => 'border-color',
        ),
    ),
));
