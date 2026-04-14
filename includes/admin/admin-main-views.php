<?php
/**
 * EvolveWP PredictiveERP Admin Main Views
 *
 * @package EvolveWP PredictiveERP/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_ERP_Admin_Main_Views {
    
    public static function output() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('EvolveWP PredictiveERP Plugin', 'evolvewp-predictiveerp'); ?></h1>
            
            <div class="evolvewp-predictiveerp-main-dashboard">
                <p><?php esc_html_e('Welcome to EvolveWP PredictiveERP - The AI-Powered WordPress EvolveWP PredictiveERP', 'evolvewp-predictiveerp'); ?></p>
                
                <div class="evolvewp-predictiveerp-quick-links" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
                    <div class="evolvewp-predictiveerp-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Development Tools', 'evolvewp-predictiveerp'); ?></h2>
                        <p><?php esc_html_e('Access 10-tab developer dashboard with assets, debugging, and architecture tools.', 'evolvewp-predictiveerp'); ?></p>
                        <a href="<?php echo esc_url(admin_url('admin.php?page=evolvewp-predictiveerp-development')); ?>" class="button button-primary"><?php esc_html_e('Open Development', 'evolvewp-predictiveerp'); ?></a>
                    </div>
                    
                    <div class="evolvewp-predictiveerp-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Settings', 'evolvewp-predictiveerp'); ?></h2>
                        <p><?php esc_html_e('Configure plugin settings, API keys, and preferences.', 'evolvewp-predictiveerp'); ?></p>
                        <a href="<?php echo esc_url(admin_url('options-general.php?page=evolvewp-predictiveerp-settings')); ?>" class="button button-primary"><?php esc_html_e('Open Settings', 'evolvewp-predictiveerp'); ?></a>
                    </div>
                    
                    <div class="evolvewp-predictiveerp-card" style="background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
                        <h2><?php esc_html_e('Documentation', 'evolvewp-predictiveerp'); ?></h2>
                        <p><?php esc_html_e('Read guides, API reference, and integration examples.', 'evolvewp-predictiveerp'); ?></p>
                        <a href="https://github.com/ryanbayne/evolvewp-predictiveerp" target="_blank" class="button"><?php esc_html_e('View Docs', 'evolvewp-predictiveerp'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
