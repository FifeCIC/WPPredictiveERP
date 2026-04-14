<?php
/**
 * UI Library Color Palette Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Color Palette', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('The evolvewp-predictiveerp color system uses CSS custom properties for consistent theming.', 'evolvewp-predictiveerp'); ?></p>

    <!-- Primary Colors -->
    <div class="evolvewp-predictiveerp-color-group">
        <h4><?php esc_html_e('Primary Colors', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-color-grid">
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Primary', '#2271b1', '--evolvewp-predictiveerp-color-primary')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-primary"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Primary</span>
                    <span class="evolvewp-predictiveerp-color-value">#2271b1</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Primary Dark', '#135e96', '--evolvewp-predictiveerp-color-primary-dark')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-primary-dark"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Primary Dark</span>
                    <span class="evolvewp-predictiveerp-color-value">#135e96</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Primary Light', '#72aee6', '--evolvewp-predictiveerp-color-primary-light')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-primary-light"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Primary Light</span>
                    <span class="evolvewp-predictiveerp-color-value">#72aee6</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Colors -->
    <div class="evolvewp-predictiveerp-color-group">
        <h4><?php esc_html_e('Status Colors', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-color-grid">
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Success', '#00a32a', '--evolvewp-predictiveerp-color-success')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-success"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Success</span>
                    <span class="evolvewp-predictiveerp-color-value">#00a32a</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Warning', '#dba617', '--evolvewp-predictiveerp-color-warning')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-warning"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Warning</span>
                    <span class="evolvewp-predictiveerp-color-value">#dba617</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Error', '#d63638', '--evolvewp-predictiveerp-color-error')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-error"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Error</span>
                    <span class="evolvewp-predictiveerp-color-value">#d63638</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Neutral Colors -->
    <div class="evolvewp-predictiveerp-color-group">
        <h4><?php esc_html_e('Neutral Colors', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-color-grid">
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'White', '#ffffff', '--evolvewp-predictiveerp-color-white')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-white"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">White</span>
                    <span class="evolvewp-predictiveerp-color-value">#ffffff</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Gray 100', '#f0f0f1', '--evolvewp-predictiveerp-color-gray-100')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-gray-100"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Gray 100</span>
                    <span class="evolvewp-predictiveerp-color-value">#f0f0f1</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Gray 300', '#dcdcde', '--evolvewp-predictiveerp-color-gray-300')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-gray-300"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Gray 300</span>
                    <span class="evolvewp-predictiveerp-color-value">#dcdcde</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Gray 500', '#a7aaad', '--evolvewp-predictiveerp-color-gray-500')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-gray-500"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Gray 500</span>
                    <span class="evolvewp-predictiveerp-color-value">#a7aaad</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Gray 700', '#646970', '--evolvewp-predictiveerp-color-gray-700')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-gray-700"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Gray 700</span>
                    <span class="evolvewp-predictiveerp-color-value">#646970</span>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-color-item" onclick=evolvewp-predictiveerpUILibrary.showColorInfo(this, 'Gray 900', '#1d2327', '--evolvewp-predictiveerp-color-gray-900')">
                <div class="evolvewp-predictiveerp-color-swatch evolvewp-predictiveerp-color-gray-900"></div>
                <div class="evolvewp-predictiveerp-color-info">
                    <span class="evolvewp-predictiveerp-color-name">Gray 900</span>
                    <span class="evolvewp-predictiveerp-color-value">#1d2327</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Color Information Display -->
    <div id="evolvewp-predictiveerp-color-info-display" class="evolvewp-predictiveerp-color-info-panel" style="display: none;">
        <h4><?php esc_html_e('Color Information', 'evolvewp-predictiveerp'); ?></h4>
        <div id="evolvewp-predictiveerp-color-details"></div>
    </div>
</div>
