<?php
/**
 * Admin View: Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
        
<div class="wrap evolvewp-predictiveerp">
    <h1>
        <?php esc_html_e( 'EvolveWP PredictiveERP Settings', 'evolvewp-predictiveerp' ); ?>
    </h1>
    <form method="<?php echo esc_attr( apply_filters( 'evolvewp_erp_settings_form_method_tab_' . $current_tab, 'post' ) ); ?>" id="mainform" action="" enctype="multipart/form-data">
        <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
            <?php
                foreach ( $tabs as $name => $label ) {
                    echo '<a href="' . esc_url( admin_url( 'options-general.php?page=evolvewp-predictiveerp-settings&tab=' . $name ) ) . '" class="nav-tab ' . ( $current_tab == $name ? 'nav-tab-active' : '' ) . '">' . esc_html( $label ) . '</a>';
                }
                do_action( 'evolvewp_erp_settings_tabs' );
            ?>
        </nav>
        <h1 class="screen-reader-text"><?php echo esc_html( $tabs[ $current_tab ] ); ?></h1>
        <?php
            do_action( 'evolvewp_erp_sections_' . $current_tab );

            self::show_messages();

            do_action( 'evolvewp_erp_settings_' . $current_tab );
            do_action( 'evolvewp_erp_settings_tabs_' . $current_tab ); // @deprecated hook
        ?>
        <p class="submit">
            <?php if ( empty( $GLOBALS['hide_save_button'] ) ) : ?>
                <input name="save" class="button-primary evolvewp-predictiveerp-save-button" type="submit" value="<?php esc_attr_e( 'Save changes', 'evolvewp-predictiveerp' ); ?>" />
            <?php endif; ?>
            <?php wp_nonce_field( 'evolvewp-predictiveerp-settings' ); ?>
        </p>
    </form>
</div>
