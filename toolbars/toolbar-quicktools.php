<?php
/**
 * Admin Toolbar - Quick Tools
 * 
 * @package EvolveWP PredictiveERP
 */

defined( 'ABSPATH' ) || die;

global $wp_admin_bar;

$wp_admin_bar->add_menu( array(
    'id'    => 'evolvewp_erp_toolbar',
    'title' => '⚡ EvolveWP PredictiveERP',
    'href'  => admin_url( 'admin.php?page=evolvewp-predictiveerp-development' ),
) );

$wp_admin_bar->add_menu( array(
    'parent' => 'evolvewp_erp_toolbar',
    'id'     => 'evolvewp_erp_development',
    'title'  => 'Development',
    'href'   => admin_url( 'admin.php?page=evolvewp-predictiveerp-development' ),
) );

$wp_admin_bar->add_menu( array(
    'parent' => 'evolvewp_erp_toolbar',
    'id'     => 'evolvewp_erp_settings',
    'title'  => 'Settings',
    'href'   => admin_url( 'admin.php?page=evolvewp-predictiveerp-settings' ),
) );

if ( function_exists( 'evolvewp_erp_is_developer_mode' ) && evolvewp_erp_is_developer_mode() ) {
    $wp_admin_bar->add_menu( array(
        'parent' => 'evolvewp_erp_toolbar',
        'id'     => 'evolvewp_erp_clear_cache',
        'title'  => 'Clear Cache',
        'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=evolvewp_erp_clear_cache' ), 'evolvewp_erp_clear_cache' ),
    ) );
}
