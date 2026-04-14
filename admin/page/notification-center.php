<?php
/**
 * EvolveWP PredictiveERP Notification Center
 *
 * @package EvolveWP PredictiveERP/Admin
 * @version 1.2.0
 */

if (!defined('ABSPATH')) exit;

// Enqueue assets
wp_enqueue_style('evolvewp-predictiveerp-notification-center', EvolveWP PredictiveERP()->plugin_url() . '/assets/css/notification-center.css', array(), EVOLVEWP_ERP_VERSION);
wp_enqueue_script('evolvewp-predictiveerp-notification-center', EvolveWP PredictiveERP()->plugin_url() . '/assets/js/notification-center.js', array('jquery'), EVOLVEWP_ERP_VERSION, true);

// Handle actions
if (isset($_POST['notification_action'])) {
    check_admin_referer('evolvewp_erp_notification_action');
    
    $action = sanitize_text_field(wp_unslash($_POST['notification_action']));
    $evolvewp_erp_notification_id = isset($_POST['notification_id']) ? intval($_POST['notification_id']) : 0;
    
    switch ($action) {
        case 'mark_read':
            EvolveWP_ERP_Notifications::mark_as_read($evolvewp_erp_notification_id);
            break;
        case 'snooze':
                $evolvewp_erp_duration = isset($_POST['snooze_duration']) ? intval($_POST['snooze_duration']) : 3600;
                EvolveWP_ERP_Notifications::snooze_notification($evolvewp_erp_notification_id, $evolvewp_erp_duration);
            break;
        case 'delete':
            EvolveWP_ERP_Notifications::delete_notification($evolvewp_erp_notification_id);
            break;
        case 'mark_all_read':
            EvolveWP_ERP_Notifications::mark_all_read(get_current_user_id());
            break;
    }
    
    wp_safe_redirect(admin_url('admin.php?page=evolvewp-predictiveerp-notifications'));
    exit;
}

$evolvewp_erp_user_id = get_current_user_id();
$filter = isset($_GET['filter']) ? sanitize_text_field(wp_unslash($_GET['filter'])) : 'all';

$evolvewp_erp_args = array('limit' => 50);
if ($filter === 'unread') {
    $evolvewp_erp_args['is_read'] = 0;
}

$notifications = EvolveWP_ERP_Notifications::get_notifications($evolvewp_erp_user_id, $evolvewp_erp_args);
$evolvewp_erp_unread_count = EvolveWP_ERP_Notifications::get_unread_count($evolvewp_erp_user_id);
?>

