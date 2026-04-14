<?php
/**
 * EvolveWP PredictiveERP - Developer Toolbar
 *
 * @package EvolveWP PredictiveERP/Toolbars
 * @since 1.0.0
 */
 
if (!defined('ABSPATH')) {
    exit;
}  

if (!class_exists('EvolveWP_ERP_Admin_Toolbar_Developers')) :

class EvolveWP_ERP_Admin_Toolbar_Developers {
    public function __construct() {
        if (!current_user_can('manage_options')) {
            return false;
        }
        
        $this->init(); 
    }    
    
    private function init() {
        global $wp_admin_bar;  

        self::parent_level();
        self::second_level_tools();
    }

    private static function parent_level() {
        global $wp_admin_bar;   
        
        $args = array(
            'id'     => 'evolvewp-predictiveerp-toolbarmenu-developers',
            'title'  => __('EvolveWP PredictiveERP Dev', 'evolvewp-predictiveerp'),          
        );
        $wp_admin_bar->add_menu($args);        
    }
    
    private static function second_level_tools() {
        global $wp_admin_bar;
        
        // Group - Developer Tools
        $args = array(
            'id'     => 'evolvewp-predictiveerp-toolbarmenu-devtools',
            'parent' => 'evolvewp-predictiveerp-toolbarmenu-developers',
            'title'  => __('Developer Tools', 'evolvewp-predictiveerp'), 
            'meta'   => array('class' => 'second-toolbar-group')         
        );        
        $wp_admin_bar->add_menu($args);        
            
        // Demo Mode Switch
        $thisaction = 'evolvewp_erp_demo_mode_switch';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        
        $is_demo = get_option('evolvewp_erp_demo_mode', false);
        
        if ($is_demo) {
            $title = __('✅ Demo Mode: ON', 'evolvewp-predictiveerp');        
        } else {
            $title = __('❌ Demo Mode: OFF', 'evolvewp-predictiveerp');    
        }
           
        $args = array(
            'id'     => 'evolvewp-predictiveerp-toolbarmenu-toggledemomode',
            'parent' => 'evolvewp-predictiveerp-toolbarmenu-devtools',
            'title'  => $title,
            'href'   => esc_url($href),            
        );
        
        $wp_admin_bar->add_menu($args);
        
        // Reset Pointers
        $thisaction = 'evolvewp_erp_reset_pointers';
        $href = admin_url('admin-post.php?action=' . $thisaction);
        
        $args = array(
            'id'     => 'evolvewp-predictiveerp-toolbarmenu-resetpointers',
            'parent' => 'evolvewp-predictiveerp-toolbarmenu-devtools',
            'title'  => __('Reset Pointers', 'evolvewp-predictiveerp'),
            'href'   => esc_url(wp_nonce_url($href, 'evolvewp_erp_reset_pointers')),
        );
        
        $wp_admin_bar->add_menu($args);
        
        // Link to Development Page
        $args = array(
            'id'     => 'evolvewp-predictiveerp-toolbarmenu-devpage',
            'parent' => 'evolvewp-predictiveerp-toolbarmenu-devtools',
            'title'  => __('Development Page', 'evolvewp-predictiveerp'),
            'href'   => admin_url('admin.php?page=evolvewp_erp_development'),
        );
        
        $wp_admin_bar->add_menu($args);
    }
}   

endif;

if (current_user_can('manage_options')) {
    return new EvolveWP_ERP_Admin_Toolbar_Developers();
}
