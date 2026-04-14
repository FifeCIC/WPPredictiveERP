<?php
/**
 * UI Library Accordion Components Partial
 *
 * @package EvolveWP PredictiveERP/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Accordion Components', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('Collapsible content panels, expandable sections, tree-view components, and FAQ-style accordions for organizing information.', 'evolvewp-predictiveerp'); ?></p>
    
    <div class="evolvewp-predictiveerp-component-group">
        <!-- Basic Accordion -->
        <div class="component-demo">
            <h4><?php esc_html_e('Basic Accordion', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-accordion">
                <div class="evolvewp-predictiveerp-accordion-item">
                    <div class="evolvewp-predictiveerp-accordion-header">
                        <h4><?php esc_html_e('Feature Overview', 'evolvewp-predictiveerp'); ?></h4>
                        <span class="evolvewp-predictiveerp-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="evolvewp-predictiveerp-accordion-content">
                        <p><?php esc_html_e('This section contains detailed information about plugin features, including configuration options, usage examples, and best practices.', 'evolvewp-predictiveerp'); ?></p>
                        <div class="evolvewp-predictiveerp-grid evolvewp-predictiveerp-grid-2">
                            <div class="evolvewp-predictiveerp-card">
                                <h5><?php esc_html_e('Core Features', 'evolvewp-predictiveerp'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Custom post types', 'evolvewp-predictiveerp'); ?></li>
                                    <li><?php esc_html_e('REST API endpoints', 'evolvewp-predictiveerp'); ?></li>
                                    <li><?php esc_html_e('Settings framework', 'evolvewp-predictiveerp'); ?></li>
                                </ul>
                            </div>
                            <div class="evolvewp-predictiveerp-card">
                                <h5><?php esc_html_e('Advanced Features', 'evolvewp-predictiveerp'); ?></h5>
                                <ul>
                                    <li><?php esc_html_e('Background processing', 'evolvewp-predictiveerp'); ?></li>
                                    <li><?php esc_html_e('Logging system', 'evolvewp-predictiveerp'); ?></li>
                                    <li><?php esc_html_e('Asset management', 'evolvewp-predictiveerp'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="evolvewp-predictiveerp-accordion-item">
                    <div class="evolvewp-predictiveerp-accordion-header">
                        <h4><?php esc_html_e('Configuration', 'evolvewp-predictiveerp'); ?></h4>
                        <span class="evolvewp-predictiveerp-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="evolvewp-predictiveerp-accordion-content">
                        <p><?php esc_html_e('Configuration options and settings for customizing plugin behavior.', 'evolvewp-predictiveerp'); ?></p>
                        <div class="evolvewp-predictiveerp-table-container">
                            <table class="evolvewp-predictiveerp-table">
                                <thead>
                                    <tr>
                                        <th><?php esc_html_e('Setting', 'evolvewp-predictiveerp'); ?></th>
                                        <th><?php esc_html_e('Value', 'evolvewp-predictiveerp'); ?></th>
                                        <th><?php esc_html_e('Status', 'evolvewp-predictiveerp'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php esc_html_e('Debug Mode', 'evolvewp-predictiveerp'); ?></td>
                                        <td>Enabled</td>
                                        <td><span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-success"><?php esc_html_e('Active', 'evolvewp-predictiveerp'); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php esc_html_e('Logging', 'evolvewp-predictiveerp'); ?></td>
                                        <td>File + Database</td>
                                        <td><span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-success"><?php esc_html_e('Active', 'evolvewp-predictiveerp'); ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="evolvewp-predictiveerp-accordion-item">
                    <div class="evolvewp-predictiveerp-accordion-header">
                        <h4><?php esc_html_e('Performance', 'evolvewp-predictiveerp'); ?></h4>
                        <span class="evolvewp-predictiveerp-accordion-icon dashicons dashicons-arrow-down-alt2"></span>
                    </div>
                    <div class="evolvewp-predictiveerp-accordion-content">
                        <p><?php esc_html_e('Performance metrics and optimization settings.', 'evolvewp-predictiveerp'); ?></p>
                        <div class="media-progress-bar">
                            <div style="width: 85%;"><?php esc_html_e('85% Optimized', 'evolvewp-predictiveerp'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add interactive functionality
    $evolvewp_erp_accordion_script = "
        jQuery(document).ready(function($) {
            $('.evolvewp-predictiveerp-accordion-header').on('click', function() {
                var \$item = $(this).closest('.evolvewp-predictiveerp-accordion-item');
                var \$content = \$item.find('.evolvewp-predictiveerp-accordion-content').first();
                var \$icon = $(this).find('.evolvewp-predictiveerp-accordion-icon');
                
                \$content.slideToggle(300);
                \$item.toggleClass('evolvewp-predictiveerp-accordion-expanded');
                \$icon.toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
                
                \$item.siblings('.evolvewp-predictiveerp-accordion-item').each(function() {
                    var \$siblingContent = $(this).find('.evolvewp-predictiveerp-accordion-content').first();
                    var \$siblingIcon = $(this).find('.evolvewp-predictiveerp-accordion-icon').first();
                    
                    if (\$siblingContent.is(':visible')) {
                        \$siblingContent.slideUp(300);
                        $(this).removeClass('evolvewp-predictiveerp-accordion-expanded');
                        \$siblingIcon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
                    }
                });
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_erp_accordion_script);
    ?>
</div>
