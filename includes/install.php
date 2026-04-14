<?php
/**
 * EvolveWP PredictiveERP Installation Class
 *
 * @package EvolveWP PredictiveERP/Classes
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_ERP_Install {

    public function __construct() {
        register_activation_hook(EVOLVEWP_ERP_PLUGIN_FILE, array($this, 'install'));
        add_action('admin_init', array($this, 'check_version'), 5);
    }

    public function check_version() {
        if (get_option('evolvewp_erp_version') !== EVOLVEWP_ERP_VERSION) {
            $this->install();
            do_action('evolvewp_erp_updated');
        }
    }

    public function install() {
        if ('yes' === get_transient('evolvewp_erp_installing')) {
            return;
        }

        set_transient('evolvewp_erp_installing', 'yes', MINUTE_IN_SECONDS * 10);
        
        $this->create_options();
        $this->create_roles();
        $this->setup_environment();
        $this->create_cron_jobs();
        
        delete_transient('evolvewp_erp_installing');
        
        delete_option('evolvewp_erp_version');
        add_option('evolvewp_erp_version', EVOLVEWP_ERP_VERSION);
        
        flush_rewrite_rules();
        
        do_action('evolvewp_erp_installed');
    }

    private function create_options() {
        add_option('evolvewp_erp_installed', 'yes');
        add_option('evolvewp_erp_demo_mode', 'yes');
    }
    
    private function create_roles() {
        add_role(
            'evolvewp_erp_user',
            __('EvolveWP PredictiveERP User', 'evolvewp-predictiveerp'),
            array(
                'read' => true,
                'manage_evolvewp-predictiveerp' => true
            )
        );
        
        $admin = get_role('administrator');
        if ($admin) {
            $admin->add_cap('manage_evolvewp-predictiveerp');
        }
    }
    
    private function setup_environment() {
        $this->register_post_types();
        $this->register_taxonomies();
    }
    
    private function register_post_types() {
        if (!is_blog_installed() || post_type_exists('evolvewp_erp_item')) {
            return;
        }
        
        register_post_type('evolvewp_erp_item', array(
            'labels' => array(
                'name' => __('Items', 'evolvewp-predictiveerp'),
                'singular_name' => __('Item', 'evolvewp-predictiveerp'),
                'add_new' => __('Add Item', 'evolvewp-predictiveerp'),
                'edit_item' => __('Edit Item', 'evolvewp-predictiveerp'),
                'view_item' => __('View Item', 'evolvewp-predictiveerp')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'evolvewp-predictiveerp',
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'evolvewp-predictiveerp-item')
        ));
    }
    
    private function register_taxonomies() {
        if (!is_blog_installed() || taxonomy_exists('evolvewp_erp_category')) {
            return;
        }
        
        register_taxonomy('evolvewp_erp_category', array('evolvewp_erp_item'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Categories', 'evolvewp-predictiveerp'),
                'singular_name' => __('Category', 'evolvewp-predictiveerp')
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'evolvewp-predictiveerp-category')
        ));
    }
    
    private function create_cron_jobs() {
        // Example: Daily cleanup job (commented out by default)
        // if (!wp_next_scheduled('evolvewp_erp_daily_cleanup')) {
        //     wp_schedule_event(time(), 'daily', 'evolvewp_erp_daily_cleanup');
        // }
    }
}

new EvolveWP_ERP_Install();
