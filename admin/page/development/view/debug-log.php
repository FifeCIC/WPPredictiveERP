<?php
/**
 * EvolveWP PredictiveERP Development - Debug Log Tab
 *
 * @package EvolveWP PredictiveERP/Admin/Views
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_ERP_Admin_Development_Debug_Log {
    public static function output() {
        $debug_file = WP_CONTENT_DIR . '/debug.log';
        $log_exists = file_exists($debug_file);
        ?>
        <div class="evolvewp-predictiveerp-dev-section">
            <h2><?php esc_html_e('WordPress Debug Log', 'evolvewp-predictiveerp'); ?></h2>
            
            <?php if (!$log_exists): ?>
                <div class="notice notice-info">
                    <p><?php esc_html_e('Debug log file does not exist. Enable WP_DEBUG_LOG in wp-config.php to create it.', 'evolvewp-predictiveerp'); ?></p>
                </div>
            <?php else: ?>
                <p>
                    <strong><?php esc_html_e('Log File:', 'evolvewp-predictiveerp'); ?></strong> 
                    <code><?php echo esc_html($debug_file); ?></code>
                </p>
                <p>
                    <strong><?php esc_html_e('File Size:', 'evolvewp-predictiveerp'); ?></strong> 
                        <?php echo esc_html(size_format(filesize($debug_file))); ?>
                </p>
                
                <div style="margin: 20px 0;">
                    <a href="<?php echo esc_url(wp_nonce_url(add_query_arg('evolvewp_erp_clear_log', '1'), 'evolvewp_erp_clear_log_action')); ?>" 
                       class="button button-secondary"
                       onclick="return confirm('<?php esc_attr_e('Are you sure you want to clear the debug log?', 'evolvewp-predictiveerp'); ?>');">
                        <?php esc_html_e('Clear Log', 'evolvewp-predictiveerp'); ?>
                    </a>
                </div>

                <?php
                if (isset($_GET['evolvewp_erp_clear_log']) && check_admin_referer('evolvewp_erp_clear_log_action')) {
                    file_put_contents($debug_file, '');
                    echo '<div class="notice notice-success"><p>' . esc_html__('Debug log cleared.', 'evolvewp-predictiveerp') . '</p></div>';
                }
                
                $log_content = file_get_contents($debug_file);
                $lines = explode("\n", $log_content);
                $last_lines = array_slice($lines, -100);
                ?>
                
                <h3><?php esc_html_e('Last 100 Lines', 'evolvewp-predictiveerp'); ?></h3>
                <textarea readonly style="width: 100%; height: 400px; font-family: monospace; font-size: 12px;"><?php 
                    echo esc_textarea(implode("\n", $last_lines)); 
                ?></textarea>
            <?php endif; ?>
        </div>
        <?php
    }
}
