<?php
/**
 * PHPUnit Bootstrap
 *
 * This file is a PHPUnit entry point and runs entirely outside of WordPress.
 * ABSPATH is never defined in this context, so the standard direct-access
 * guard is intentionally omitted — adding it would prevent the test suite
 * from loading.
 *
 * @package EvolveWP PredictiveERP/Tests
 * @version 1.2.0
 */

// Prefixed with evolvewp_erp_ to satisfy WordPress global variable naming standards.
$evolvewp_erp_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $evolvewp_erp_tests_dir ) {
    $evolvewp_erp_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $evolvewp_erp_tests_dir . '/includes/functions.php' ) ) {
    // Write to STDERR so PHPUnit surfaces the message — error_log() is not
    // appropriate here as this file runs outside WordPress in a CLI context.
    fwrite( STDERR, "Could not find {$evolvewp_erp_tests_dir}/includes/functions.php" . PHP_EOL );
    exit( 1 );
}

require_once $evolvewp_erp_tests_dir . '/includes/functions.php';

function evolvewp_erp_manually_load_plugin() {
    require dirname(dirname(__FILE__)) . '/evolvewp-predictiveerp.php';
}

tests_add_filter('muplugins_loaded', 'evolvewp_erp_manually_load_plugin');

require $evolvewp_erp_tests_dir . '/includes/bootstrap.php';
