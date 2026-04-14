<?php
/**
 * EvolveWP PredictiveERP - Admin Only Functions
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  EvolveWP PredictiveERP/Admin
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get all WordPress EvolveWP PredictiveERP screen ids.
 *
 * @return array
 */
function evolvewp_erp_get_screen_ids() {
    $screen_ids = array(
        'toplevel_page_evolvewp-predictiveerp',
        'evolvewp_erp_page_evolvewp-predictiveerp-settings',
    );

    return apply_filters( 'evolvewp_erp_screen_ids', $screen_ids );
}
