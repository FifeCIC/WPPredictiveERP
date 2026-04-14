<?php
/**
 * UI Library Form Components Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.0
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Form Components', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('Standard form elements and input controls for consistent user input handling.', 'evolvewp-predictiveerp'); ?></p>

    <!-- Text Inputs -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Text Inputs', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-text-input"><?php esc_html_e('Text Input', 'evolvewp-predictiveerp'); ?></label>
                <input type="text" id="demo-text-input" class="evolvewp-predictiveerp-form-input" placeholder="<?php esc_attr_e('Enter text...', 'evolvewp-predictiveerp'); ?>">
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-email-input"><?php esc_html_e('Email Input', 'evolvewp-predictiveerp'); ?></label>
                <input type="email" id="demo-email-input" class="evolvewp-predictiveerp-form-input" placeholder="<?php esc_attr_e('user@example.com', 'evolvewp-predictiveerp'); ?>">
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-password-input"><?php esc_html_e('Password Input', 'evolvewp-predictiveerp'); ?></label>
                <input type="password" id="demo-password-input" class="evolvewp-predictiveerp-form-input" placeholder="<?php esc_attr_e('Enter password...', 'evolvewp-predictiveerp'); ?>">
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-number-input"><?php esc_html_e('Number Input', 'evolvewp-predictiveerp'); ?></label>
                <input type="number" id="demo-number-input" class="evolvewp-predictiveerp-form-input evolvewp-predictiveerp-form-input-number" min="0" max="100" value="50">
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Textarea', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-textarea"><?php esc_html_e('Description', 'evolvewp-predictiveerp'); ?></label>
                <textarea id="demo-textarea" class="evolvewp-predictiveerp-form-textarea" rows="4" placeholder="<?php esc_attr_e('Enter detailed description...', 'evolvewp-predictiveerp'); ?>"></textarea>
            </div>
        </div>
    </div>

    <!-- Select Dropdowns -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Select Dropdowns', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-select"><?php esc_html_e('Single Select', 'evolvewp-predictiveerp'); ?></label>
                <select id="demo-select" class="evolvewp-predictiveerp-form-select">
                    <option value=""><?php esc_html_e('Choose option...', 'evolvewp-predictiveerp'); ?></option>
                    <option value="option1"><?php esc_html_e('Option 1', 'evolvewp-predictiveerp'); ?></option>
                    <option value="option2"><?php esc_html_e('Option 2', 'evolvewp-predictiveerp'); ?></option>
                    <option value="option3"><?php esc_html_e('Option 3', 'evolvewp-predictiveerp'); ?></option>
                </select>
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-multiselect"><?php esc_html_e('Multi Select', 'evolvewp-predictiveerp'); ?></label>
                <select id="demo-multiselect" class="evolvewp-predictiveerp-form-select evolvewp-predictiveerp-form-select-multiple" multiple size="4">
                    <option value="apple"><?php esc_html_e('Apple', 'evolvewp-predictiveerp'); ?></option>
                    <option value="banana" selected><?php esc_html_e('Banana', 'evolvewp-predictiveerp'); ?></option>
                    <option value="cherry"><?php esc_html_e('Cherry', 'evolvewp-predictiveerp'); ?></option>
                    <option value="date" selected><?php esc_html_e('Date', 'evolvewp-predictiveerp'); ?></option>
                </select>
            </div>
        </div>
    </div>

    <!-- Checkbox and Radio Groups -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Checkbox and Radio Groups', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <fieldset class="evolvewp-predictiveerp-form-fieldset">
                    <legend class="evolvewp-predictiveerp-form-legend"><?php esc_html_e('Checkbox Group', 'evolvewp-predictiveerp'); ?></legend>
                    <div class="evolvewp-predictiveerp-form-checkbox-group">
                        <label class="evolvewp-predictiveerp-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option1" checked class="evolvewp-predictiveerp-form-checkbox">
                            <span class="evolvewp-predictiveerp-form-checkbox-text"><?php esc_html_e('Option 1', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        <label class="evolvewp-predictiveerp-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option2" class="evolvewp-predictiveerp-form-checkbox">
                            <span class="evolvewp-predictiveerp-form-checkbox-text"><?php esc_html_e('Option 2', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        <label class="evolvewp-predictiveerp-form-checkbox-label">
                            <input type="checkbox" name="demo-checkbox[]" value="option3" checked class="evolvewp-predictiveerp-form-checkbox">
                            <span class="evolvewp-predictiveerp-form-checkbox-text"><?php esc_html_e('Option 3', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <fieldset class="evolvewp-predictiveerp-form-fieldset">
                    <legend class="evolvewp-predictiveerp-form-legend"><?php esc_html_e('Radio Group', 'evolvewp-predictiveerp'); ?></legend>
                    <div class="evolvewp-predictiveerp-form-radio-group">
                        <label class="evolvewp-predictiveerp-form-radio-label">
                            <input type="radio" name="demo-radio" value="small" checked class="evolvewp-predictiveerp-form-radio">
                            <span class="evolvewp-predictiveerp-form-radio-text"><?php esc_html_e('Small', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        <label class="evolvewp-predictiveerp-form-radio-label">
                            <input type="radio" name="demo-radio" value="medium" class="evolvewp-predictiveerp-form-radio">
                            <span class="evolvewp-predictiveerp-form-radio-text"><?php esc_html_e('Medium', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                        <label class="evolvewp-predictiveerp-form-radio-label">
                            <input type="radio" name="demo-radio" value="large" class="evolvewp-predictiveerp-form-radio">
                            <span class="evolvewp-predictiveerp-form-radio-text"><?php esc_html_e('Large', 'evolvewp-predictiveerp'); ?></span>
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Form Validation States -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Validation States', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-success-input"><?php esc_html_e('Success State', 'evolvewp-predictiveerp'); ?></label>
                <input type="text" id="demo-success-input" class="evolvewp-predictiveerp-form-input evolvewp-predictiveerp-form-input-success" value="<?php esc_attr_e('Valid input', 'evolvewp-predictiveerp'); ?>">
                <div class="evolvewp-predictiveerp-form-feedback evolvewp-predictiveerp-form-feedback-success">
                    <span class="dashicons dashicons-yes-alt"></span>
                    <?php esc_html_e('This field is valid', 'evolvewp-predictiveerp'); ?>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-error-input"><?php esc_html_e('Error State', 'evolvewp-predictiveerp'); ?></label>
                <input type="text" id="demo-error-input" class="evolvewp-predictiveerp-form-input evolvewp-predictiveerp-form-input-error" value="<?php esc_attr_e('Invalid input', 'evolvewp-predictiveerp'); ?>">
                <div class="evolvewp-predictiveerp-form-feedback evolvewp-predictiveerp-form-feedback-error">
                    <span class="dashicons dashicons-dismiss"></span>
                    <?php esc_html_e('This field has an error', 'evolvewp-predictiveerp'); ?>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-warning-input"><?php esc_html_e('Warning State', 'evolvewp-predictiveerp'); ?></label>
                <input type="text" id="demo-warning-input" class="evolvewp-predictiveerp-form-input evolvewp-predictiveerp-form-input-warning" value="<?php esc_attr_e('Warning input', 'evolvewp-predictiveerp'); ?>">
                <div class="evolvewp-predictiveerp-form-feedback evolvewp-predictiveerp-form-feedback-warning">
                    <span class="dashicons dashicons-warning"></span>
                    <?php esc_html_e('This field has a warning', 'evolvewp-predictiveerp'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Input -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Search Input', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-search-input"><?php esc_html_e('Search', 'evolvewp-predictiveerp'); ?></label>
                <div class="evolvewp-predictiveerp-search-wrapper">
                    <input type="search" id="demo-search-input" class="evolvewp-predictiveerp-form-input evolvewp-predictiveerp-search-input" placeholder="<?php esc_attr_e('Search...', 'evolvewp-predictiveerp'); ?>">
                    <span class="evolvewp-predictiveerp-search-icon dashicons dashicons-search"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- File Upload -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('File Upload', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <div class="evolvewp-predictiveerp-form-row">
                <label class="evolvewp-predictiveerp-form-label" for="demo-file-input"><?php esc_html_e('File Upload', 'evolvewp-predictiveerp'); ?></label>
                <input type="file" id="demo-file-input" class="evolvewp-predictiveerp-form-file">
                <p class="evolvewp-predictiveerp-form-description"><?php esc_html_e('Choose a file to upload (max 2MB)', 'evolvewp-predictiveerp'); ?></p>
            </div>
        </div>
    </div>

    <!-- Form Layouts -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Form Layouts', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <!-- Horizontal Layout -->
            <div class="evolvewp-predictiveerp-form-layout evolvewp-predictiveerp-form-layout-horizontal">
                <h5><?php esc_html_e('Horizontal Layout', 'evolvewp-predictiveerp'); ?></h5>
                <div class="evolvewp-predictiveerp-form-row evolvewp-predictiveerp-form-row-horizontal">
                    <label class="evolvewp-predictiveerp-form-label evolvewp-predictiveerp-form-label-horizontal" for="demo-horizontal-1"><?php esc_html_e('First Name:', 'evolvewp-predictiveerp'); ?></label>
                    <input type="text" id="demo-horizontal-1" class="evolvewp-predictiveerp-form-input">
                </div>
                <div class="evolvewp-predictiveerp-form-row evolvewp-predictiveerp-form-row-horizontal">
                    <label class="evolvewp-predictiveerp-form-label evolvewp-predictiveerp-form-label-horizontal" for="demo-horizontal-2"><?php esc_html_e('Last Name:', 'evolvewp-predictiveerp'); ?></label>
                    <input type="text" id="demo-horizontal-2" class="evolvewp-predictiveerp-form-input">
                </div>
            </div>

            <!-- Inline Layout -->
            <div class="evolvewp-predictiveerp-form-layout evolvewp-predictiveerp-form-layout-inline">
                <h5><?php esc_html_e('Inline Layout', 'evolvewp-predictiveerp'); ?></h5>
                <div class="evolvewp-predictiveerp-form-row evolvewp-predictiveerp-form-row-inline">
                    <label class="evolvewp-predictiveerp-form-label evolvewp-predictiveerp-form-label-inline" for="demo-inline-1"><?php esc_html_e('City:', 'evolvewp-predictiveerp'); ?></label>
                    <input type="text" id="demo-inline-1" class="evolvewp-predictiveerp-form-input evolvewp-predictiveerp-form-input-inline">
                    <label class="evolvewp-predictiveerp-form-label evolvewp-predictiveerp-form-label-inline" for="demo-inline-2"><?php esc_html_e('State:', 'evolvewp-predictiveerp'); ?></label>
                    <select id="demo-inline-2" class="evolvewp-predictiveerp-form-select evolvewp-predictiveerp-form-select-inline">
                        <option value=""><?php esc_html_e('Select...', 'evolvewp-predictiveerp'); ?></option>
                        <option value="ca"><?php esc_html_e('California', 'evolvewp-predictiveerp'); ?></option>
                        <option value="ny"><?php esc_html_e('New York', 'evolvewp-predictiveerp'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Contact Form -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Simple Contact Form', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <form method="post" action="" class="evolvewp-predictiveerp-demo-form">
                <?php wp_nonce_field('evolvewp_erp_ui_contact_form'); ?>
                <input type="hidden" name="evolvewp_erp_form_action" value="contact_form">
                
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="contact-name"><?php esc_html_e('Name *', 'evolvewp-predictiveerp'); ?></label>
                    <input type="text" id="contact-name" name="contact_name" class="evolvewp-predictiveerp-form-input" required>
                </div>
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="contact-email"><?php esc_html_e('Email *', 'evolvewp-predictiveerp'); ?></label>
                    <input type="email" id="contact-email" name="contact_email" class="evolvewp-predictiveerp-form-input" required>
                </div>
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="contact-message"><?php esc_html_e('Message *', 'evolvewp-predictiveerp'); ?></label>
                    <textarea id="contact-message" name="contact_message" class="evolvewp-predictiveerp-form-textarea" rows="4" required></textarea>
                </div>
                <div class="evolvewp-predictiveerp-form-actions">
                    <button type="submit" class="evolvewp-predictiveerp-button evolvewp-predictiveerp-button-primary"><?php esc_html_e('Send Message', 'evolvewp-predictiveerp'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trading Settings Form -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Trading Settings Form', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <form method="post" action="" class="evolvewp-predictiveerp-demo-form">
                <?php wp_nonce_field('evolvewp_erp_ui_trading_settings'); ?>
                <input type="hidden" name="evolvewp_erp_form_action" value="trading_settings">
                
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="risk-level"><?php esc_html_e('Risk Level', 'evolvewp-predictiveerp'); ?></label>
                    <select id="risk-level" name="risk_level" class="evolvewp-predictiveerp-form-select">
                        <option value="low"><?php esc_html_e('Low Risk', 'evolvewp-predictiveerp'); ?></option>
                        <option value="medium" selected><?php esc_html_e('Medium Risk', 'evolvewp-predictiveerp'); ?></option>
                        <option value="high"><?php esc_html_e('High Risk', 'evolvewp-predictiveerp'); ?></option>
                    </select>
                </div>
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="max-investment"><?php esc_html_e('Max Investment ($)', 'evolvewp-predictiveerp'); ?></label>
                    <input type="number" id="max-investment" name="max_investment" class="evolvewp-predictiveerp-form-input" min="100" max="100000" value="5000">
                </div>
                <div class="evolvewp-predictiveerp-form-row">
                    <fieldset class="evolvewp-predictiveerp-form-fieldset">
                        <legend class="evolvewp-predictiveerp-form-legend"><?php esc_html_e('Trading Preferences', 'evolvewp-predictiveerp'); ?></legend>
                        <div class="evolvewp-predictiveerp-form-checkbox-group">
                            <label class="evolvewp-predictiveerp-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="day_trading" class="evolvewp-predictiveerp-form-checkbox">
                                <span class="evolvewp-predictiveerp-form-checkbox-text"><?php esc_html_e('Day Trading', 'evolvewp-predictiveerp'); ?></span>
                            </label>
                            <label class="evolvewp-predictiveerp-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="swing_trading" class="evolvewp-predictiveerp-form-checkbox" checked>
                                <span class="evolvewp-predictiveerp-form-checkbox-text"><?php esc_html_e('Swing Trading', 'evolvewp-predictiveerp'); ?></span>
                            </label>
                            <label class="evolvewp-predictiveerp-form-checkbox-label">
                                <input type="checkbox" name="preferences[]" value="long_term" class="evolvewp-predictiveerp-form-checkbox">
                                <span class="evolvewp-predictiveerp-form-checkbox-text"><?php esc_html_e('Long-term Investment', 'evolvewp-predictiveerp'); ?></span>
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="evolvewp-predictiveerp-form-actions">
                    <button type="submit" class="evolvewp-predictiveerp-button evolvewp-predictiveerp-button-primary"><?php esc_html_e('Save Settings', 'evolvewp-predictiveerp'); ?></button>
                    <button type="reset" class="evolvewp-predictiveerp-button evolvewp-predictiveerp-button-secondary"><?php esc_html_e('Reset', 'evolvewp-predictiveerp'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Ajax Validation Form -->
    <div class="evolvewp-predictiveerp-component-group">
        <h4><?php esc_html_e('Ajax Validation Form', 'evolvewp-predictiveerp'); ?></h4>
        <div class="evolvewp-predictiveerp-form-showcase">
            <form id="ajax-validation-form" class="evolvewp-predictiveerp-demo-form">
                <?php wp_nonce_field('evolvewp_erp_ui_ajax_validation', 'ajax_nonce'); ?>
                
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="username"><?php esc_html_e('Username *', 'evolvewp-predictiveerp'); ?></label>
                    <input type="text" id="username" name="username" class="evolvewp-predictiveerp-form-input" required>
                    <div id="username-feedback" class="evolvewp-predictiveerp-form-feedback" style="display:none;"></div>
                </div>
                <div class="evolvewp-predictiveerp-form-row">
                    <label class="evolvewp-predictiveerp-form-label" for="symbol-check"><?php esc_html_e('Stock Symbol *', 'evolvewp-predictiveerp'); ?></label>
                    <input type="text" id="symbol-check" name="symbol" class="evolvewp-predictiveerp-form-input" placeholder="AAPL" required>
                    <div id="symbol-feedback" class="evolvewp-predictiveerp-form-feedback" style="display:none;"></div>
                </div>
                <div class="evolvewp-predictiveerp-form-actions">
                    <button type="submit" class="evolvewp-predictiveerp-button evolvewp-predictiveerp-button-primary" id="ajax-submit-btn"><?php esc_html_e('Validate & Submit', 'evolvewp-predictiveerp'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        // Username validation
        $('#username').on('blur', function() {
            var username = $(this).val();
            if (username.length < 3) return;
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'evolvewp_erp_validate_username',
                    username: username,
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    var feedback = $('#username-feedback');
                    feedback.show();
                    
                    if (response.success) {
                        feedback.removeClass('evolvewp-predictiveerp-form-feedback-error')
                               .addClass('evolvewp-predictiveerp-form-feedback-success')
                               .html('<span class="dashicons dashicons-yes-alt"></span>' + response.data.message);
                        $('#username').removeClass('evolvewp-predictiveerp-form-input-error')
                                     .addClass('evolvewp-predictiveerp-form-input-success');
                    } else {
                        feedback.removeClass('evolvewp-predictiveerp-form-feedback-success')
                               .addClass('evolvewp-predictiveerp-form-feedback-error')
                               .html('<span class="dashicons dashicons-dismiss"></span>' + response.data.message);
                        $('#username').removeClass('evolvewp-predictiveerp-form-input-success')
                                     .addClass('evolvewp-predictiveerp-form-input-error');
                    }
                }
            });
        });
        
        // Symbol validation
        $('#symbol-check').on('blur', function() {
            var symbol = $(this).val().toUpperCase();
            if (symbol.length < 1) return;
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'evolvewp_erp_validate_symbol',
                    symbol: symbol,
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    var feedback = $('#symbol-feedback');
                    feedback.show();
                    
                    if (response.success) {
                        feedback.removeClass('evolvewp-predictiveerp-form-feedback-error')
                               .addClass('evolvewp-predictiveerp-form-feedback-success')
                               .html('<span class="dashicons dashicons-yes-alt"></span>' + response.data.message);
                        $('#symbol-check').removeClass('evolvewp-predictiveerp-form-input-error')
                                         .addClass('evolvewp-predictiveerp-form-input-success');
                    } else {
                        feedback.removeClass('evolvewp-predictiveerp-form-feedback-success')
                               .addClass('evolvewp-predictiveerp-form-feedback-error')
                               .html('<span class="dashicons dashicons-dismiss"></span>' + response.data.message);
                        $('#symbol-check').removeClass('evolvewp-predictiveerp-form-input-success')
                                         .addClass('evolvewp-predictiveerp-form-input-error');
                    }
                }
            });
        });
        
        // Form submission
        $('#ajax-validation-form').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'evolvewp_erp_submit_ajax_form',
                    username: $('#username').val(),
                    symbol: $('#symbol-check').val(),
                    nonce: $('#ajax_nonce').val()
                },
                success: function(response) {
                    if (response.success) {
                        alert('Form submitted successfully: ' + response.data.message);
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                }
            });
        });
    });
    </script>
</div>
