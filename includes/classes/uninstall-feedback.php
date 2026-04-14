<?php
/**
 * Uninstall Feedback System
 * Shows modal on plugin deactivation to collect user feedback
 *
 * @package EvolveWP PredictiveERP/Admin
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class EvolveWP_ERP_Uninstall_Feedback {
    
    public function __construct() {
        add_action('admin_footer', array($this, 'render_modal'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('wp_ajax_evolvewp_erp_uninstall_feedback', array($this, 'handle_feedback'));
    }
    
    public function enqueue_assets($hook) {
        if ($hook !== 'plugins.php') {
            return;
        }
        
        wp_enqueue_style('evolvewp-predictiveerp-uninstall-feedback', plugins_url('assets/css/uninstall-feedback.css', EVOLVEWP_ERP_PLUGIN_FILE), array(), EVOLVEWP_ERP_VERSION);
        wp_enqueue_script('evolvewp-predictiveerp-uninstall-feedback', plugins_url('assets/js/uninstall-feedback.js', EVOLVEWP_ERP_PLUGIN_FILE), array('jquery'), EVOLVEWP_ERP_VERSION, true);
        
        wp_localize_script('evolvewp-predictiveerp-uninstall-feedback', 'evolvewp-predictiveerpUninstall', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('evolvewp_erp_uninstall_feedback'),
            'plugin_slug' => EVOLVEWP_ERP_PLUGIN_BASENAME,
        ));
    }
    
    public function render_modal() {
        $screen = get_current_screen();
        if ($screen->id !== 'plugins') {
            return;
        }
        ?>
        <div id="evolvewp-predictiveerp-uninstall-feedback-modal" style="display:none;">
            <div class="evolvewp-predictiveerp-modal-overlay"></div>
            <div class="evolvewp-predictiveerp-modal-content">
                <div class="evolvewp-predictiveerp-modal-header">
                    <h2><?php esc_html_e('Quick Feedback', 'evolvewp-predictiveerp'); ?></h2>
                    <button class="evolvewp-predictiveerp-modal-close">&times;</button>
                </div>
                
                <div class="evolvewp-predictiveerp-modal-body">
                    <p><?php esc_html_e('If you have a moment, please let us know why you\'re deactivating EvolveWP PredictiveERP:', 'evolvewp-predictiveerp'); ?></p>
                    
                    <form id="evolvewp-predictiveerp-feedback-form">
                        <label class="evolvewp-predictiveerp-reason">
                            <input type="radio" name="reason" value="temporary">
                            <span><?php esc_html_e('Temporary deactivation', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        
                        <label class="evolvewp-predictiveerp-reason">
                            <input type="radio" name="reason" value="missing_features">
                            <span><?php esc_html_e('Missing features I need', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        
                        <label class="evolvewp-predictiveerp-reason">
                            <input type="radio" name="reason" value="found_better">
                            <span><?php esc_html_e('Found a better plugin', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        
                        <label class="evolvewp-predictiveerp-reason">
                            <input type="radio" name="reason" value="not_working">
                            <span><?php esc_html_e('Plugin not working', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        
                        <label class="evolvewp-predictiveerp-reason">
                            <input type="radio" name="reason" value="too_complex">
                            <span><?php esc_html_e('Too complex to use', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        
                        <label class="evolvewp-predictiveerp-reason">
                            <input type="radio" name="reason" value="other">
                            <span><?php esc_html_e('Other', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        
                        <div class="evolvewp-predictiveerp-details" style="display:none;">
                            <textarea name="details" placeholder="<?php esc_attr_e('Please tell us more...', 'evolvewp-predictiveerp'); ?>" rows="4"></textarea>
                        </div>
                        
                        <div class="evolvewp-predictiveerp-email">
                            <input type="email" name="email" placeholder="<?php esc_attr_e('Your email (optional)', 'evolvewp-predictiveerp'); ?>">
                            <small><?php esc_html_e('We may follow up to help resolve issues', 'evolvewp-predictiveerp'); ?></small>
                        </div>
                    </form>
                </div>
                
                <div class="evolvewp-predictiveerp-modal-footer">
                    <button class="button button-secondary evolvewp-predictiveerp-skip"><?php esc_html_e('Skip & Deactivate', 'evolvewp-predictiveerp'); ?></button>
                    <button class="button button-primary evolvewp-predictiveerp-submit"><?php esc_html_e('Submit & Deactivate', 'evolvewp-predictiveerp'); ?></button>
                </div>
            </div>
        </div>
        <?php
    }
    
    public function handle_feedback() {
        check_ajax_referer('evolvewp_erp_uninstall_feedback', 'nonce');
        
        $reason = sanitize_text_field(wp_unslash($_POST['reason'] ?? ''));
        $details = sanitize_textarea_field(wp_unslash($_POST['details'] ?? ''));
        $email = sanitize_email(wp_unslash($_POST['email'] ?? ''));
        
        // Log feedback
        $feedback = array(
            'reason' => $reason,
            'details' => $details,
            'email' => $email,
            'date' => current_time('mysql'),
            'site_url' => get_site_url(),
            'wp_version' => get_bloginfo('version'),
            'php_version' => PHP_VERSION,
        );
        
        // Save to options (last 50 feedbacks)
        $feedbacks = get_option('evolvewp_erp_uninstall_feedbacks', array());
        array_unshift($feedbacks, $feedback);
        $feedbacks = array_slice($feedbacks, 0, 50);
        update_option('evolvewp_erp_uninstall_feedbacks', $feedbacks);
        
        // Send email to admin
        $admin_email = get_option('admin_email');
        /* translators: %s: Site name */
        $subject = sprintf(__('[%s] Plugin Deactivation Feedback', 'evolvewp-predictiveerp'), get_bloginfo('name'));
        /* translators: 1: Reason, 2: Details, 3: Email, 4: Site URL, 5: WP Version, 6: PHP Version */
        $message = sprintf(
            __("Reason: %1\$s\n\nDetails: %2\$s\n\nEmail: %3\$s\n\nSite: %4\$s\nWP Version: %5\$s\nPHP Version: %6\$s", 'evolvewp-predictiveerp'),
            $reason,
            $details,
            $email,
            get_site_url(),
            get_bloginfo('version'),
            PHP_VERSION
        );
        
        wp_mail($admin_email, $subject, $message);
        
        // Optional: Send to external API
        // wp_remote_post('https://your-api.com/feedback', array('body' => $feedback));
        
        wp_send_json_success();
    }
}

return new EvolveWP_ERP_Uninstall_Feedback();
