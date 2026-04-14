<?php
/**
 * EvolveWP PredictiveERP - Plugin Menus
 *
 * Maintain plugins admin menu and tab-menus here.  
 *
 * @author   Ryan Bayne
 * @category User Interface
 * @package  EvolveWP PredictiveERP/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_ERP_Admin_Menus' ) ) :

/**
 * EvolveWP_ERP_Admin_Menus Class.
 */
class EvolveWP_ERP_Admin_Menus {

    /**
     * Hook in tabs.
     */
    public function __construct() {
        //add_action( 'admin_menu', array( $this, 'toplevel_menu' ), 9 );
        add_action( 'admin_menu', array( $this, 'settings_menu' ), 100 );
        add_action( 'admin_menu', array( $this, 'mainviews_menu' ), 100 );
    }

    /**
     * Add menu items.
     */
    public function toplevel_menu() {
        //add_menu_page( __( 'EvolveWP PredictiveERP', 'evolvewp-predictiveerp' ), __( 'EvolveWP PredictiveERP', 'evolvewp-predictiveerp' ), 'activate_plugins', 'evolvewp-predictiveerp', array( $this, 'main_page' ), null, '55.5' );
    }

    /**
     * Add settings menu item to the existing Settings menu.
     */
    public function settings_menu() {
        //$settings_page = add_submenu_page( 'evolvewp-predictiveerp', __( 'EvolveWP PredictiveERP Settings', 'evolvewp-predictiveerp' ),  __( 'Settings', 'evolvewp-predictiveerp' ) , 'activate_plugins', 'evolvewp-predictiveerp-settings', array( $this, 'settings_page' ) ); 
        //add_action( 'load-' . $settings_page, array( $this, 'settings_page_init' ) );
        
        add_options_page( __( 'EvolveWP PredictiveERP Settings', 'evolvewp-predictiveerp' ), __( 'EvolveWP PredictiveERP Settings', 'evolvewp-predictiveerp' ), 'activate_plugins', 'evolvewp-predictiveerp-settings', array( $this, 'settings_page' ) );
    }

    /**
    * Add the main tables views to the existing Plugins menu.  
    */
    public function mainviews_menu() {
        add_plugins_page( __( 'EvolveWP PredictiveERP Plugin', 'evolvewp-predictiveerp' ), __( 'EvolveWP PredictiveERP Plugin', 'evolvewp-predictiveerp' ), 'activate_plugins', 'evolvewp-predictiveerp', array( $this, 'main_page' ) );        
    } 
        
    /**
    * Init the main page. 
    */
    public function main_page() { 
        EvolveWP_ERP_Admin_Main_Views::output(); 
    }
        
    /**
     * Init the settings page.
     */
    public function settings_page() {    
        EvolveWP_ERP_Admin_Settings::output();
    }
    
    /**
     * Loads settings into memory for use within the view.
     */
    public function settings_page_init() {

    }
      
}

endif;

return new EvolveWP_ERP_Admin_Menus();