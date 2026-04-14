<?php
/**
 * EvolveWP PredictiveERP Development - PHP Info Tab
 *
 * @package EvolveWP PredictiveERP/Admin/Views
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_ERP_Admin_Development_PHPInfo {
    public static function output() {
        ?>
        <div class="evolvewp-predictiveerp-dev-section">
            <h2><?php esc_html_e('PHP Configuration', 'evolvewp-predictiveerp'); ?></h2>
            
            <table class="widefat">
                <tbody>
                    <tr>
                        <th><?php esc_html_e('PHP Version', 'evolvewp-predictiveerp'); ?></th>
                        <td><?php echo esc_html(PHP_VERSION); ?></td>
                    </tr>
                    <tr>
                        <th><?php esc_html_e('Memory Limit', 'evolvewp-predictiveerp'); ?></th>
                        <td><?php echo esc_html(ini_get('memory_limit')); ?></td>
                    </tr>
                    <tr>
                        <th><?php esc_html_e('Max Execution Time', 'evolvewp-predictiveerp'); ?></th>
                        <td><?php echo esc_html(ini_get('max_execution_time')); ?> seconds</td>
                    </tr>
                    <tr>
                        <th><?php esc_html_e('Max Upload Size', 'evolvewp-predictiveerp'); ?></th>
                        <td><?php echo esc_html(ini_get('upload_max_filesize')); ?></td>
                    </tr>
                    <tr>
                        <th><?php esc_html_e('Max Post Size', 'evolvewp-predictiveerp'); ?></th>
                        <td><?php echo esc_html(ini_get('post_max_size')); ?></td>
                    </tr>
                    <tr>
                        <th><?php esc_html_e('Display Errors', 'evolvewp-predictiveerp'); ?></th>
                        <td><?php echo ini_get('display_errors') ? esc_html__('On', 'evolvewp-predictiveerp') : esc_html__('Off', 'evolvewp-predictiveerp'); ?></td>
                    </tr>
                </tbody>
            </table>

            <h3><?php esc_html_e('Loaded Extensions', 'evolvewp-predictiveerp'); ?></h3>
            <div style="columns: 3; column-gap: 20px;">
                <?php
                $extensions = get_loaded_extensions();
                sort($extensions);
                foreach ($extensions as $ext) {
                    echo '<div style="break-inside: avoid; padding: 2px 0;"><code>' . esc_html($ext) . '</code></div>';
                }
                ?>
            </div>
        </div>
        <?php
    }
}
