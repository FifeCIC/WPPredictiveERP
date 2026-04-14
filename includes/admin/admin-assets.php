<?php
/**
 * EvolveWP PredictiveERP - Load Assets 
 *
 * Load admin only js, css, images and fonts. 
 *
 * @author   Ryan Bayne
 * @category Loading
 * @package  EvolveWP PredictiveERP/Loading
 * @since    1.0.0
 * @version  1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_ERP_Admin_Assets' ) ) :

/**
 * EvolveWP_ERP_Admin_Assets Class.
 */
class EvolveWP_ERP_Admin_Assets {

    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) ); 
    }

    /**
     * Enqueue styles for the admin side.
     */
    public function admin_styles() {
        global $wp_scripts;
        
        // Screen ID Must be set for later arguments
        $screen         = get_current_screen();
        $screen_id      = $screen ? $screen->id : '';
        
        // Register admin styles
        wp_register_style( 'evolvewp_erp_admin_styles', EvolveWPPredictiveERP()->plugin_url() . '/assets/css/admin.css', array(), EVOLVEWP_ERP_VERSION );
        wp_register_style( 'evolvewp_erp_tooltips', EvolveWPPredictiveERP()->plugin_url() . '/assets/css/tooltips.css', array(), EVOLVEWP_ERP_VERSION );
        wp_register_style( 'evolvewp_erp_developer_checklist', EvolveWPPredictiveERP()->plugin_url() . '/assets/css/developer-checklist.css', array(), EVOLVEWP_ERP_VERSION );

        // Admin styles for WordPress Seed pages only
        if ( in_array( $screen_id, evolvewp_erp_get_screen_ids() ) ) {
            wp_enqueue_style( 'evolvewp_erp_admin_styles' );
            wp_enqueue_style( 'evolvewp_erp_tooltips' );
            wp_enqueue_style( 'evolvewp_erp_developer_checklist' );
        }
    }

    /**
     * Enqueue scripts for the admin side.
     *
     * @since  1.0.0
     * @version 1.2.0
     */
    public function admin_scripts() {                   
        global $wp_query, $post;

        $screen       = get_current_screen();
        $screen_id    = $screen ? $screen->id : '';
        $package_screen_id = sanitize_title( __( 'EvolveWP PredictiveERP', 'evolvewp-predictiveerp' ) );
        $suffix       = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

        // Register scripts — true loads in footer for better page performance.
        wp_register_script( 'evolvewp_erp_tooltips', EvolveWPPredictiveERP()->plugin_url() . '/assets/js/tooltips.js', array( 'jquery' ), EVOLVEWP_ERP_VERSION, true );

        if ( in_array( $screen_id, evolvewp_erp_get_screen_ids() ) ) {
            wp_enqueue_script( 'evolvewp_erp_tooltips' );
        } 
                                   
    }
}

endif;

return new EvolveWP_ERP_Admin_Assets();
