<?php

if (!class_exists('Kirki')) {
    return;
}

/**
 * Presets
 */
Kirki::add_field('futurio_extra', array(
    'type' => 'toggle',
    'settings' => 'color_preset_pro_on_off',
    'label' => esc_attr__('Custom Pressets', 'futurio-pro'),
    'section' => 'presets_colors_section',
    'default' => 0,
    'priority' => 2,
));
Kirki::add_field('futurio_extra', [
    'type' => 'custom',
    'settings' => 'color_preset_pro_message',
    'section' => 'presets_colors_section',
    'default' => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . esc_html__('Custom Presets', 'futurio-pro') . '</h3>',
    'label' => esc_html__('This way, you can easily override the default theme colors. These options can be overridden in each color section, and the colors of the separate section have higher priority.', 'futurio-pro'), // optional
    'priority' => 3,
]);
Kirki::add_field('futurio_extra', array(
    'type' => 'color-palette',
    'settings' => 'color_preset_pro_bg',
    'label' => esc_attr__('Background Color', 'futurio-pro'),
    'section' => 'presets_colors_section',
    'default' => '',
    'priority' => 5,
    'default' => '',
    'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
		'size'   => 20,
	),
    'active_callback' => array(
        array(
            'setting' => 'color_preset_pro_on_off',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'color_preset_pro_text',
    'label' => esc_attr__('Text Color', 'futurio-pro'),
    'section' => 'presets_colors_section',
    'default' => '',
    'priority' => 5,
    'default' => '',
    'active_callback' => array(
        array(
            'setting' => 'color_preset_pro_on_off',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'color_preset_pro_links',
    'label' => esc_attr__('Links', 'futurio-pro'),
    'section' => 'presets_colors_section',
    'default' => '',
    'priority' => 5,
    'default' => '',
    'active_callback' => array(
        array(
            'setting' => 'color_preset_pro_on_off',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Kirki::add_field('futurio_extra', array(
    'type' => 'color',
    'settings' => 'color_preset_pro_links_hover',
    'label' => esc_attr__('Links hover', 'futurio-pro'),
    'section' => 'presets_colors_section',
    'default' => '',
    'priority' => 5,
    'default' => '',
    'active_callback' => array(
        array(
            'setting' => 'color_preset_pro_on_off',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));

/**
 * Add custom CSS styles
 */
function futurio_pro_presets_css() {

    $preset = get_theme_mod('color_preset_pro_on_off', 0);
    $css = '';
    if ($preset == 1) {
        $bg = get_theme_mod('color_preset_pro_bg', '');
        $tx = get_theme_mod('color_preset_pro_text', '');
        $lnk = get_theme_mod('color_preset_pro_links', '');
        $hv = get_theme_mod('color_preset_pro_links_hover', '');
    
        $css .= '#site-navigation .dropdown-menu>.active>a {background-color: transparent;}, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{background-color:'.$bg.';}.main-container, .container-fluid.head-bread, .offcanvas-sidebar .widget-title h3, #sidebar .widget-title h3, .container-fluid.archive-page-header, .offcanvas-sidebar, .cart-contents span.count, #product-nav > a, .woo-float-info{background-color:'.$bg.';}a, .author-meta a, .tags-links a, nav.navigation.pagination .nav-links a{color:'.$lnk.';}.widget-title:before, nav.navigation.pagination .current:before{background-color:'.$bg.';}nav.navigation.pagination .current:before{border-color:'.$bg.';}a:active, a:hover, a:focus, .tags-links a:hover{color:'.$hv.';}.read-more-button a, #searchsubmit, .btn-default, input[type="submit"], input#submit, button, a.comment-reply-link{color:'.$lnk.';background-color:'.$bg.';border-color:'.$lnk.';}, input#submit:hover, .btn-default:hover, input[type="submit"]:hover, button:hover, a.comment-reply-link:hover{color:'.$hv.';background-color:'.$bg.';border-color:'.$hv.';}body, nav.navigation.post-navigation a, .nav-subtitle{color:'.$bg.';}.comments-meta a{color:'.$lnk.';}.news-item h2 a, .page-header, .page-header a, h1.single-title, h1, h2, h3, h4, h5, h6{color:'.$tx.';}.top-bar-section{color:'.$tx.';}.site-branding-text h1.site-title a:hover, .site-branding-text .site-title a:hover, .site-branding-text h1.site-title, .site-branding-text .site-title, .site-branding-text h1.site-title a, .site-branding-text .site-title a{color:'.$tx.';}p.site-description{color:'.$tx.';}#site-navigation, #site-navigation .dropdown-menu, #site-navigation.shrink, .header-cart-block:hover ul.site-header-cart{background-color:'.$bg.';}#site-navigation, #site-navigation .navbar-nav > li > a, #site-navigation .dropdown-menu > li > a{color:'.$tx.';}.open-panel span{background-color:'.$tx.';}.open-panel span, .header-cart a.cart-contents, .header-login a, .top-search-icon i, .offcanvas-sidebar-toggle i, .site-header-cart, .site-header-cart a{color:'.$tx.';}#site-navigation .navbar-nav > li > a:hover, #site-navigation .dropdown-menu > li > a:hover, #site-navigation .nav > li > a:before{color:'.$hv.';}#site-navigation .nav > li > a:before, #site-navigation .nav > li.active > a:before, #site-navigation .current-page-parent:before{background-color:'.$tx.';}#site-navigation .navbar-nav > li > a:hover, #site-navigation .dropdown-menu > li > a:hover{background-color:'.$bg.';}#site-navigation .navbar-nav > li.active > a, #site-navigation .dropdown-menu > .active > a, .home-icon.front_page_on i{color:'.$lnk.';}#sidebar .widget-title h3{color:'.$tx.';}#sidebar .widget-title:after, .offcanvas-sidebar .widget-title:after{background-color:'.$tx.';}.widget-title h3{border-color:'.$tx.';}.widget{color:#e8e8e8;}#content-footer-section, #content-footer-section .widget-title h3{background-color:#5b5b5b;}.single .content-date-comments span{color:'.$tx.';}.date-meta{background-color:'.$bg.';}.comments-meta, .comments-meta a{color:#0a0a0a;}.comments-meta{background-color:#e5e5e5;}.woocommerce ul.products li.product h3, li.product-category.product h3, .woocommerce ul.products li.product h2.woocommerce-loop-product__title, .woocommerce ul.products li.product h2.woocommerce-loop-category__title{color:#eaeaea;}.woocommerce ul.products li.product .price{color:'.$bg.';}.woocommerce ul.products li.product, .woocommerce-page ul.products li.product, li.product-category.product, .woocommerce ul.products li.product .woocommerce-loop-category__title{background:rgba(255,255,255,0);}.woocommerce ul.products li.product .button{color:'.$tx.';}.woocommerce ul.products li.product .button:hover{color:'.$bg.';}.woocommerce span.onsale, .single .woocommerce .related span.onsale{background-color:'.$bg.';}.woocommerce div.product p.price, .woocommerce div.product span.price{color:'.$bg.';}.woocommerce .summary .star-rating span{color:'.$bg.';}.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a{color:'.$bg.';}.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li:hover a{border-bottom-color:'.$bg.';}.woocommerce div.product .woocommerce-tabs ul.tabs li a{color:#a35725;}.woocommerce #respond input#submit, .woocommerce a.button, #sidebar .widget.widget_shopping_cart a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{color:'.$tx.';}.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{border-color:'.$bg.';background-color:'.$bg.';}.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, #sidebar .widget.widget_shopping_cart a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{color:'.$bg.';}.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{border-color:'.$bg.';background-color:'.$tx.';}@media (max-width: 767px){#site-navigation .navbar-nav a, .openNav .menu-container{background-color:#2d2d2d;}#site-navigation .navbar-nav a:hover{color:'.$tx.'!important;background-color:#a35725!important;}#site-navigation .navbar-nav .active a{color:'.$bg.'!important;}}';
    } 

    wp_add_inline_style('futurio-stylesheet', $css);
}

add_action('wp_enqueue_scripts', 'futurio_pro_presets_css', 9999);
