<?php
/**
 * Admin View: Notice - Updated
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-predictiveerp-message evolvewp-predictiveerp-connect">
    <a class="evolvewp-predictiveerp-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'evolvewp-predictiveerp-hide-notice', 'update', remove_query_arg( 'do_update_evolvewp-predictiveerp' ) ), 'evolvewp_erp_hide_notices_nonce', '_evolvewp_erp_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'evolvewp-predictiveerp' ); ?></a>

    <p><?php esc_html_e( 'EvolveWP PredictiveERP data update complete. Thank you for updating to the latest version!', 'evolvewp-predictiveerp' ); ?></p>
</div>
