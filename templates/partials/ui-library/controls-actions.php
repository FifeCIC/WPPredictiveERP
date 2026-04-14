<?php
/**
 * UI Library Controls and Actions Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.6
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Controls & Actions', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('UI controls for user interactions, filtering, and action buttons.', 'evolvewp-predictiveerp'); ?></p>
    
    <div class="controls-showcase">
        <!-- Action Buttons Group -->
        <div class="component-demo">
            <h4><?php esc_html_e('Action Button Groups', 'evolvewp-predictiveerp'); ?></h4>
            <div class="control-panel">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('Symbol Actions', 'evolvewp-predictiveerp'); ?></h5>
                </div>
                <div class="control-panel-body">
                    <div class="control-group">
                        <button class="evolvewp-predictiveerp-control-button evolvewp-predictiveerp-control-primary">
                            <span class="control-icon dashicons dashicons-chart-line"></span>
                            <span class="control-text"><?php esc_html_e('Analyze', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                        <button class="evolvewp-predictiveerp-control-button">
                            <span class="control-icon dashicons dashicons-portfolio"></span>
                            <span class="control-text"><?php esc_html_e('Add to Portfolio', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                        <button class="evolvewp-predictiveerp-control-button">
                            <span class="control-icon dashicons dashicons-star-filled"></span>
                            <span class="control-text"><?php esc_html_e('Watchlist', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                        <button class="evolvewp-predictiveerp-control-button evolvewp-predictiveerp-control-danger">
                            <span class="control-icon dashicons dashicons-dismiss"></span>
                            <span class="control-text"><?php esc_html_e('Ignore', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Toggle Controls -->
        <div class="component-demo">
            <h4><?php esc_html_e('Toggle Controls', 'evolvewp-predictiveerp'); ?></h4>
            <div class="control-panel">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('View Options', 'evolvewp-predictiveerp'); ?></h5>
                </div>
                <div class="control-panel-body">
                    <div class="control-toggle-group">
                        <button class="evolvewp-predictiveerp-toggle-button active">
                            <span class="dashicons dashicons-grid-view"></span>
                            <span class="control-label"><?php esc_html_e('Grid', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                        <button class="evolvewp-predictiveerp-toggle-button">
                            <span class="dashicons dashicons-list-view"></span>
                            <span class="control-label"><?php esc_html_e('List', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                        <button class="evolvewp-predictiveerp-toggle-button">
                            <span class="dashicons dashicons-table-row-after"></span>
                            <span class="control-label"><?php esc_html_e('Table', 'evolvewp-predictiveerp'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Bar -->
        <div class="component-demo">
            <h4><?php esc_html_e('Action Bar', 'evolvewp-predictiveerp'); ?></h4>
            <div class="action-bar">
                <div class="action-bar-left">
                    <button class="evolvewp-predictiveerp-action-button">
                        <span class="dashicons dashicons-plus"></span>
                        <?php esc_html_e('Add New', 'evolvewp-predictiveerp'); ?>
                    </button>
                    <button class="evolvewp-predictiveerp-action-button">
                        <span class="dashicons dashicons-edit"></span>
                        <?php esc_html_e('Edit', 'evolvewp-predictiveerp'); ?>
                    </button>
                </div>
                <div class="action-bar-right">
                    <button class="evolvewp-predictiveerp-action-button evolvewp-predictiveerp-action-secondary">
                        <span class="dashicons dashicons-trash"></span>
                        <?php esc_html_e('Delete', 'evolvewp-predictiveerp'); ?>
                    </button>
                    <div class="action-dropdown">
                        <button class="evolvewp-predictiveerp-action-button evolvewp-predictiveerp-action-dropdown">
                            <?php esc_html_e('More Actions', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-arrow-down-alt2"></span>
                        </button>
                        <div class="action-dropdown-content">
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Export', 'evolvewp-predictiveerp'); ?></a>
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Duplicate', 'evolvewp-predictiveerp'); ?></a>
                            <a href="#" class="action-dropdown-item"><?php esc_html_e('Share', 'evolvewp-predictiveerp'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Control Panel -->
        <div class="component-demo">
            <h4><?php esc_html_e('Control Panel', 'evolvewp-predictiveerp'); ?></h4>
            <div class="control-panel control-panel-expanded">
                <div class="control-panel-header">
                    <h5><?php esc_html_e('Trading Settings', 'evolvewp-predictiveerp'); ?></h5>
                    <div class="control-panel-actions">
                        <button class="evolvewp-predictiveerp-control-button evolvewp-predictiveerp-control-small">
                            <span class="dashicons dashicons-admin-generic"></span>
                        </button>
                        <button class="evolvewp-predictiveerp-control-button evolvewp-predictiveerp-control-small evolvewp-predictiveerp-control-toggle">
                            <span class="dashicons dashicons-arrow-up-alt2"></span>
                        </button>
                    </div>
                </div>
                <div class="control-panel-body">
                    <div class="control-row">
                        <label class="control-label"><?php esc_html_e('Execution Mode', 'evolvewp-predictiveerp'); ?></label>
                        <div class="control-options">
                            <label class="control-radio">
                                <input type="radio" name="execution_mode" checked>
                                <span><?php esc_html_e('Manual', 'evolvewp-predictiveerp'); ?></span>
                            </label>
                            <label class="control-radio">
                                <input type="radio" name="execution_mode">
                                <span><?php esc_html_e('Semi-Auto', 'evolvewp-predictiveerp'); ?></span>
                            </label>
                            <label class="control-radio">
                                <input type="radio" name="execution_mode">
                                <span><?php esc_html_e('Automatic', 'evolvewp-predictiveerp'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="control-row">
                        <label class="control-label"><?php esc_html_e('Risk Level', 'evolvewp-predictiveerp'); ?></label>
                        <div class="control-slider">
                            <input type="range" min="1" max="10" value="5">
                            <span class="control-value">5</span>
                        </div>
                    </div>
                </div>
                <div class="control-panel-footer">
                    <button class="evolvewp-predictiveerp-button evolvewp-predictiveerp-button-small evolvewp-predictiveerp-button-secondary"><?php esc_html_e('Reset', 'evolvewp-predictiveerp'); ?></button>
                    <button class="evolvewp-predictiveerp-button evolvewp-predictiveerp-button-small evolvewp-predictiveerp-button-primary"><?php esc_html_e('Apply', 'evolvewp-predictiveerp'); ?></button>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add inline script for controls functionality
    $evolvewp_erp_controls_script = "
        jQuery(document).ready(function($) {
            // Toggle buttons
            $('.evolvewp-predictiveerp-toggle-button').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
            
            // Action dropdown
            $('.evolvewp-predictiveerp-action-dropdown').on('click', function(e) {
                e.preventDefault();
                $(this).next('.action-dropdown-content').toggleClass('show');
            });
            
            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.action-dropdown').length) {
                    $('.action-dropdown-content').removeClass('show');
                }
            });
            
            // Control panel toggle
            $('.evolvewp-predictiveerp-control-toggle').on('click', function() {
                var panel = $(this).closest('.control-panel');
                panel.toggleClass('control-panel-expanded');
                
                // Toggle icon
                var icon = $(this).find('.dashicons');
                if (panel.hasClass('control-panel-expanded')) {
                    icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
                } else {
                    icon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
                }
            });
            
            // Update slider value display
            $('.control-slider input[type=\"range\"]').on('input', function() {
                $(this).next('.control-value').text($(this).val());
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_erp_controls_script);
    ?>

</div>
