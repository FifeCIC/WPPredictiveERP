<?php
/**
 * EvolveWP PredictiveERP Ajax Event Handler.
 *
 * @package  EvolveWP PredictiveERP/Core
 * @category Ajax
 * @author   Ryan Bayne
 * @version  2.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class EvolveWP_ERP_AJAX {

    /**
     * Hook in ajax handlers.
     *
     * @since  1.0.0
     * @return void
     */
    public static function init() {
        add_action( 'init', array( __CLASS__, 'define_ajax' ), 0 );
        add_action( 'template_redirect', array( __CLASS__, 'do_evolvewp_erp_ajax' ), 0 );
        self::add_ajax_events();
    }

    /**
     * Get EvolveWP PredictiveERP Ajax Endpoint.
     * @param  string $request Optional
     * @return string
     */
    public static function get_endpoint( $request = '' ) {
        return esc_url_raw( apply_filters( 'evolvewp_erp_ajax_get_endpoint', add_query_arg( 'evolvewp-predictiveerp-ajax', $request, remove_query_arg( array( 'remove_item', 'add-to-cart', 'added-to-cart' ) ) ), $request ) );
    }

    /**
     * Set EvolveWP PredictiveERP AJAX constant and headers.
     *
     * Runs at init priority 0 — before nonce infrastructure is reliable — so
     * this method only detects whether a EvolveWP PredictiveERP AJAX request is in progress.
     * The $_GET['evolvewp-predictiveerp-ajax'] value is extracted into a sanitised local
     * variable immediately so the sniff can confirm it is not used raw.
     * Actual nonce verification happens in do_evolvewp_erp_ajax() where WordPress
     * is fully bootstrapped.
     *
     * @since   1.0.0
     * @version 2.0.0
     * @return  void
     */
    public static function define_ajax() {
        // Extract and sanitise immediately — value is only used for emptiness
        // detection here; do_evolvewp_erp_ajax() re-reads and verifies with a nonce.
        $evolvewp_erp_ajax_action = isset( $_GET['evolvewp-predictiveerp-ajax'] )
            ? sanitize_text_field( wp_unslash( $_GET['evolvewp-predictiveerp-ajax'] ) )
            : '';

        if ( ! empty( $evolvewp_erp_ajax_action ) ) {
            if ( ! defined( 'DOING_AJAX' ) ) {
                define( 'DOING_AJAX', true );
            }
            if ( ! defined( 'EVOLVEWP_ERP_DOING_AJAX' ) ) {
                define( 'EVOLVEWP_ERP_DOING_AJAX', true );
            }
            // Suppress display_errors during AJAX to prevent malformed JSON;
            // only suppressed when not in full debug-display mode.
            if ( ! WP_DEBUG || ( WP_DEBUG && ! WP_DEBUG_DISPLAY ) ) {
                @ini_set( 'display_errors', 0 ); // phpcs:ignore WordPress.PHP.IniSet.display_errors_Disallowed
            }
            $GLOBALS['wpdb']->hide_errors();
        }
    }

    /**
     * Send headers for EvolveWP PredictiveERP Ajax Requests
     */
    private static function evolvewp_erp_ajax_headers() {
        send_origin_headers();
        @header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );
        @header( 'X-Robots-Tag: noindex' );
        send_nosniff_header();
        nocache_headers();
        status_header( 200 );
    }

    /**
     * Check for EvolveWP PredictiveERP Ajax request and fire action.
     */
    public static function do_evolvewp_erp_ajax() {
        global $wp_query;

            if ( ! empty( $_GET['evolvewp-predictiveerp-ajax'] ) ) {
                // Nonce verification for AJAX GET requests.
                // Unslash and sanitise the nonce into a local variable so PHPCS
                // recognises it as sanitised before it is passed to wp_verify_nonce().
                if ( empty( $_GET['_wpnonce'] ) ) {
                    wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'evolvewp-predictiveerp' ) );
                }
                $evolvewp_erp_ajax_nonce = sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) );
                if ( ! wp_verify_nonce( $evolvewp_erp_ajax_nonce, 'evolvewp-predictiveerp-ajax-action' ) ) {
                    wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'evolvewp-predictiveerp' ) );
                }
                // wp_unslash() applied before sanitize_text_field() per MissingUnslash standard.
                $wp_query->set( 'evolvewp-predictiveerp-ajax', sanitize_text_field( wp_unslash( $_GET['evolvewp-predictiveerp-ajax'] ) ) );
            }

        if ( $action = $wp_query->get( 'evolvewp-predictiveerp-ajax' ) ) {
            self::evolvewp_erp_ajax_headers();
            do_action( 'evolvewp_erp_ajax_' . sanitize_text_field( $action ) );
            die();
        }
    }

    /**
     * Hook in methods - uses WordPress ajax handlers (admin-ajax).
     */
    public static function add_ajax_events() {
        // evolvewp_erp_EVENT => nopriv
        $ajax_events = array();

        foreach ( $ajax_events as $ajax_event => $nopriv ) {
            add_action( 'wp_ajax_evolvewp_erp_' . $ajax_event, array( __CLASS__, $ajax_event ) );

            if ( $nopriv ) {
                add_action( 'wp_ajax_nopriv_evolvewp_erp_' . $ajax_event, array( __CLASS__, $ajax_event ) );

                // EvolveWP PredictiveERP AJAX can be used for frontend ajax requests
                add_action( 'evolvewp_erp_ajax_' . $ajax_event, array( __CLASS__, $ajax_event ) );
            }
        }
    }
}

EvolveWP_ERP_AJAX::init();
