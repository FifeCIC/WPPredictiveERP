<?php
/**
 * UI Library Data Analysis Components Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Data Analysis Components', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('Components for displaying trading data, metrics, and statistical analysis using existing evolvewp-predictiveerp styles.', 'evolvewp-predictiveerp'); ?></p>
    
    <div class="evolvewp-predictiveerp-component-group">
        <!-- Metric Cards Grid -->
        <div class="component-demo">
            <h4><?php esc_html_e('Trading Metrics Cards', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="evolvewp-predictiveerp-grid evolvewp-predictiveerp-grid-3-cols">
                    <div class="evolvewp-predictiveerp-card">
                        <div class="evolvewp-predictiveerp-card-header">
                            <h5><?php esc_html_e('Portfolio Value', 'evolvewp-predictiveerp'); ?></h5>
                            <span class="dashicons dashicons-chart-line"></span>
                        </div>
                        <div class="evolvewp-predictiveerp-card-body">
                            <div class="metric-value">$124,567.89</div>
                            <div class="metric-change positive">
                                <span class="dashicons dashicons-arrow-up-alt"></span>
                                +$2,345 (+1.92%)
                            </div>
                        </div>
                    </div>
                    
                    <div class="evolvewp-predictiveerp-card">
                        <div class="evolvewp-predictiveerp-card-header">
                            <h5><?php esc_html_e('Daily P&L', 'evolvewp-predictiveerp'); ?></h5>
                            <span class="dashicons dashicons-money-alt"></span>
                        </div>
                        <div class="evolvewp-predictiveerp-card-body">
                            <div class="metric-value">-$532.15</div>
                            <div class="metric-change negative">
                                <span class="dashicons dashicons-arrow-down-alt"></span>
                                -0.43%
                            </div>
                        </div>
                    </div>
                    
                    <div class="evolvewp-predictiveerp-card">
                        <div class="evolvewp-predictiveerp-card-header">
                            <h5><?php esc_html_e('Win Rate', 'evolvewp-predictiveerp'); ?></h5>
                            <span class="dashicons dashicons-chart-pie"></span>
                        </div>
                        <div class="evolvewp-predictiveerp-card-body">
                            <div class="metric-value">72.5%</div>
                            <div class="metric-progress">
                                <div class="media-progress-bar progress-success">
                                    <div style="width: 72.5%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics Table -->
        <div class="component-demo">
            <h4><?php esc_html_e('Trading Statistics Table', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="evolvewp-predictiveerp-table-wrapper">
                    <table class="evolvewp-predictiveerp-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Symbol', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Position', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Entry Price', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Current Price', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('P&L', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Score', 'evolvewp-predictiveerp'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>AAPL</strong></td>
                                <td>
                                    <span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-success"><?php esc_html_e('LONG', 'evolvewp-predictiveerp'); ?></span>
                                    100 shares
                                </td>
                                <td>$155.25</td>
                                <td>$168.40</td>
                                <td class="positive">+$1,315 (+8.47%)</td>
                                <td>
                                    <div class="score-display">
                                        <span class="score-value">87</span>
                                        <div class="score-bar">
                                            <div class="score-fill" style="width: 87%;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>TSLA</strong></td>
                                <td>
                                    <span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-error"><?php esc_html_e('SHORT', 'evolvewp-predictiveerp'); ?></span>
                                    50 shares
                                </td>
                                <td>$245.80</td>
                                <td>$238.15</td>
                                <td class="positive">+$382.50 (+3.11%)</td>
                                <td>
                                    <div class="score-display">
                                        <span class="score-value">74</span>
                                        <div class="score-bar">
                                            <div class="score-fill" style="width: 74%;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>NVDA</strong></td>
                                <td>
                                    <span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-success"><?php esc_html_e('LONG', 'evolvewp-predictiveerp'); ?></span>
                                    25 shares
                                </td>
                                <td>$420.15</td>
                                <td>$405.30</td>
                                <td class="negative">-$371.25 (-3.53%)</td>
                                <td>
                                    <div class="score-display">
                                        <span class="score-value">62</span>
                                        <div class="score-bar">
                                            <div class="score-fill" style="width: 62%;"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- KPI Dashboard -->
        <div class="component-demo">
            <h4><?php esc_html_e('KPI Dashboard', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="kpi-dashboard">
                    <div class="kpi-section">
                        <h5><?php esc_html_e('Performance Metrics', 'evolvewp-predictiveerp'); ?></h5>
                        <div class="kpi-grid">
                            <div class="kpi-item">
                                <div class="kpi-label"><?php esc_html_e('Total Return', 'evolvewp-predictiveerp'); ?></div>
                                <div class="kpi-value positive">+24.8%</div>
                                <div class="kpi-subtext"><?php esc_html_e('vs S&P 500: +18.2%', 'evolvewp-predictiveerp'); ?></div>
                            </div>
                            <div class="kpi-item">
                                <div class="kpi-label"><?php esc_html_e('Sharpe Ratio', 'evolvewp-predictiveerp'); ?></div>
                                <div class="kpi-value">1.42</div>
                                <div class="kpi-subtext"><?php esc_html_e('Risk-adjusted return', 'evolvewp-predictiveerp'); ?></div>
                            </div>
                            <div class="kpi-item">
                                <div class="kpi-label"><?php esc_html_e('Max Drawdown', 'evolvewp-predictiveerp'); ?></div>
                                <div class="kpi-value negative">-8.3%</div>
                                <div class="kpi-subtext"><?php esc_html_e('Peak to trough', 'evolvewp-predictiveerp'); ?></div>
                            </div>
                            <div class="kpi-item">
                                <div class="kpi-label"><?php esc_html_e('Beta', 'evolvewp-predictiveerp'); ?></div>
                                <div class="kpi-value">0.85</div>
                                <div class="kpi-subtext"><?php esc_html_e('Market correlation', 'evolvewp-predictiveerp'); ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="kpi-section">
                        <h5><?php esc_html_e('Trading Activity', 'evolvewp-predictiveerp'); ?></h5>
                        <div class="kpi-grid">
                            <div class="kpi-item">
                                <div class="kpi-label"><?php esc_html_e('Total Trades', 'evolvewp-predictiveerp'); ?></div>
                                <div class="kpi-value">147</div>
                                <div class="kpi-progress">
                                    <div class="media-progress-bar">
                                        <div style="width: 65%;"></div>
                                    </div>
                                    <span class="kpi-progress-text">65% of target</span>
                                </div>
                            </div>
                            <div class="kpi-item">
                                <div class="kpi-label"><?php esc_html_e('Avg Hold Time', 'evolvewp-predictiveerp'); ?></div>
                                <div class="kpi-value">3.2 days</div>
                                <div class="kpi-subtext"><?php esc_html_e('Target: 2-5 days', 'evolvewp-predictiveerp'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Comparison Table -->
        <div class="component-demo">
            <h4><?php esc_html_e('Strategy Comparison', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="comparison-table-wrapper">
                    <table class="evolvewp-predictiveerp-table comparison-table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Strategy', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Return', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Win Rate', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Max DD', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Sharpe', 'evolvewp-predictiveerp'); ?></th>
                                <th><?php esc_html_e('Status', 'evolvewp-predictiveerp'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="comparison-row">
                                <td><strong><?php esc_html_e('Momentum Breakout', 'evolvewp-predictiveerp'); ?></strong></td>
                                <td class="positive">+28.5%</td>
                                <td>
                                    <div class="percentage-display">
                                        <span>74%</span>
                                        <div class="percentage-bar">
                                            <div class="percentage-fill" style="width: 74%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="negative">-12.1%</td>
                                <td>1.65</td>
                                <td><span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-success"><?php esc_html_e('Active', 'evolvewp-predictiveerp'); ?></span></td>
                            </tr>
                            <tr class="comparison-row">
                                <td><strong><?php esc_html_e('Mean Reversion', 'evolvewp-predictiveerp'); ?></strong></td>
                                <td class="positive">+18.2%</td>
                                <td>
                                    <div class="percentage-display">
                                        <span>68%</span>
                                        <div class="percentage-bar">
                                            <div class="percentage-fill" style="width: 68%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="negative">-8.7%</td>
                                <td>1.42</td>
                                <td><span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-warning"><?php esc_html_e('Testing', 'evolvewp-predictiveerp'); ?></span></td>
                            </tr>
                            <tr class="comparison-row">
                                <td><strong><?php esc_html_e('Trend Following', 'evolvewp-predictiveerp'); ?></strong></td>
                                <td class="positive">+22.8%</td>
                                <td>
                                    <div class="percentage-display">
                                        <span>61%</span>
                                        <div class="percentage-bar">
                                            <div class="percentage-fill" style="width: 61%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="negative">-15.3%</td>
                                <td>1.28</td>
                                <td><span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-badge-info"><?php esc_html_e('Paused', 'evolvewp-predictiveerp'); ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Real-time Data Feed -->
        <div class="component-demo">
            <h4><?php esc_html_e('Real-time Data Feed', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="data-feed-container">
                    <div class="data-feed-header">
                        <h5><?php esc_html_e('Live Market Data', 'evolvewp-predictiveerp'); ?></h5>
                        <div class="data-feed-status">
                            <span class="connection-status-dot connection-status-connected"></span>
                            <span><?php esc_html_e('Connected', 'evolvewp-predictiveerp'); ?></span>
                        </div>
                    </div>
                    <div class="data-feed-content">
                        <div class="data-feed-item">
                            <div class="data-symbol">SPY</div>
                            <div class="data-price">$428.15</div>
                            <div class="data-change positive">+0.85%</div>
                            <div class="data-volume">Vol: 45.2M</div>
                        </div>
                        <div class="data-feed-item">
                            <div class="data-symbol">QQQ</div>
                            <div class="data-price">$365.42</div>
                            <div class="data-change negative">-0.32%</div>
                            <div class="data-volume">Vol: 28.7M</div>
                        </div>
                        <div class="data-feed-item">
                            <div class="data-symbol">IWM</div>
                            <div class="data-price">$198.67</div>
                            <div class="data-change positive">+1.24%</div>
                            <div class="data-volume">Vol: 15.8M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Analytics Summary -->
        <div class="component-demo">
            <h4><?php esc_html_e('Analytics Summary Panel', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="analytics-summary">
                    <div class="analytics-header">
                        <h5><?php esc_html_e('Portfolio Analytics', 'evolvewp-predictiveerp'); ?></h5>
                        <div class="analytics-controls">
                            <select class="evolvewp-predictiveerp-select evolvewp-predictiveerp-select-small">
                                <option value="1d"><?php esc_html_e('1 Day', 'evolvewp-predictiveerp'); ?></option>
                                <option value="1w" selected><?php esc_html_e('1 Week', 'evolvewp-predictiveerp'); ?></option>
                                <option value="1m"><?php esc_html_e('1 Month', 'evolvewp-predictiveerp'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="analytics-body">
                        <div class="analytics-metrics">
                            <div class="analytics-metric">
                                <div class="metric-icon">
                                    <span class="dashicons dashicons-chart-area"></span>
                                </div>
                                <div class="metric-data">
                                    <div class="metric-label"><?php esc_html_e('Volatility', 'evolvewp-predictiveerp'); ?></div>
                                    <div class="metric-value">18.4%</div>
                                    <div class="metric-trend">
                                        <span class="dashicons dashicons-arrow-down-alt"></span>
                                        <span><?php esc_html_e('Decreasing', 'evolvewp-predictiveerp'); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="analytics-metric">
                                <div class="metric-icon">
                                    <span class="dashicons dashicons-performance"></span>
                                </div>
                                <div class="metric-data">
                                    <div class="metric-label"><?php esc_html_e('Alpha', 'evolvewp-predictiveerp'); ?></div>
                                    <div class="metric-value positive">+4.2%</div>
                                    <div class="metric-trend">
                                        <span class="dashicons dashicons-arrow-up-alt"></span>
                                        <span><?php esc_html_e('Outperforming', 'evolvewp-predictiveerp'); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="analytics-metric">
                                <div class="metric-icon">
                                    <span class="dashicons dashicons-networking"></span>
                                </div>
                                <div class="metric-data">
                                    <div class="metric-label"><?php esc_html_e('Correlation', 'evolvewp-predictiveerp'); ?></div>
                                    <div class="metric-value">0.72</div>
                                    <div class="metric-trend">
                                        <span class="dashicons dashicons-minus"></span>
                                        <span><?php esc_html_e('Stable', 'evolvewp-predictiveerp'); ?></span>
                                    </div>
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
    $evolvewp_erp_data_analysis_script = "
        jQuery(document).ready(function($) {
            // Simulate real-time price updates
            function updatePrices() {
                $('.data-feed-item').each(function() {
                    var priceElement = $(this).find('.data-price');
                    var changeElement = $(this).find('.data-change');
                    var currentPrice = parseFloat(priceElement.text().replace('$', ''));
                    
                    // Random price change between -2% and +2%
                    var changePercent = (Math.random() - 0.5) * 4;
                    var newPrice = currentPrice * (1 + changePercent / 100);
                    
                    priceElement.text('$' + newPrice.toFixed(2));
                    
                    // Update change indicator
                    var changeText = (changePercent >= 0 ? '+' : '') + changePercent.toFixed(2) + '%';
                    changeElement.text(changeText);
                    changeElement.removeClass('positive negative');
                    changeElement.addClass(changePercent >= 0 ? 'positive' : 'negative');
                    
                    // Animate the change
                    $(this).addClass('data-updated');
                    setTimeout(function() {
                        $('.data-feed-item').removeClass('data-updated');
                    }, 500);
                });
            }
            
            // Update prices every 3 seconds
            setInterval(updatePrices, 3000);
            
            // Animate progress bars and score bars
            function animateBars() {
                $('.media-progress-bar div, .score-fill, .percentage-fill').each(function() {
                    var targetWidth = $(this).css('width');
                    $(this).css('width', '0%').animate({
                        width: targetWidth
                    }, 1000);
                });
            }
            
            // Initial animation
            animateBars();
            
            // Re-animate every 5 seconds
            setInterval(animateBars, 5000);
            
            // KPI hover effects
            $('.kpi-item').hover(
                function() {
                    $(this).addClass('kpi-hover');
                },
                function() {
                    $(this).removeClass('kpi-hover');
                }
            );
            
            // Comparison table row highlighting
            $('.comparison-row').hover(
                function() {
                    $(this).addClass('row-highlighted');
                },
                function() {
                    $(this).removeClass('row-highlighted');
                }
            );
            
            // Analytics time period change
            $('.analytics-controls select').on('change', function() {
                var period = $(this).val();
                $('.analytics-summary').addClass('analytics-loading');
                
                setTimeout(function() {
                    $('.analytics-summary').removeClass('analytics-loading');
                    
                    // Simulate different values for different periods
                    var values = {
                        '1d': { volatility: '12.1%', alpha: '+2.8%', correlation: '0.85' },
                        '1w': { volatility: '18.4%', alpha: '+4.2%', correlation: '0.72' },
                        '1m': { volatility: '22.7%', alpha: '+6.1%', correlation: '0.68' }
                    };
                    
                    if (values[period]) {
                        $('.analytics-metrics .metric-value').each(function(index) {
                            var newValues = Object.values(values[period]);
                            if (newValues[index]) {
                                $(this).text(newValues[index]);
                            }
                        });
                    }
                }, 800);
            });
        });
    ";
    
    wp_add_inline_script('jquery', $evolvewp_erp_data_analysis_script);
    ?>
</div>
