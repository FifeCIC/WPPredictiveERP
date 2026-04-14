<?php
/**
 * REST API Controller Base
 *
 * @package EvolveWP PredictiveERP/API
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

abstract class EvolveWP_ERP_REST_Controller extends WP_REST_Controller {
    
    protected $namespace = 'evolvewp-predictiveerp/v1';
    
    public function register_routes() {
        // Override in child classes
    }
    
    public function get_items_permissions_check($request) {
        return current_user_can('manage_options'); // Secure by default
    }
    
    public function create_item_permissions_check($request) {
        return current_user_can('manage_options');
    }
}
