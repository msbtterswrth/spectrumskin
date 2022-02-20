<?php
/*
 * Plugin Name: Futurio PRO
 * Plugin URI: https://futuriowp.com/
 * Description: Extra addon for free Futurio Theme and Futurio Extra plugin
 * Version: 1.8.1
 * Author: FuturioWP
 * Author URI: https://futuriowp.com/
 * WC requires at least: 3.3.0
 * WC tested up to: 6.0
 */

if (!function_exists('add_action')) {
    die('Nothing to do...');
}

$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$plugin_version = $plugin_data['Version'];
define('FUTURIO_PRO_CURRENT_VERSION', $plugin_version);
//plugin constants
define('FUTURIO_PRO_PATH', plugin_dir_path(__FILE__));
define('FUTURIO_PRO_PLUGIN_BASE', plugin_basename(__FILE__));
define('FUTURIO_PRO_PLUGIN_DIR', plugin_dir_url(__FILE__));

add_action('plugins_loaded', 'futurio_pro_load_textdomain');

function futurio_pro_load_textdomain() {
    load_plugin_textdomain('futurio-pro', false, basename(dirname(__FILE__)) . '/languages/');
}

function futurio_pro_scripts() {
    wp_enqueue_style('futurio-pro', plugin_dir_url(__FILE__) . 'css/style.css', array(), FUTURIO_PRO_CURRENT_VERSION);
    
    $dep = array('jquery');
    if (class_exists('WooCommerce')) {
        $dep = array('jquery', 'wc-cart-fragments');
    }

    wp_enqueue_script('futurio-pro-js', plugin_dir_url(__FILE__) . 'js/futurio-pro.js', $dep, FUTURIO_PRO_CURRENT_VERSION, true);
    if (is_rtl()) {
        // wp_enqueue_script( 'futurio-pro-rtl-js', plugin_dir_url( __FILE__ ) . '/js/futurio-pro-rtl.js', array( 'jquery' ), '1.0.1', true );
        // wp_deregister_script( 'futurio-pro-js' );
    }
    if (get_theme_mod('sticky-sidebar', 1) == 1) {
        wp_enqueue_script('futurio-pro-sticky', plugin_dir_url(__FILE__) . 'js/hc-sticky.js', array('jquery'), '1.0.0', true);
    }
}

add_action('wp_enqueue_scripts', 'futurio_pro_scripts');

require_once( FUTURIO_PRO_PATH . 'lib/vendor/sl-plugin.php' );

if (!in_array('ultimate-elementor/ultimate-elementor.php', apply_filters('active_plugins', get_option('active_plugins'))) && in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    require_once( FUTURIO_PRO_PATH . 'lib/ultimate-elementor/ultimate-elementor.php' );
}

/**
 * Add Metadata on plugin activation.
 */
function futurio_pro_activate() {
    $new_new_arr = Array(
        'agency' => Array
            (
            'author' => '',
            'author_url' => 'https://futuriowp.com/',
            'hide_branding' => '1',
        ),
        'plugin' => Array
            (
            'name' => '',
            'short_name' => '',
            'description' => '',
        ),
        'replace_logo' => 'enable',
        'enable_knowledgebase' => 'disable',
        'knowledgebase_url' => '',
        'enable_support' => 'disable',
        'support_url' => 'https://futuriowp.com/',
        'enable_custom_tagline' => 'disable',
        'enable_beta_box' => 'disable',
        'internal_help_links' => 'disable',
    );
    add_site_option('_uael_white_label', $new_new_arr);
    add_site_option( 'bsf_analytics_optin', 'no' );
}

register_activation_hook(__FILE__, 'futurio_pro_activate');

/* Check if Futurio theme is activated */

if (!empty($GLOBALS['pagenow']) && 'plugins.php' === $GLOBALS['pagenow']) {
    add_action('admin_notices', 'futurio_pro_admin_notices', 0);
}

function futurio_pro_requirements() {

    $futurio_pro_errors = array();
    $theme = wp_get_theme();

    if (( 'Futurio' != $theme->name ) && ( 'Futurio' != $theme->parent_theme )) {

        $futurio_pro_errors[] = __('You need to have <a href="https://wordpress.org/themes/futurio/" target="_blank">Futurio</a> theme in order to use Futurio PRO plugin.', 'futurio-pro');
    }

    return $futurio_pro_errors;
}

function futurio_pro_admin_notices() {

    $futurio_pro_errors = futurio_pro_requirements();

    if (empty($futurio_pro_errors))
        return;

    /* Suppress "Plugin activated" notice. */
    unset($_GET['activate']);

    echo '<div class="notice error my-futurio-credits-notice is-dismissible">';
    echo '<p>' . join($futurio_pro_errors) . '</p>';
    echo '<p>' . __('<i>Futurio PRO</i> plugin has been deactivated.', 'futurio-pro') . '</p>';
    echo '</div>';

    deactivate_plugins(plugin_basename(__FILE__));
}

