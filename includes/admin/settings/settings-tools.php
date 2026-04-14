<?php
/**
 * EvolveWP PredictiveERP Tools Settings Page
 *
 * @package EvolveWP PredictiveERP/Admin/Settings
 * @version 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_ERP_Settings_Tools' ) ) :

/**
 * EvolveWP_ERP_Settings_Tools
 */
class EvolveWP_ERP_Settings_Tools extends EvolveWP_ERP_Settings_Page {

    /**
     * Constructor
     */
    public function __construct() {
        $this->id    = 'tools';
        $this->label = __( 'Tools', 'evolvewp-predictiveerp' );

        parent::__construct();
    }

    /**
     * Get settings array
     */
    public function get_settings() {
        $settings = array(

            array(
                'title' => __( 'Plugin Tools', 'evolvewp-predictiveerp' ),
                'type'  => 'title',
                'desc'  => __( 'Utilities for managing your plugin settings and data.', 'evolvewp-predictiveerp' ),
                'id'    => 'tools_section'
            ),

            array(
                'type' => 'sectionend',
                'id'   => 'tools_section'
            ),

        );

        return apply_filters( 'evolvewp_erp_tools_settings', $settings );
    }

    /**
     * Output the settings
     */
    public function output() {
        $settings = $this->get_settings();
        EvolveWP_ERP_Admin_Settings::output_fields( $settings );
        
        // Output import/export UI
        do_action( 'evolvewp_erp_settings_export_import' );
    }

    /**
     * Save settings
     */
    public function save() {
        // Import/export handles its own saving
    }
}

endif;

return new EvolveWP_ERP_Settings_Tools();
