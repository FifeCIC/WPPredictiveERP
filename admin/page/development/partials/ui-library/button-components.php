<?php
/**
 * UI Library Button Components Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.7
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Button Components', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('Standard button variations for consistent UI interactions.', 'evolvewp-predictiveerp'); ?></p>

    <!-- Primary Buttons -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Primary Buttons', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <button class="button button-primary"><?php esc_html_e('Primary Button', 'evolvewp-predictiveerp'); ?></button>
            <button class="button button-primary" disabled><?php esc_html_e('Disabled Primary', 'evolvewp-predictiveerp'); ?></button>
            <button class="button button-primary button-large"><?php esc_html_e('Large Primary', 'evolvewp-predictiveerp'); ?></button>
            <button class="button button-primary button-small"><?php esc_html_e('Small Primary', 'evolvewp-predictiveerp'); ?></button>
        </div>
    </div>

    <!-- Secondary Buttons -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Secondary Buttons', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <button class="button button-secondary"><?php esc_html_e('Secondary Button', 'evolvewp-predictiveerp'); ?></button>
            <button class="button button-secondary" disabled><?php esc_html_e('Disabled Secondary', 'evolvewp-predictiveerp'); ?></button>
            <button class="button button-secondary button-large"><?php esc_html_e('Large Secondary', 'evolvewp-predictiveerp'); ?></button>
            <button class="button button-secondary button-small"><?php esc_html_e('Small Secondary', 'evolvewp-predictiveerp'); ?></button>
        </div>
    </div>

    <!-- Icon Buttons -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Icon Buttons', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <button class="button button-primary">
                <span class="dashicons dashicons-plus-alt"></span>
                <?php esc_html_e('Add New', 'evolvewp-predictiveerp'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-edit"></span>
                <?php esc_html_e('Edit', 'evolvewp-predictiveerp'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-trash"></span>
                <?php esc_html_e('Delete', 'evolvewp-predictiveerp'); ?>
            </button>
            <button class="button button-secondary">
                <span class="dashicons dashicons-download"></span>
                <?php esc_html_e('Download', 'evolvewp-predictiveerp'); ?>
            </button>
        </div>
    </div>

    <!-- Link Buttons -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Link Buttons', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <button class="button-link"><?php esc_html_e('Link Button', 'evolvewp-predictiveerp'); ?></button>
            <button class="button-link-delete"><?php esc_html_e('Delete Link', 'evolvewp-predictiveerp'); ?></button>
            <button class="button-link" disabled><?php esc_html_e('Disabled Link', 'evolvewp-predictiveerp'); ?></button>
        </div>
    </div>

    <!-- Button Groups -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Button Groups', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <div class="button-group">
                <button class="button button-secondary"><?php esc_html_e('Left', 'evolvewp-predictiveerp'); ?></button>
                <button class="button button-secondary"><?php esc_html_e('Center', 'evolvewp-predictiveerp'); ?></button>
                <button class="button button-secondary"><?php esc_html_e('Right', 'evolvewp-predictiveerp'); ?></button>
            </div>
        </div>
    </div>

    <!-- API Status Buttons -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('API Status Buttons', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <button class="button"><?php esc_html_e('Call Test', 'evolvewp-predictiveerp'); ?></button>
            <button class="button"><?php esc_html_e('Query Test', 'evolvewp-predictiveerp'); ?></button>
            <button class="button"><?php esc_html_e('Status Details', 'evolvewp-predictiveerp'); ?></button>
            <button class="button"><?php esc_html_e('Switch to Paper', 'evolvewp-predictiveerp'); ?></button>
            <button class="button"><?php esc_html_e('Switch to Live', 'evolvewp-predictiveerp'); ?></button>
            <button class="button"><?php esc_html_e('Enable', 'evolvewp-predictiveerp'); ?></button>
            <button class="button"><?php esc_html_e('Disable', 'evolvewp-predictiveerp'); ?></button>
        </div>
    </div>

    <!-- Status Badge Buttons -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Status Badge Buttons', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-component-showcase">
            <span class="status-badge status-active"><?php esc_html_e('Operational', 'evolvewp-predictiveerp'); ?></span>
            <span class="status-badge status-inactive"><?php esc_html_e('Disabled', 'evolvewp-predictiveerp'); ?></span>
            <span class="type-badge type-data"><?php esc_html_e('Data Only', 'evolvewp-predictiveerp'); ?></span>
            <span class="type-badge type-trading"><?php esc_html_e('Trading', 'evolvewp-predictiveerp'); ?></span>
            <span class="mode-badge mode-live"><?php esc_html_e('Live', 'evolvewp-predictiveerp'); ?></span>
            <span class="mode-badge mode-paper"><?php esc_html_e('Paper', 'evolvewp-predictiveerp'); ?></span>
            <span class="rate-limit-badge rate-normal"><?php esc_html_e('Normal', 'evolvewp-predictiveerp'); ?></span>
        </div>
    </div>
</div>
