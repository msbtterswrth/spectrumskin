<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}
Kirki::add_panel( 'posts_pages_panel', array(
	'priority'	 => 10,
	'title'		 => esc_attr__( 'Posts and pages', 'futurio-pro' ),
) );

Kirki::add_section( 'blog_posts', array(
	'title'		 => esc_attr__( 'Blog posts archive', 'futurio-pro' ),
  'panel'		 => 'posts_pages_panel',
	'priority'	 => 10,
) );

Kirki::add_section( 'posts_pages', array(
	'title'		 => esc_attr__( 'Single post and page', 'futurio-pro' ),
  'panel'		 => 'posts_pages_panel',
	'priority'	 => 10,
) );

/**
 * Single post and page
 */



/**
 * Blog posts archive
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'infinite_scroll',
	'label'		 => esc_attr__( 'Load More Posts with AJAX', 'futurio-pro' ),
	'section'	 => 'blog_posts',
	'default'	 => 'off',
	'priority'	 => 8,
	'choices'	 => array(
		'off'	 => esc_attr__( 'Off', 'futurio-pro' ),
    'loadmore'	 => esc_attr__( 'On click', 'futurio-pro' ),
		'infinite_loadmore'	 => esc_attr__( 'Infinite', 'futurio-pro' ),
	),
) ); 
 