if (!class_exists('Kirki')) {
    include_once( plugin_dir_path(__FILE__) . 'include/kirki.php' );
}

/**
 * Remove Kirki telemetry
 */
function futurio_pro_remove_kirki_module($modules) {
    unset($modules['telemetry']);
    unset($modules['gutenberg']);
    return $modules;
}

add_filter('kirki_modules', 'futurio_pro_remove_kirki_module');
add_filter( 'kirki_telemetry', '__return_false' );
add_filter( 'bsf_tracking_enabled', '__return_false' );

/* Register the config */
Kirki::add_config('futurio_extra', array(
    'capability' => 'edit_theme_options',
    'option_type' => 'theme_mod',
));

require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-presets.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-archive.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-posts-pages.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-top-bar.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-header-title.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-main-menu.php' );
require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-widget.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-footer-widget.php' );
require_once( plugin_dir_path(__FILE__) . 'options/colors-typography-footer-credits.php' );
//require_once( plugin_dir_path( __FILE__ ) . 'options/header.php' );
require_once( plugin_dir_path(__FILE__) . 'options/global.php' );
//require_once( plugin_dir_path( __FILE__ ) . 'options/top-bar.php' );
require_once( plugin_dir_path(__FILE__) . 'options/menu-icons.php' );
require_once( plugin_dir_path(__FILE__) . 'options/posts-pages.php' );
require_once( plugin_dir_path(__FILE__) . 'options/sidebar.php' );
//require_once( plugin_dir_path( __FILE__ ) . 'options/custom-codes.php' );

add_action('plugins_loaded', 'futurio_pro_check_for_woocommerce');

function futurio_pro_check_for_woocommerce() {
    if (!defined('WC_VERSION')) {
        // no woocommerce :(
    } else {
        require_once( plugin_dir_path(__FILE__) . 'options/woocommerce.php' );
        require_once( plugin_dir_path(__FILE__) . 'lib/woocommerce.php' );
        require_once( plugin_dir_path(__FILE__) . 'lib/shortcodes/shortcodes-woo.php' );
    }
}

add_action('customize_register', 'futurio_pro_theme_customize_register', 99);

function futurio_pro_theme_customize_register($wp_customize) {
    $wp_customize->remove_section('futurio_page_view_pro');
}

function futurio_pro_g_fonts() {
    $fonts = array();
    return $fonts;
}

function futurio_pro_get_meta($name = '', $output = '') {
    if (is_singular(array('post', 'page'))) {
        global $post;
        $meta = get_post_meta($post->ID, 'futurio_meta_' . $name, true);
        if (isset($meta) && $meta != '') {
            if ($output == 'echo') {
                echo esc_html($meta);
            } else {
                return $meta;
            }
        } else {
            return;
        }
    }
}

/**
 * Check Elementor plugin
 */
function futurio_pro_check_for_elementor() {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    return is_plugin_active('elementor/elementor.php');
}

/**
 * Register Elementor features
 */
if (futurio_pro_check_for_elementor()) {
    include_once( plugin_dir_path(__FILE__) . 'lib/elementor/widgets.php' );
    include_once( plugin_dir_path(__FILE__) . 'lib/elementor/helpers.php');
}

/**
 * Back to top
 */
function futurio_pro_back_to_top() {
    if (get_theme_mod('back_to_top', 1) == 1) {
        ?>
        <!-- Return to Top -->
        <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
        <?php
    }
}

/**
 * Popup cart
 */
function futurio_pro_popup_middle_cart() {
    if (get_theme_mod('popup_cart', 1) == 1) {
        ?>
        <!-- Return to Top -->
        <div class="middle-cart">
            <div id="middle-cart-overlay"></div>
            <div class="center-cart-middle text-center">
                <?php echo the_widget('WC_Widget_Cart', 'title='); ?>
                <div id="middle-cart-close" class="fa fa-times"></div>
            </div>
        </div>
        <?php
    }
}

function futurio_pro_extra_action() {
    add_action('futurio_after_footer', 'futurio_pro_back_to_top');
    add_action('futurio_after_footer', 'futurio_pro_popup_middle_cart');
    // require_once( plugin_dir_path( __FILE__ ) . 'lib/metabox/options.php' );
}

add_action('after_setup_theme', 'futurio_pro_extra_action', 0);

if (get_theme_mod('infinite_scroll', 'off') != 'off') {
    require_once( plugin_dir_path(__FILE__) . 'lib/infinite-load.php' );
}

require_once( plugin_dir_path(__FILE__) . 'lib/transparent-header.php' );

// require_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/pro-posts.php' );
// require_once( plugin_dir_path( __FILE__ ) . 'lib/widgets/pro-tabs.php' );