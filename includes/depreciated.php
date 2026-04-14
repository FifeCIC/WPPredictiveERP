<?php
/**
 * EvolveWP PredictiveERP - Depreciated Functions
 *
 * Please add the WordPress core function for triggering and error if a
 * depreciated function is used. 
 * 
 * Use: _deprecated_function( 'evolvewp_erp_function_called', '2.1', 'evolvewp_erp_replacement_function' );  
 *
 * @author   Ryan Bayne
 * @category Core
 * @package  EvolveWP PredictiveERP/Core
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} 
  
/**
 * @deprecated example only
 */
function evolvewp_erp_function_called() {
    _deprecated_function( 'evolvewp_erp_function_called', '2.1', 'evolvewp_erp_replacement_function' );
    //evolvewp_erp_replacement_function();
}