<?php
/**
 * Request Listener
 * 
 * Centralized form processing with security
 * 
 * @package EvolveWP PredictiveERP
 */

defined( 'ABSPATH' ) || die;

class EvolveWP_ERP_Listener {
    
    public function __construct() {
        add_action( 'wp_loaded', array( $this, 'process_requests' ) );
        add_action( 'admin_notices', array( $this, 'display_notices' ) );
    }
    
    public function process_requests() {
        if ( defined( 'DOING_AUTOSAVE' ) || defined( 'DOING_CRON' ) || defined( 'DOING_AJAX' ) ) {
            return;
        }
        
        if ( empty( $_SERVER['REQUEST_METHOD'] ) || 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
            return;
        }

        $this->process_post_requests();
    }
    
    private function process_post_requests() {
        if ( ! isset( $_POST['evolvewp_erp_form_action'] ) ) {
            return;
        }
        
        if ( ! function_exists( 'is_user_logged_in' ) || ! is_user_logged_in() ) {
            return;
        }
        
        $action = sanitize_key( $_POST['evolvewp_erp_form_action'] );
        
        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), $action ) ) {
            wp_die( esc_html__( 'Security check failed', 'evolvewp-predictiveerp' ) );
        }
        
        do_action( 'evolvewp_erp_process_form_' . $action );
    }
    
    public function display_notices() {
        $notice = get_transient( 'evolvewp_erp_admin_notice' );
        
        if ( $notice ) {
            echo '<div class="notice notice-' . esc_attr( $notice['type'] ) . ' is-dismissible"><p>' . 
                 wp_kses_post( $notice['message'] ) . '</p></div>';
            delete_transient( 'evolvewp_erp_admin_notice' );
        }
    }
}

// Initialize only after WordPress is loaded
add_action('init', function() {
    new EvolveWP_ERP_Listener();
});
