<?php
/**
 * Admin View: Notice - Install with wizard start button.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-predictiveerp-message evolvewp-predictiveerp-connect">
    <p><strong><?php esc_html_e( 'Welcome to WordPress Seed', 'evolvewp-predictiveerp' ); ?></strong> &#8211; <?php esc_html_e( 'You&lsquo;re almost ready to begin using the plugin.', 'evolvewp-predictiveerp' ); ?></p>
    <p class="submit"><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-predictiveerp-setup' ) ); ?>" class="button-primary"><?php esc_html_e( 'Run the Setup Wizard', 'evolvewp-predictiveerp' ); ?></a> <a class="button-secondary skip" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'evolvewp-predictiveerp-hide-notice', 'install' ), 'evolvewp_erp_hide_notices_nonce', '_evolvewp_erp_notice_nonce' ) ); ?>"><?php esc_html_e( 'Skip Setup', 'evolvewp-predictiveerp' ); ?></a></p>
</div>
