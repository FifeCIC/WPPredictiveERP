<?php
/**
 * UI Library Tooltips Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Tooltips', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('Contextual information displays for trading data, technical indicators, and user guidance using existing evolvewp-predictiveerp styles.', 'evolvewp-predictiveerp'); ?></p>
    
    <div class="evolvewp-predictiveerp-component-group">
        <!-- Basic Tooltips -->
        <div class="component-demo">
            <h4><?php esc_html_e('Basic Tooltips', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="tooltip-examples">
                    <div class="tooltip-item">
                        <span class="tooltip-trigger" data-tooltip="<?php esc_attr_e('This is a basic tooltip with simple information', 'evolvewp-predictiveerp'); ?>">
                            <?php esc_html_e('Hover for basic tooltip', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-info"></span>
                        </span>
                    </div>
                    
                    <div class="tooltip-item">
                        <span class="tooltip-trigger tooltip-warning" data-tooltip="<?php esc_attr_e('Warning: High volatility detected in this symbol', 'evolvewp-predictiveerp'); ?>">
                            <?php esc_html_e('Warning tooltip', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-warning"></span>
                        </span>
                    </div>
                    
                    <div class="tooltip-item">
                        <span class="tooltip-trigger tooltip-success" data-tooltip="<?php esc_attr_e('Success: Order executed successfully', 'evolvewp-predictiveerp'); ?>">
                            <?php esc_html_e('Success tooltip', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-yes-alt"></span>
                        </span>
                    </div>
                    
                    <div class="tooltip-item">
                        <span class="tooltip-trigger tooltip-error" data-tooltip="<?php esc_attr_e('Error: Insufficient funds for this trade', 'evolvewp-predictiveerp'); ?>">
                            <?php esc_html_e('Error tooltip', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-dismiss"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Trading Data Tooltips -->
        <div class="component-demo">
            <h4><?php esc_html_e('Trading Data Tooltips', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="trading-metrics-grid">
                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label"><?php esc_html_e('RSI', 'evolvewp-predictiveerp'); ?></span>
                            <span class="tooltip-trigger" data-tooltip="<?php esc_attr_e('Relative Strength Index (RSI) measures momentum. Values above 70 suggest overbought conditions, below 30 suggest oversold conditions.', 'evolvewp-predictiveerp'); ?>">
                                <span class="dashicons dashicons-info-outline"></span>
                            </span>
                        </div>
                        <div class="metric-value positive">65.2</div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label"><?php esc_html_e('MACD', 'evolvewp-predictiveerp'); ?></span>
                            <span class="tooltip-trigger" data-tooltip="<?php esc_attr_e('Moving Average Convergence Divergence (MACD) is a trend-following momentum indicator. Current value shows bullish momentum.', 'evolvewp-predictiveerp'); ?>">
                                <span class="dashicons dashicons-info-outline"></span>
                            </span>
                        </div>
                        <div class="metric-value positive">+0.24</div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label"><?php esc_html_e('Beta', 'evolvewp-predictiveerp'); ?></span>
                            <span class="tooltip-trigger" data-tooltip="<?php esc_attr_e('Beta measures volatility relative to the market. Beta > 1 means more volatile than market, Beta < 1 means less volatile.', 'evolvewp-predictiveerp'); ?>">
                                <span class="dashicons dashicons-info-outline"></span>
                            </span>
                        </div>
                        <div class="metric-value neutral">1.15</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Rich Content Tooltips -->
        <div class="component-demo">
            <h4><?php esc_html_e('Rich Content Tooltips', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="symbol-list">
                    <div class="symbol-row">
                        <div class="symbol-info">
                            <span class="symbol-name">AAPL</span>
                            <span class="rich-tooltip-trigger" data-symbol="AAPL">
                                <span class="dashicons dashicons-chart-line"></span>
                            </span>
                        </div>
                        <div class="symbol-price positive">$172.45</div>
                        <div class="symbol-change positive">+2.15%</div>
                    </div>
                    
                    <div class="symbol-row">
                        <div class="symbol-info">
                            <span class="symbol-name">TSLA</span>
                            <span class="rich-tooltip-trigger" data-symbol="TSLA">
                                <span class="dashicons dashicons-chart-line"></span>
                            </span>
                        </div>
                        <div class="symbol-price negative">$245.80</div>
                        <div class="symbol-change negative">-1.85%</div>
                    </div>
                    
                    <div class="symbol-row">
                        <div class="symbol-info">
                            <span class="symbol-name">MSFT</span>
                            <span class="rich-tooltip-trigger" data-symbol="MSFT">
                                <span class="dashicons dashicons-chart-line"></span>
                            </span>
                        </div>
                        <div class="symbol-price positive">$385.20</div>
                        <div class="symbol-change positive">+0.95%</div>
                    </div>
                </div>
                
                <!-- Rich tooltip templates (hidden) -->
                <div class="rich-tooltip-templates" style="display: none;">
                    <div class="rich-tooltip-content" data-template="AAPL">
                        <div class="tooltip-header">
                            <strong>Apple Inc. (AAPL)</strong>
                        </div>
                        <div class="tooltip-metrics">
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Market Cap:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">$2.85T</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('P/E Ratio:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">28.5</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Volume:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">45.2M</span>
                            </div>
                        </div>
                        <div class="tooltip-footer">
                            <small><?php esc_html_e('Last updated: 2 minutes ago', 'evolvewp-predictiveerp'); ?></small>
                        </div>
                    </div>
                    
                    <div class="rich-tooltip-content" data-template="TSLA">
                        <div class="tooltip-header">
                            <strong>Tesla, Inc. (TSLA)</strong>
                        </div>
                        <div class="tooltip-metrics">
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Market Cap:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">$780B</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('P/E Ratio:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">58.3</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Volume:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">125.8M</span>
                            </div>
                        </div>
                        <div class="tooltip-footer">
                            <small><?php esc_html_e('Last updated: 1 minute ago', 'evolvewp-predictiveerp'); ?></small>
                        </div>
                    </div>
                    
                    <div class="rich-tooltip-content" data-template="MSFT">
                        <div class="tooltip-header">
                            <strong>Microsoft Corporation (MSFT)</strong>
                        </div>
                        <div class="tooltip-metrics">
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Market Cap:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">$2.92T</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('P/E Ratio:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">32.1</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Volume:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">28.9M</span>
                            </div>
                        </div>
                        <div class="tooltip-footer">
                            <small><?php esc_html_e('Last updated: 3 minutes ago', 'evolvewp-predictiveerp'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Interactive Tooltips -->
        <div class="component-demo">
            <h4><?php esc_html_e('Interactive Tooltips', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="interactive-tooltip-examples">
                    <div class="tooltip-item">
                        <span class="interactive-tooltip-trigger" data-tooltip-content="strategy-help">
                            <?php esc_html_e('Strategy Help', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-editor-help"></span>
                        </span>
                    </div>
                    
                    <div class="tooltip-item">
                        <span class="interactive-tooltip-trigger" data-tooltip-content="risk-settings">
                            <?php esc_html_e('Risk Settings', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-shield"></span>
                        </span>
                    </div>
                    
                    <div class="tooltip-item">
                        <span class="interactive-tooltip-trigger" data-tooltip-content="api-status">
                            <?php esc_html_e('API Status', 'evolvewp-predictiveerp'); ?>
                            <span class="dashicons dashicons-admin-plugins"></span>
                        </span>
                    </div>
                </div>
                
                <!-- Interactive tooltip contents (hidden) -->
                <div class="interactive-tooltip-templates" style="display: none;">
                    <div class="interactive-tooltip-content" data-content="strategy-help">
                        <div class="tooltip-header">
                            <strong><?php esc_html_e('Strategy Configuration', 'evolvewp-predictiveerp'); ?></strong>
                        </div>
                        <div class="tooltip-body">
                            <p><?php esc_html_e('Configure your trading strategy parameters:', 'evolvewp-predictiveerp'); ?></p>
                            <ul>
                                <li><?php esc_html_e('Set entry and exit conditions', 'evolvewp-predictiveerp'); ?></li>
                                <li><?php esc_html_e('Define risk management rules', 'evolvewp-predictiveerp'); ?></li>
                                <li><?php esc_html_e('Configure position sizing', 'evolvewp-predictiveerp'); ?></li>
                            </ul>
                        </div>
                        <div class="tooltip-actions">
                            <button class="tp-button tp-button-small tp-button-primary"><?php esc_html_e('Learn More', 'evolvewp-predictiveerp'); ?></button>
                        </div>
                    </div>
                    
                    <div class="interactive-tooltip-content" data-content="risk-settings">
                        <div class="tooltip-header">
                            <strong><?php esc_html_e('Risk Management', 'evolvewp-predictiveerp'); ?></strong>
                        </div>
                        <div class="tooltip-body">
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Max Risk per Trade:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">2%</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Daily Loss Limit:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">5%</span>
                            </div>
                            <div class="tooltip-metric">
                                <span class="metric-name"><?php esc_html_e('Position Size:', 'evolvewp-predictiveerp'); ?></span>
                                <span class="metric-value">Auto</span>
                            </div>
                        </div>
                        <div class="tooltip-actions">
                            <button class="tp-button tp-button-small tp-button-secondary"><?php esc_html_e('Adjust', 'evolvewp-predictiveerp'); ?></button>
                        </div>
                    </div>
                    
                    <div class="interactive-tooltip-content" data-content="api-status">
                        <div class="tooltip-header">
                            <strong><?php esc_html_e('API Connection Status', 'evolvewp-predictiveerp'); ?></strong>
                        </div>
                        <div class="tooltip-body">
                            <div class="api-status-list">
                                <div class="api-status-item">
                                    <span class="status-dot status-connected"></span>
                                    <span class="api-name"><?php esc_html_e('Alpha Vantage', 'evolvewp-predictiveerp'); ?></span>
                                    <span class="api-status"><?php esc_html_e('Connected', 'evolvewp-predictiveerp'); ?></span>
                                </div>
                                <div class="api-status-item">
                                    <span class="status-dot status-warning"></span>
                                    <span class="api-name"><?php esc_html_e('Trading Platform', 'evolvewp-predictiveerp'); ?></span>
                                    <span class="api-status"><?php esc_html_e('Limited', 'evolvewp-predictiveerp'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="tooltip-actions">
                            <button class="tp-button tp-button-small tp-button-primary"><?php esc_html_e('Check Status', 'evolvewp-predictiveerp'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Positional Tooltips -->
        <div class="component-demo">
            <h4><?php esc_html_e('Tooltip Positioning', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="positioning-demo">
                    <div class="positioning-grid">
                        <div class="position-item">
                            <span class="tooltip-trigger tooltip-top" data-tooltip="<?php esc_attr_e('Tooltip positioned above', 'evolvewp-predictiveerp'); ?>">
                                <?php esc_html_e('Top', 'evolvewp-predictiveerp'); ?>
                            </span>
                        </div>
                        <div class="position-item">
                            <span class="tooltip-trigger tooltip-right" data-tooltip="<?php esc_attr_e('Tooltip positioned to the right', 'evolvewp-predictiveerp'); ?>">
                                <?php esc_html_e('Right', 'evolvewp-predictiveerp'); ?>
                            </span>
                        </div>
                        <div class="position-item">
                            <span class="tooltip-trigger tooltip-bottom" data-tooltip="<?php esc_attr_e('Tooltip positioned below', 'evolvewp-predictiveerp'); ?>">
                                <?php esc_html_e('Bottom', 'evolvewp-predictiveerp'); ?>
                            </span>
                        </div>
                        <div class="position-item">
                            <span class="tooltip-trigger tooltip-left" data-tooltip="<?php esc_attr_e('Tooltip positioned to the left', 'evolvewp-predictiveerp'); ?>">
                                <?php esc_html_e('Left', 'evolvewp-predictiveerp'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Chart Tooltip Integration -->
        <div class="component-demo">
            <h4><?php esc_html_e('Chart Data Tooltips', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="chart-tooltip-demo">
                    <div class="mini-chart">
                        <div class="chart-header">
                            <h5><?php esc_html_e('AAPL - 1 Day Chart', 'evolvewp-predictiveerp'); ?></h5>
                        </div>
                        <div class="chart-body">
                            <div class="chart-points">
                                <div class="chart-point" data-time="09:30" data-price="168.50" data-volume="2.1M">
                                    <span class="point-indicator"></span>
                                </div>
                                <div class="chart-point" data-time="10:00" data-price="169.25" data-volume="1.8M">
                                    <span class="point-indicator"></span>
                                </div>
                                <div class="chart-point" data-time="10:30" data-price="170.15" data-volume="2.5M">
                                    <span class="point-indicator"></span>
                                </div>
                                <div class="chart-point" data-time="11:00" data-price="171.80" data-volume="3.2M">
                                    <span class="point-indicator"></span>
                                </div>
                                <div class="chart-point" data-time="11:30" data-price="172.45" data-volume="2.9M">
                                    <span class="point-indicator"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chart tooltip template -->
                    <div class="chart-tooltip-template" style="display: none;">
                        <div class="chart-tooltip-content">
                            <div class="tooltip-time"></div>
                            <div class="tooltip-metrics">
                                <div class="tooltip-metric">
                                    <span class="metric-name"><?php esc_html_e('Price:', 'evolvewp-predictiveerp'); ?></span>
                                    <span class="metric-value price-value"></span>
                                </div>
                                <div class="tooltip-metric">
                                    <span class="metric-name"><?php esc_html_e('Volume:', 'evolvewp-predictiveerp'); ?></span>
                                    <span class="metric-value volume-value"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    // Add interactive demo script
    $evolvewp_erp_tooltip_script = "
        jQuery(document).ready(function($) {
            var activeTooltip = null;
            
            // Basic tooltip functionality
            $('.tooltip-trigger').on('mouseenter', function() {
                var tooltipText = $(this).data('tooltip');
                var tooltip = $('<div class=\"evolvewp-predictiveerp-tooltip\">' + tooltipText + '</div>');
                $('body').append(tooltip);
                
                var trigger = $(this);
                var offset = trigger.offset();
                var triggerWidth = trigger.outerWidth();
                var triggerHeight = trigger.outerHeight();
                var tooltipWidth = tooltip.outerWidth();
                var tooltipHeight = tooltip.outerHeight();
                
                // Position tooltip
                var left = offset.left + (triggerWidth / 2) - (tooltipWidth / 2);
                var top = offset.top - tooltipHeight - 10;
                
                // Add positioning classes
                if (trigger.hasClass('tooltip-right')) {
                    left = offset.left + triggerWidth + 10;
                    top = offset.top + (triggerHeight / 2) - (tooltipHeight / 2);
                    tooltip.addClass('tooltip-right');
                } else if (trigger.hasClass('tooltip-bottom')) {
                    top = offset.top + triggerHeight + 10;
                    tooltip.addClass('tooltip-bottom');
                } else if (trigger.hasClass('tooltip-left')) {
                    left = offset.left - tooltipWidth - 10;
                    top = offset.top + (triggerHeight / 2) - (tooltipHeight / 2);
                    tooltip.addClass('tooltip-left');
                } else {
                    tooltip.addClass('tooltip-top');
                }
                
                // Add type classes
                if (trigger.hasClass('tooltip-warning')) {
                    tooltip.addClass('tooltip-warning');
                } else if (trigger.hasClass('tooltip-success')) {
                    tooltip.addClass('tooltip-success');
                } else if (trigger.hasClass('tooltip-error')) {
                    tooltip.addClass('tooltip-error');
                }
                
                tooltip.css({
                    left: left + 'px',
                    top: top + 'px'
                }).fadeIn(200);
                
                activeTooltip = tooltip;
            });
            
            $('.tooltip-trigger').on('mouseleave', function() {
                if (activeTooltip) {
                    activeTooltip.fadeOut(200, function() {
                        $(this).remove();
                    });
                    activeTooltip = null;
                }
            });
            
            // Rich tooltip functionality
            $('.rich-tooltip-trigger').on('mouseenter', function() {
                var symbol = $(this).data('symbol');
                var template = $('.rich-tooltip-content[data-template=\"' + symbol + '\"]').clone();
                
                var tooltip = $('<div class=\"evolvewp-predictiveerp-tooltip evolvewp-predictiveerp-rich-tooltip\"></div>');
                tooltip.html(template.html());
                $('body').append(tooltip);
                
                var trigger = $(this);
                var offset = trigger.offset();
                var triggerWidth = trigger.outerWidth();
                var triggerHeight = trigger.outerHeight();
                var tooltipWidth = tooltip.outerWidth();
                var tooltipHeight = tooltip.outerHeight();
                
                var left = offset.left + triggerWidth + 10;
                var top = offset.top + (triggerHeight / 2) - (tooltipHeight / 2);
                
                tooltip.css({
                    left: left + 'px',
                    top: top + 'px'
                }).fadeIn(200);
                
                activeTooltip = tooltip;
            });
            
            $('.rich-tooltip-trigger').on('mouseleave', function() {
                if (activeTooltip) {
                    activeTooltip.fadeOut(200, function() {
                        $(this).remove();
                    });
                    activeTooltip = null;
                }
            });
            
            // Interactive tooltip functionality
            $('.interactive-tooltip-trigger').on('click', function(e) {
                e.preventDefault();
                var contentKey = $(this).data('tooltip-content');
                var template = $('.interactive-tooltip-content[data-content=\"' + contentKey + '\"]').clone();
                
                // Remove any existing interactive tooltips
                $('.evolvewp-predictiveerp-interactive-tooltip').remove();
                
                var tooltip = $('<div class=\"evolvewp-predictiveerp-tooltip evolvewp-predictiveerp-interactive-tooltip\"></div>');
                tooltip.html(template.html());
                $('body').append(tooltip);
                
                var trigger = $(this);
                var offset = trigger.offset();
                var triggerWidth = trigger.outerWidth();
                var triggerHeight = trigger.outerHeight();
                var tooltipWidth = tooltip.outerWidth();
                var tooltipHeight = tooltip.outerHeight();
                
                var left = offset.left + triggerWidth + 10;
                var top = offset.top + (triggerHeight / 2) - (tooltipHeight / 2);
                
                tooltip.css({
                    left: left + 'px',
                    top: top + 'px'
                }).fadeIn(200);
                
                // Add close functionality
                tooltip.append('<button class=\"tooltip-close\"><span class=\"dashicons dashicons-no-alt\"></span></button>');
                
                tooltip.find('.tooltip-close').on('click', function() {
                    tooltip.fadeOut(200, function() {
                        $(this).remove();
                    });
                });
            });
            
            // Chart point tooltips
            $('.chart-point').on('mouseenter', function() {
                var time = $(this).data('time');
                var price = $(this).data('price');
                var volume = $(this).data('volume');
                
                var template = $('.chart-tooltip-template .chart-tooltip-content').clone();
                template.find('.tooltip-time').text(time);
                template.find('.price-value').text('$' + price);
                template.find('.volume-value').text(volume);
                
                var tooltip = $('<div class=\"evolvewp-predictiveerp-tooltip evolvewp-predictiveerp-chart-tooltip\"></div>');
                tooltip.html(template.html());
                $('body').append(tooltip);
                
                var trigger = $(this);
                var offset = trigger.offset();
                var triggerWidth = trigger.outerWidth();
                var triggerHeight = trigger.outerHeight();
                var tooltipWidth = tooltip.outerWidth();
                var tooltipHeight = tooltip.outerHeight();
                
                var left = offset.left + (triggerWidth / 2) - (tooltipWidth / 2);
                var top = offset.top - tooltipHeight - 10;
                
                tooltip.css({
                    left: left + 'px',
                    top: top + 'px'
                }).fadeIn(200);
                
                activeTooltip = tooltip;
            });
            
            $('.chart-point').on('mouseleave', function() {
                if (activeTooltip) {
                    activeTooltip.fadeOut(200, function() {
                        $(this).remove();
                    });
                    activeTooltip = null;
                }
            });
            
            // Close interactive tooltips when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.evolvewp-predictiveerp-interactive-tooltip, .interactive-tooltip-trigger').length) {
                    $('.evolvewp-predictiveerp-interactive-tooltip').fadeOut(200, function() {
                        $(this).remove();
                    });
                }
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_erp_tooltip_script);
    ?>
</div>
