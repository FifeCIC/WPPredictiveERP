<?php
/**
 * Admin View: Notice - Updating
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div id="message" class="updated evolvewp-predictiveerp-message evolvewp-predictiveerp-connect">
    <p><strong><?php esc_html_e( 'EvolveWP PredictiveERP Data Update', 'evolvewp-predictiveerp' ); ?></strong> &#8211; <?php esc_html_e( 'Your database is being updated in the background.', 'evolvewp-predictiveerp' ); ?> <a href="<?php echo esc_url( add_query_arg( 'force_update_evolvewp-predictiveerp', 'true', admin_url( 'admin.php?page=evolvewp-predictiveerp-settings' ) ) ); ?>"><?php esc_html_e( 'Taking a while? Click here to run it now.', 'evolvewp-predictiveerp' ); ?></a></p>
</div>
