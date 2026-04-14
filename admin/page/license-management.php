<?php
/**
 * EvolveWP PredictiveERP License Management Page
 * 
 * @package EvolveWP PredictiveERP/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

// Handle form submissions
if (isset($_POST['evolvewp_erp_activate_license']) && check_admin_referer('evolvewp_erp_license_action')) {
    $evolvewp_erp_license_key = isset($_POST['license_key']) ? sanitize_text_field(wp_unslash($_POST['license_key'])) : '';
    $evolvewp_erp_client = new EvolveWP_ERP_License_Client();
    $evolvewp_erp_result = $evolvewp_erp_client->activate_license($evolvewp_erp_license_key);
    
    if (is_wp_error($evolvewp_erp_result)) {
        echo '<div class="notice notice-error"><p>' . esc_html($evolvewp_erp_result->get_error_message()) . '</p></div>';
    } else {
        echo '<div class="notice notice-success"><p>License activated successfully!</p></div>';
    }
}

if (isset($_POST['evolvewp_erp_deactivate_license']) && check_admin_referer('evolvewp_erp_license_action')) {
    $evolvewp_erp_client = new EvolveWP_ERP_License_Client();
    $evolvewp_erp_result = $evolvewp_erp_client->deactivate_license();
    
    if (is_wp_error($evolvewp_erp_result)) {
        echo '<div class="notice notice-error"><p>' . esc_html($evolvewp_erp_result->get_error_message()) . '</p></div>';
    } else {
        echo '<div class="notice notice-success"><p>License deactivated successfully!</p></div>';
    }
}

$evolvewp_erp_client = new EvolveWP_ERP_License_Client();
$evolvewp_erp_license_data = $evolvewp_erp_client->get_license_data();
$evolvewp_erp_is_valid = $evolvewp_erp_client->is_license_valid();
?>

<div class="wrap">
    <h1>EvolveWP PredictiveERP License Management</h1>
    
    <div class="evolvewp-predictiveerp-license-container" style="max-width: 800px;">
        
        <?php if (empty($evolvewp_erp_license_data)): ?>
            <!-- No License -->
            <div class="card" style="padding: 20px; margin-top: 20px;">
                <h2>Activate Your License</h2>
                <p>Enter your license key to activate premium features and receive automatic updates.</p>
                
                <form method="post" action="">
                    <?php wp_nonce_field('evolvewp_erp_license_action'); ?>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">
                                <label for="license_key">License Key</label>
                            </th>
                            <td>
                                <input type="text" 
                                       id="license_key" 
                                       name="license_key" 
                                       class="regular-text" 
                                       placeholder="XXXX-XXXX-XXXX-XXXX"
                                       required>
                                <p class="description">Enter the license key you received after purchase.</p>
                            </td>
                        </tr>
                    </table>
                    
                    <p class="submit">
                        <button type="submit" name="evolvewp_erp_activate_license" class="button button-primary">
                            Activate License
                        </button>
                    </p>
                </form>
                
                <hr>
                
                <h3>Don't have a license?</h3>
                <p>
                    <a href="https://evolvewp-predictiveerp.com/pricing/" target="_blank" class="button">Purchase a License</a>
                    <a href="https://evolvewp-predictiveerp.com/my-account/" target="_blank" class="button">View My Licenses</a>
                </p>
            </div>
            
        <?php else: ?>
            <!-- License Active -->
            <div class="card" style="padding: 20px; margin-top: 20px;">
                <h2>License Information</h2>
                
                <table class="widefat fixed striped">
                    <tbody>
                        <tr>
                            <td style="width: 200px;"><strong>Status</strong></td>
                            <td>
                                <?php if ($evolvewp_erp_is_valid): ?>
                                    <span style="color: #00a32a;">
                                        <span class="dashicons dashicons-yes-alt"></span> Active
                                    </span>
                                <?php else: ?>
                                    <span style="color: #d63638;">
                                        <span class="dashicons dashicons-warning"></span> 
                                        <?php echo esc_html(ucfirst($evolvewp_erp_license_data['status'])); ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>License Key</strong></td>
                            <td>
                                <code><?php echo esc_html(evolvewp_erp_mask_license_key($evolvewp_erp_license_data['license_key'])); ?></code>
                            </td>
                        </tr>
                        <?php if (isset($evolvewp_erp_license_data['license_type'])): ?>
                        <tr>
                            <td><strong>License Type</strong></td>
                            <td><?php echo esc_html(ucwords(str_replace('_', ' ', $evolvewp_erp_license_data['license_type']))); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (isset($evolvewp_erp_license_data['expires'])): ?>
                        <tr>
                            <td><strong>Expires</strong></td>
                            <td>
                                <?php 
                                if ($evolvewp_erp_license_data['expires'] === 'lifetime') {
                                    echo 'Lifetime';
                                } else {
                                    $evolvewp_erp_expires = strtotime($evolvewp_erp_license_data['expires']);
                                    $evolvewp_erp_days_left = floor(($evolvewp_erp_expires - time()) / DAY_IN_SECONDS);
                                    echo esc_html( gmdate( 'F j, Y', $evolvewp_erp_expires ) );
                                    
                                    if ($evolvewp_erp_days_left > 0) {
                                        echo ' <span style="color: #666;">(' . esc_html($evolvewp_erp_days_left) . ' days remaining)</span>';
                                    } else {
                                        echo ' <span style="color: #d63638;">(Expired)</span>';
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php if (isset($evolvewp_erp_license_data['activated_at'])): ?>
                        <tr>
                            <td><strong>Activated</strong></td>
                            <td><?php echo esc_html( gmdate( 'F j, Y', $evolvewp_erp_license_data['activated_at'] ) ); ?></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
                <form method="post" action="" style="margin-top: 20px;">
                    <?php wp_nonce_field('evolvewp_erp_license_action'); ?>
                    <button type="submit" 
                            name="evolvewp_erp_deactivate_license" 
                            class="button" 
                            onclick="return confirm('Are you sure you want to deactivate this license?');">
                        Deactivate License
                    </button>
                    <a href="https://evolvewp-predictiveerp.com/my-account/" target="_blank" class="button">Manage Licenses</a>
                </form>
            </div>
            
            <?php if ($evolvewp_erp_is_valid): ?>
            <!-- Premium Features -->
            <div class="card" style="padding: 20px; margin-top: 20px;">
                <h2>Premium Features</h2>
                <p>Your license includes access to the following premium features:</p>
                
                <ul style="list-style: disc; margin-left: 20px;">
                    <li>Automatic plugin updates</li>
                    <li>Priority support</li>
                    <li>Premium extensions</li>
                    <li>Advanced developer tools</li>
                    <li>Commercial use license</li>
                </ul>
            </div>
            <?php endif; ?>
            
        <?php endif; ?>
        
        <!-- Help Section -->
        <div class="card" style="padding: 20px; margin-top: 20px; background: #f0f6fc; border-left: 4px solid #0073aa;">
            <h3 style="margin-top: 0;">Need Help?</h3>
            <ul style="margin-bottom: 0;">
                <li><a href="https://evolvewp-predictiveerp.com/docs/licensing/" target="_blank">Licensing Documentation</a></li>
                <li><a href="https://evolvewp-predictiveerp.com/support/" target="_blank">Contact Support</a></li>
                <li><a href="https://evolvewp-predictiveerp.com/faq/" target="_blank">Frequently Asked Questions</a></li>
            </ul>
        </div>
        
    </div>
</div>

<?php
// Helper function to mask license key
function evolvewp_erp_mask_license_key($key) {
    $parts = explode('-', $key);
    if (count($parts) === 4) {
        return $parts[0] . '-****-****-' . $parts[3];
    }
    return substr($key, 0, 4) . str_repeat('*', strlen($key) - 8) . substr($key, -4);
}
?>
