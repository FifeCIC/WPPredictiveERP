<?php
/**
 * EvolveWP PredictiveERP UI Library
 *
 * @package EvolveWP PredictiveERP/Admin/Views
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

class EvolveWP_ERP_Admin_Development_UI_Library {
    
    public static function output() {
        require_once EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'templates/partials/ui-library/main-container.php';
    }
}

EvolveWP_ERP_Admin_Development_UI_Library::output();
