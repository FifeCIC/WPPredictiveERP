<?php
/**
 * Internationalization Helper
 *
 * @package EvolveWP PredictiveERP/i18n
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_ERP_i18n {
    
    public function __construct() {
        add_action('init', array($this, 'load_plugin_textdomain'));
    }
    
    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'evolvewp-predictiveerp',
            false,
            dirname(plugin_basename(EVOLVEWP_ERP_PLUGIN_FILE)) . '/languages/'
        );
    }
    
    public static function is_rtl() {
        return is_rtl();
    }
}

return new EvolveWP_ERP_i18n();
