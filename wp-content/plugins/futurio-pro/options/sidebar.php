<?php

if (!class_exists('Kirki')) {
    return;
}

Kirki::add_section('main_sidebar', array(
    'title' => esc_attr__('Sidebar', 'futurio-pro'),
    'priority' => 10,
));

Kirki::add_field('futurio_extra', array(
    'type' => 'toggle',
    'settings' => 'sticky-sidebar',
    'label' => esc_attr__('Sticky sidebar', 'futurio-pro'),
    'section' => 'main_sidebar',
    'default' => '1',
    'priority' => 10,
));

add_filter('body_class', 'futurio_pro_body_class_sticky');

function futurio_pro_body_class_sticky($classes) {

    $sticky = get_theme_mod('sticky-sidebar', 1);

    if ($sticky == 1) {
        $classes[] = 'sidebar-sticky';
    }

    return $classes;
}
