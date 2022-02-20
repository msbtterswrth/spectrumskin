<?php
add_filter( 'get_custom_logo', 'futurio_pro_custom_logo' );
/**
 * Add second logo to transparent menu bar
 */
function futurio_pro_custom_logo( $html ) {
    $transparent_logo_id = futurio_pro_get_meta( 'transparent_menu_logo' );
    if ( futurio_pro_get_meta( 'transparent_menu_option' ) == 'enable' && $transparent_logo_id[0] != '' && get_theme_mod( 'title_heading', 'boxed' ) == 'boxed' ) {
      $html .= sprintf( '<a href="%1$s" class="transparent-logo-link">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $transparent_logo_id[0], 'full', false, array(
                'class'    => 'transparent-custom-logo', 
            ) )
        );
    }    
    return $html;   
}

add_filter( 'body_class', 'futurio_pro_custom_logo_class' );
/**
 * Add class to body for second logo
 */
function futurio_pro_custom_logo_class( $classes ) {
    if ( futurio_pro_get_meta( 'transparent_menu_option' ) == 'enable' && get_theme_mod( 'title_heading', 'boxed' ) == 'boxed' ) {
        $classes[] = 'transparent-menu';
    }
    return $classes;
}
function futurio_pro_hex2rgb ( $hex_color = 'ffffff', $opacity = 0 ) {
    if ($hex_color == '' )
    return;
    $values = str_replace( '#', '', $hex_color );
    $value = str_split($values, 2);
    $o = $opacity;
    $r = hexdec($value[0]);
    $g = hexdec($value[1]);
    $b = hexdec($value[2]);
    return "rgb(" . absint( $r ) . ", " . absint( $g ) . ", " . absint( $b ) . ", 0." . $o . ")";
}
/**
 * Add custom CSS styles
 */
function futurio_pro_transparent_header_css() {

	$transparent_menu_color = futurio_pro_get_meta( 'transparent_menu_color' );
  $transparent_title_color = futurio_pro_get_meta( 'transparent_title_color' );
  $transparent_tagline_color = futurio_pro_get_meta( 'transparent_tagline_color' );
  //$transparent_menu_content_pos = futurio_pro_get_meta( 'content_position' );
  $transparent_menu_bg_color = futurio_pro_get_meta( 'transparent_bg_color' );
  $transparent_menu_bg_color_opacity = futurio_pro_get_meta( 'transparent_bg_color_opacity' );
  $css = '';
	if ( futurio_pro_get_meta( 'transparent_menu_option' ) == 'enable' && $transparent_menu_color != '' && get_theme_mod( 'title_heading', 'boxed' ) == 'boxed' ) {
		$css = '@media (min-width: 768px) {.transparent-menu #site-navigation:not(.shrink) .navbar-nav > li > a {color: ' . $transparent_menu_color . '}}
    .transparent-menu #site-navigation:not(.shrink) .header-cart a.cart-contents i.fa, .transparent-menu #site-navigation:not(.shrink) .header-login a i.fa, .transparent-menu #site-navigation:not(.shrink) .top-search-icon i, .transparent-menu #site-navigation:not(.shrink) .offcanvas-sidebar-toggle i, .transparent-menu #site-navigation:not(.shrink) .site-branding-text h1.site-title a, .transparent-menu #site-navigation:not(.shrink) .brand-absolute {color: ' . $transparent_menu_color . '}
    .transparent-menu #site-navigation:not(.shrink) .site-branding-text .site-title a {color: ' . $transparent_title_color . '}
    .transparent-menu #site-navigation:not(.shrink) p.site-description {color: ' . $transparent_tagline_color . '}
    .transparent-menu #site-navigation:not(.shrink) .open-panel span {background-color: ' . $transparent_menu_color . '}
    
    .transparent-menu #site-navigation:not(.shrink) { background-color: ' . futurio_pro_hex2rgb( $transparent_menu_bg_color, $transparent_menu_bg_color_opacity ) . '; }
    ';
	}; 

	$custom_css = "
  		{$css}
  	";
	wp_add_inline_style( 'futurio-stylesheet', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'futurio_pro_transparent_header_css', 9999 );