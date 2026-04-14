<?php
/**
 * Admin View: Custom Notices
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-predictiveerp-message">
    <a class="evolvewp-predictiveerp-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'evolvewp-predictiveerp-hide-notice', $notice ), 'evolvewp_erp_hide_notices_nonce', '_evolvewp_erp_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'evolvewp-predictiveerp' ); ?></a>
    <?php echo wp_kses_post( wpautop( $notice_html ) ); ?>
</div>
