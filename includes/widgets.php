<?php
/**
 * EvolveWP PredictiveERP - Primary Sidebar Widgets File
 *
 * @author   Ryan Bayne
 * @category Widgets
 * @package  EvolveWP PredictiveERP/Widgets
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include widget classes.
//include_once( 'abstracts/abstract-evolvewp-predictiveerp-widget.php' );

/**
 * Register Widgets.
 */
function evolvewp_erp_register_widgets() {
    //register_widget( 'EvolveWP_ERP_Widget_Example' );
}
add_action( 'widgets_init', 'evolvewp_erp_register_widgets' );