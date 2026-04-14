<?php                 
/**
 * EvolveWP PredictiveERP - WP Admin Dashboard
 *
 * Custom dashboard widgets and functionality goes here.  
 *
 * @author   Ryan Bayne
 * @category WordPress Dashboard
 * @package  EvolveWP PredictiveERP/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'EvolveWP_ERP_Admin_Dashboard' ) ) :

/**
 * EvolveWP_ERP_Admin_Dashboard Class.
 */
class EvolveWP_ERP_Admin_Dashboard {

    /**
     * Init dashboard widgets.
     */
    public function init() {           
        if ( function_exists('current_user_can') && current_user_can( 'activate_plugins' ) ) {
            wp_add_dashboard_widget( 'evolvewp_erp_dashboard_widget_example', __( 'Example Widget', 'evolvewp-predictiveerp' ), array( $this, 'example_widget' ) );
        }
    }
       
    /**
     * Recent reviews widget.
     */
    public function example_widget() {              
        echo '<p>' . esc_html__( 'This is an example widget only. A developer must use it or remove it.', 'evolvewp-predictiveerp' ) . '</p>';
    }

}

endif;

return new EvolveWP_ERP_Admin_Dashboard();
