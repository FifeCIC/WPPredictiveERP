<?php
/**
 * Admin View: Notice - Update
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-predictiveerp-message evolvewp-predictiveerp-connect">
    <p><strong><?php esc_html_e( 'EvolveWP PredictiveERP Data Update', 'evolvewp-predictiveerp' ); ?></strong> &#8211; <?php esc_html_e( 'We need to update your store\'s database to the latest version.', 'evolvewp-predictiveerp' ); ?></p>
    <p class="submit"><a href="<?php echo esc_url( add_query_arg( array( 'do_update_evolvewp-predictiveerp' => 'true', '_evolvewp_erp_update_nonce' => wp_create_nonce( 'evolvewp_erp_do_update' ) ), admin_url( 'admin.php?page=evolvewp-predictiveerp-settings' ) ) ); ?>" class="evolvewp-predictiveerp-update-now button-primary"><?php esc_html_e( 'Run the updater', 'evolvewp-predictiveerp' ); ?></a></p>
</div>
<script type="text/javascript">
    jQuery( '.evolvewp-predictiveerp-update-now' ).click( 'click', function() {
        return window.confirm( '<?php echo esc_js( __( 'It is strongly recommended that you backup your database before proceeding. Are you sure you wish to run the updater now?', 'evolvewp-predictiveerp' ) ); ?>' ); // jshint ignore:line
    });
</script>
