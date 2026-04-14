<?php
/**
 * EvolveWP PredictiveERP Admin Menu Configuration
 *
 * @package EvolveWP PredictiveERP/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register EvolveWP PredictiveERP admin menus
 */
function evolvewp_erp_register_admin_menus() {
    // Main menu
    add_menu_page(
        __('EvolveWP PredictiveERP', 'evolvewp-predictiveerp'),
        __('EvolveWP PredictiveERP', 'evolvewp-predictiveerp'),
        'manage_options',
        'evolvewp-predictiveerp',
        'evolvewp_erp_main_page',
        'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,22C12,22 11,17 11,13C11,9 13,6 17,4C17,4 16,8 16,11C16,14 17,17 17,17M7,18C7,18 6,14 8,11C10,8 13,7 13,7C13,7 12,10 11,12C10,14 10,18 10,18" /></svg>'),
        30
    );

    // Development submenu
    add_submenu_page(
        'evolvewp-predictiveerp',
        __('Development', 'evolvewp-predictiveerp'),
        __('Development', 'evolvewp-predictiveerp'),
        'manage_options',
        'evolvewp_erp_development',
        'evolvewp_erp_development_page'
    );
    
    // jQuery UI Gallery
    add_submenu_page(
        'evolvewp-predictiveerp',
        __('jQuery UI Gallery', 'evolvewp-predictiveerp'),
        __('jQuery UI Gallery', 'evolvewp-predictiveerp'),
        'manage_options',
        'evolvewp-predictiveerp-jquery-ui',
        'evolvewp_erp_jquery_ui_page'
    );
    
    // Component Library - file missing, disabled
    /*
    add_submenu_page(
        'evolvewp-predictiveerp',
        __('Component Library', 'evolvewp-predictiveerp'),
        __('Component Library', 'evolvewp-predictiveerp'),
        'manage_options',
        'evolvewp-predictiveerp-components',
        'evolvewp_erp_components_page'
    );
    */
    
    // Notifications
    add_submenu_page(
        'evolvewp-predictiveerp',
        __('Notifications', 'evolvewp-predictiveerp'),
        __('Notifications', 'evolvewp-predictiveerp'),
        'manage_options',
        'evolvewp-predictiveerp-notifications',
        'evolvewp_erp_notifications_page'
    );
    
    // License - disabled pending full development
    /*
    add_submenu_page(
        'evolvewp-predictiveerp',
        __('License', 'evolvewp-predictiveerp'),
        __('License', 'evolvewp-predictiveerp'),
        'manage_options',
        'evolvewp-predictiveerp-license',
        'evolvewp_erp_license_page'
    );
    */
    
    // Scheduled Actions (Action Scheduler)
    if (function_exists('as_enqueue_async_action')) {
        add_submenu_page(
            'evolvewp-predictiveerp',
            __('Scheduled Actions', 'evolvewp-predictiveerp'),
            __('Scheduled Actions', 'evolvewp-predictiveerp'),
            'manage_options',
            'evolvewp-predictiveerp-scheduled-actions',
            'evolvewp_erp_scheduled_actions_page'
        );
    }
}
add_action('admin_menu', 'evolvewp_erp_register_admin_menus');

/**
 * Main page callback
 */
function evolvewp_erp_main_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('EvolveWP PredictiveERP', 'evolvewp-predictiveerp'); ?></h1>
        <p><?php esc_html_e('Welcome to EvolveWP PredictiveERP - Your WordPress EvolveWP PredictiveERP', 'evolvewp-predictiveerp'); ?></p>
        <div class="card">
            <h2><?php esc_html_e('Getting Started', 'evolvewp-predictiveerp'); ?></h2>
            <p><?php esc_html_e('This is a boilerplate plugin with developer tools and examples.', 'evolvewp-predictiveerp'); ?></p>
            <ul>
                <li><?php esc_html_e('Visit the Development page to access debugging tools', 'evolvewp-predictiveerp'); ?></li>
                <li><?php esc_html_e('Check the code examples in the plugin directory', 'evolvewp-predictiveerp'); ?></li>
                <li><?php esc_html_e('Customize this plugin to build your own WordPress solution', 'evolvewp-predictiveerp'); ?></li>
            </ul>
        </div>
    </div>
    <?php
}

/**
 * Development page callback
 */
function evolvewp_erp_development_page() {
    if (!class_exists('EvolveWP_ERP_Admin_Development_Page')) {
        require_once EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'admin/page/development/development-tabs.php';
    }
    EvolveWP_ERP_Admin_Development_Page::output();
}

/**
 * jQuery UI Gallery page callback
 */
function evolvewp_erp_jquery_ui_page() {
    require_once EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'includes/admin/settings/settings-jquery-ui.php';
    evolvewp_erp_render_jquery_ui_gallery();
}

/**
 * Enqueue jQuery UI styles for gallery page
 */
function evolvewp_erp_jquery_ui_enqueue_assets($hook) {
    if ($hook !== 'evolvewp_erp_page_evolvewp-predictiveerp-jquery-ui') {
        return;
    }
    
    // Enqueue jQuery UI scripts
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-progressbar');
    wp_enqueue_script('jquery-ui-autocomplete');
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('jquery-ui-spinner');
    
    // Enqueue WordPress jQuery UI styles
    wp_enqueue_style('wp-jquery-ui-dialog');
}
add_action('admin_enqueue_scripts', 'evolvewp_erp_jquery_ui_enqueue_assets');

/**
 * Component Library page callback - disabled (file missing)
 */
/*
function evolvewp_erp_components_page() {
    require_once EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'admin/page/component-library/component-library.php';
    evolvewp_erp_render_component_library();
}
*/

/**
 * Notifications page callback
 */
function evolvewp_erp_notifications_page() {
    require_once EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'admin/page/notification-center.php';
}

/**
 * License page callback - disabled pending full development
 */
/*
function evolvewp_erp_license_page() {
    require_once EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'admin/page/license-management.php';
}
*/

/**
 * Scheduled Actions page callback
 */
function evolvewp_erp_scheduled_actions_page() {
    if (!class_exists('ActionScheduler_AdminView')) {
        wp_die(esc_html__('Action Scheduler is not available.', 'evolvewp-predictiveerp'));
    }
    
    $admin_view = ActionScheduler_AdminView::instance();
    $admin_view->render_admin_ui();
}
