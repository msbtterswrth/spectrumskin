<?php

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Futurio_PRO_Menu extends Widget_Base {

    public function get_name() {
        return 'futurio-custom-menu';
    }

    public function get_title() {
        return __('Futurio Custom Menu', 'futurio-pro');
    }

    public function get_icon() {
        return 'fa fa-bars';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
                'section_style_text',
                [
                    'label' => __('Menu Options', 'futurio-pro'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_control(
                'select_menu',
                [
                    'label' => __('Select menu', 'futurio-pro'),
                    'type' => Controls_Manager::SELECT,
                    'options' => navmenu_navbar_menu_choices(),
                    'default' => '',
                ]
        );

        $this->add_responsive_control(
                'alignment',
                [
                    'label' => __('Alignment', 'futurio-pro'),
                    'type' => Controls_Manager::CHOOSE,
                    'label_block' => false,
                    'options' => [
                        'left' => [
                            'title' => __('Left', 'futurio-pro'),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __('Center', 'futurio-pro'),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __('Right', 'futurio-pro'),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'separator' => 'before',
                ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="main-menu futurio-elementor-menu">
            <nav id="site-navigation" class="navbar navbar-default nav-pos-<?php echo $settings['alignment']; ?>">     
                <div class="container-fluid">   
                    <div class="navbar-header">
                        <div id="elementor-menu-panel" class="open-panel" data-panel="elementor-menu-panel">
                            <span></span>
                            <span></span>
                            <span></span>
                            <div class="brand-absolute visible-xs"><?php esc_html_e('Menu', 'futurio-pro'); ?></div>
                        </div>
                    </div>
                    <div class="nav navbar-nav navbar-<?php echo $settings['alignment']; ?>">
                        <?php
                        $menu_loc = $settings['select_menu'];
                        wp_nav_menu(array(
                            'menu' => $menu_loc,
                            'depth' => 5,
                            'container' => 'div',
                            'container_class' => 'menu-container',
                            'menu_class' => 'nav navbar-nav navbar-left',
                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                            'walker' => new wp_bootstrap_navwalker(),
                        ));
                        ?>
                    </div>
                </div>
            </nav> 
        </div>
        <?php
    }

    protected function _content_template() {
        
    }

}

function navmenu_navbar_menu_choices() {
    $menus = wp_get_nav_menus();
    $items = array();
    $i = 0;
    foreach ($menus as $menu) {
        if ($i == 0) {
            $default = $menu->slug;
            $i ++;
        }
        $items[$menu->slug] = $menu->name;
    }
    return $items;
}
