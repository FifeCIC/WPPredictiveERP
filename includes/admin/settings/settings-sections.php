<?php
/**
 * EvolveWP PredictiveERP Sections Settings
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  EvolveWP PredictiveERP/Admin
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'EvolveWP_ERP_Settings_Sections' ) ) :

/**
 * EvolveWP_ERP_Settings_Sections.
 */
class EvolveWP_ERP_Settings_Sections extends EvolveWP_ERP_Settings_Page {

    /**
     * Constructor.
     */
    public function __construct() {

        $this->id    = 'sections';
        $this->label = __( 'Sections Example', 'evolvewp-predictiveerp' );

        add_filter( 'evolvewp_erp_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
        add_action( 'evolvewp_erp_settings_' . $this->id, array( $this, 'output' ) );
        add_action( 'evolvewp_erp_settings_save_' . $this->id, array( $this, 'save' ) );
        add_action( 'evolvewp_erp_sections_' . $this->id, array( $this, 'output_sections' ) );
    }

    /**
     * Get sections.
     *
     * @return array
     */
    public function get_sections() {

        $sections = array(
            ''              => __( 'Section A', 'evolvewp-predictiveerp' ),
            'sectionb'       => __( 'Section B', 'evolvewp-predictiveerp' ),
        );

        return apply_filters( 'evolvewp_erp_get_sections_' . $this->id, $sections );
    }

    /**
     * Output the settings.
     */
    public function output() {
        global $current_section;

        $settings = $this->get_settings( $current_section );

        EvolveWP_ERP_Admin_Settings::output_fields( $settings );
    }

    /**
     * Save settings.
     */
    public function save() {
        global $current_section;

        $settings = $this->get_settings( $current_section );
        EvolveWP_ERP_Admin_Settings::save_fields( $settings );
    }

    /**
     * Get settings array.
     *
     * @return array
     */
    public function get_settings( $current_section = '' ) {
        if ( 'sectionb' == $current_section ) {

            $settings = apply_filters( 'evolvewp_erp_sectionb_settings', array(
            
                array(
                    'title' => __( 'Title and Introduction Example', 'evolvewp-predictiveerp' ),
                    'type'     => 'title',
                    'desc'     => __( 'This is the example of an introduction which is part of the titles data.', 'evolvewp-predictiveerp' ),
                    'id'     => 'image_options'
                ),

                array(
                    'title'         => __( 'Example Checkbox', 'evolvewp-predictiveerp' ),
                    'desc'          => __( 'Example input descripton.', 'evolvewp-predictiveerp' ),
                    'id'            => 'evolvewp_erp_enable_examplecheckbox2',
                    'default'       => 'yes',
                    'desc_tip'      => __( 'This is an example of a tip.', 'evolvewp-predictiveerp' ),
                    'type'          => 'checkbox'
                ),

                array(
                    'type'     => 'sectionend',
                    'id'     => 'image_options'
                )

            ));
        } else {
            $settings = apply_filters( 'evolvewp_erp_checkboxesexamples_general_settings', array(
 
                array(
                    'title' => __( 'Checkboxes Examples', 'evolvewp-predictiveerp' ),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'     => 'checkboxes_example_options',
                ),

                array(
                    'title'           => __( 'Checkbox Group', 'evolvewp-predictiveerp' ),
                    'desc'            => __( 'Checkbox group with start and end parameters in use.', 'evolvewp-predictiveerp' ),
                    'id'              => 'evolvewp_erp_checkbox_example_start',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'start',
                    'show_if_checked' => 'option',
                ),

                array(
                    'desc'            => __( 'Middle Checkbox', 'evolvewp-predictiveerp' ),
                    'id'              => 'evolvewp_erp_checkbox_example_middle',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => false,
                ),

                array(
                    'desc'            => __( 'End Checkbox"', 'evolvewp-predictiveerp' ),
                    'id'              => 'evolvewp_erp_checkbox_example_end',
                    'default'         => 'no',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'end',
                    'show_if_checked' => 'yes',
                    'autoload'        => false,
                ),

                array(
                    'type'     => 'sectionend',
                    'id'     => 'checkboxes_example_options'
                ),

            ));
        }

        return apply_filters( 'evolvewp_erp_get_settings_' . $this->id, $settings, $current_section );
    }
}

endif;

return new EvolveWP_ERP_Settings_Sections();