<div class="wrap evolvewp-predictiveerp-notification-center">
    <h1><?php esc_html_e('Notification Center', 'evolvewp-predictiveerp'); ?></h1>
    
    <div class="notification-header" style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
        <div class="notification-filters">
            <a href="<?php echo esc_url( admin_url('admin.php?page=evolvewp-predictiveerp-notifications') ); ?>" 
               class="button <?php echo $filter === 'all' ? 'button-primary' : ''; ?>">
                <?php esc_html_e('All', 'evolvewp-predictiveerp'); ?> (<?php echo absint( count($notifications) ); ?>)
            </a>
            <a href="<?php echo esc_url( admin_url('admin.php?page=evolvewp-predictiveerp-notifications&filter=unread') ); ?>" 
               class="button <?php echo $filter === 'unread' ? 'button-primary' : ''; ?>">
                <?php esc_html_e('Unread', 'evolvewp-predictiveerp'); ?> (<?php echo absint( $evolvewp_erp_unread_count ); ?>)
            </a>
        </div>
        
        <?php if ($evolvewp_erp_unread_count > 0): ?>
        <form method="post" style="display: inline;">
            <?php wp_nonce_field('evolvewp_erp_notification_action'); ?>
            <input type="hidden" name="notification_action" value="mark_all_read">
            <button type="submit" class="button">
                <?php esc_html_e('Mark All Read', 'evolvewp-predictiveerp'); ?>
            </button>
        </form>
        <?php endif; ?>
    </div>
    
    <?php if (empty($notifications)): ?>
        <div class="notice notice-info">
            <p><?php esc_html_e('No notifications found.', 'evolvewp-predictiveerp'); ?></p>
        </div>
    <?php else: ?>
        <div class="notifications-list">
            <?php foreach ($notifications as $notification): ?>
                <div class="notification-item <?php echo $notification->is_read ? 'read' : 'unread'; ?> <?php echo $notification->priority === 'high' ? 'priority-high' : ''; ?>">
                    
                    <div style="display: flex; justify-content: space-between; align-items: start;">
                        <div style="flex: 1;">
                            <div class="notification-meta">
                                <?php if (!$notification->is_read): ?>
                                    <span class="unread-dot"></span>
                                <?php endif; ?>
                                
                                <span class="notification-type">
                                    <?php echo esc_html(strtoupper($notification->type)); ?>
                                </span>
                                
                                <?php if ($notification->priority === 'high'): ?>
                                    <span class="priority-high-label">⚠ <?php esc_html_e('High Priority', 'evolvewp-predictiveerp'); ?></span>
                                <?php endif; ?>
                                
                                <span class="notification-time">
                                    <?php echo esc_html( human_time_diff(strtotime($notification->created_at), current_time('timestamp')) ); ?> <?php esc_html_e('ago', 'evolvewp-predictiveerp'); ?>
                                </span>
                            </div>
                            
                            <div class="notification-message">
                                <?php echo esc_html($notification->message); ?>
                            </div>
                            
                            <div class="notification-actions">
                                <?php if (!$notification->is_read): ?>
                                    <form method="post" style="display: inline;">
                                        <?php wp_nonce_field('evolvewp_erp_notification_action'); ?>
                                        <input type="hidden" name="notification_action" value="mark_read">
                                        <input type="hidden" name="notification_id" value="<?php echo absint( $notification->id ); ?>">
                                        <button type="submit" class="button button-small">
                                            <?php esc_html_e('Mark Read', 'evolvewp-predictiveerp'); ?>
                                        </button>
                                    </form>
                                <?php endif; ?>
                                
                                <?php if ($notification->action_url): ?>
                                    <a href="<?php echo esc_url($notification->action_url); ?>" class="button button-small button-primary">
                                        <?php echo esc_html($notification->action_label ?: __('View', 'evolvewp-predictiveerp')); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <button type="button" class="button button-small snooze-btn" data-id="<?php echo absint( $notification->id ); ?>">
                                    <?php esc_html_e('Snooze', 'evolvewp-predictiveerp'); ?>
                                </button>
                                
                                <form method="post" style="display: inline;">
                                    <?php wp_nonce_field('evolvewp_erp_notification_action'); ?>
                                    <input type="hidden" name="notification_action" value="delete">
                                    <input type="hidden" name="notification_id" value="<?php echo absint( $notification->id ); ?>">
                                    <button type="submit" class="button button-small button-link-delete">
                                        <?php esc_html_e('Delete', 'evolvewp-predictiveerp'); ?>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Snooze options (hidden by default) -->
                            <div class="snooze-options" id="snooze-<?php echo absint( $notification->id ); ?>">
                                <form method="post">
                                    <?php wp_nonce_field('evolvewp_erp_notification_action'); ?>
                                    <input type="hidden" name="notification_action" value="snooze">
                                    <input type="hidden" name="notification_id" value="<?php echo absint( $notification->id ); ?>">
                                    <label><?php esc_html_e('Snooze for:', 'evolvewp-predictiveerp'); ?></label>
                                    <select name="snooze_duration">
                                        <option value="3600"><?php esc_html_e('1 hour', 'evolvewp-predictiveerp'); ?></option>
                                        <option value="21600"><?php esc_html_e('6 hours', 'evolvewp-predictiveerp'); ?></option>
                                        <option value="86400"><?php esc_html_e('1 day', 'evolvewp-predictiveerp'); ?></option>
                                        <option value="604800"><?php esc_html_e('1 week', 'evolvewp-predictiveerp'); ?></option>
                                    </select>
                                    <button type="submit" class="button button-small"><?php esc_html_e('Apply', 'evolvewp-predictiveerp'); ?></button>
                                    <button type="button" class="button button-small cancel-snooze"><?php esc_html_e('Cancel', 'evolvewp-predictiveerp'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
