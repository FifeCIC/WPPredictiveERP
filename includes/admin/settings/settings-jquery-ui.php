<?php
/**
 * jQuery UI Settings Gallery
 * 
 * Examples of all jQuery UI components supported by WordPress core
 * 
 * @package EvolveWP PredictiveERP
 */

defined( 'ABSPATH' ) || die;

function evolvewp_erp_render_jquery_ui_gallery() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'jQuery UI Components Gallery', 'evolvewp-predictiveerp' ); ?></h1>
        
        <form method="post" action="">
            <?php wp_nonce_field( 'jquery_ui_demo' ); ?>
            <input type="hidden" name="evolvewp_erp_form_action" value="jquery_ui_demo">
            
            <table class="form-table">
                
                <!-- Datepicker -->
                <tr>
                    <th><?php esc_html_e( 'Datepicker', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <input type="text" id="evolvewp_erp_datepicker" name="datepicker" class="regular-text" value="<?php echo esc_attr( get_option( 'evolvewp_erp_datepicker', '' ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Click to select a date', 'evolvewp-predictiveerp' ); ?></p>
                    </td>
                </tr>
                
                <!-- Slider -->
                <tr>
                    <th><?php esc_html_e( 'Slider', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <div id="evolvewp_erp_slider"></div>
                        <input type="hidden" id="evolvewp_erp_slider_value" name="slider" value="<?php echo esc_attr( get_option( 'evolvewp_erp_slider', 50 ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Value: ', 'evolvewp-predictiveerp' ); ?><span id="slider_display">50</span></p>
                    </td>
                </tr>
                
                <!-- Progressbar -->
                <tr>
                    <th><?php esc_html_e( 'Progressbar', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <div id="evolvewp_erp_progressbar"></div>
                        <button type="button" id="progress_btn" class="button"><?php esc_html_e( 'Simulate Progress', 'evolvewp-predictiveerp' ); ?></button>
                    </td>
                </tr>
                
                <!-- Autocomplete -->
                <tr>
                    <th><?php esc_html_e( 'Autocomplete', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <input type="text" id="evolvewp_erp_autocomplete" name="autocomplete" class="regular-text" value="<?php echo esc_attr( get_option( 'evolvewp_erp_autocomplete', '' ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Type: PHP, JavaScript, WordPress, MySQL', 'evolvewp-predictiveerp' ); ?></p>
                    </td>
                </tr>
                
                <!-- Accordion -->
                <tr>
                    <th><?php esc_html_e( 'Accordion', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <div id="evolvewp_erp_accordion">
                            <h3><?php esc_html_e( 'Section 1', 'evolvewp-predictiveerp' ); ?></h3>
                            <div><p><?php esc_html_e( 'Content for section 1', 'evolvewp-predictiveerp' ); ?></p></div>
                            <h3><?php esc_html_e( 'Section 2', 'evolvewp-predictiveerp' ); ?></h3>
                            <div><p><?php esc_html_e( 'Content for section 2', 'evolvewp-predictiveerp' ); ?></p></div>
                            <h3><?php esc_html_e( 'Section 3', 'evolvewp-predictiveerp' ); ?></h3>
                            <div><p><?php esc_html_e( 'Content for section 3', 'evolvewp-predictiveerp' ); ?></p></div>
                        </div>
                    </td>
                </tr>
                
                <!-- Tabs -->
                <tr>
                    <th><?php esc_html_e( 'Tabs', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <div id="evolvewp_erp_tabs">
                            <ul>
                                <li><a href="#tab-1"><?php esc_html_e( 'Tab 1', 'evolvewp-predictiveerp' ); ?></a></li>
                                <li><a href="#tab-2"><?php esc_html_e( 'Tab 2', 'evolvewp-predictiveerp' ); ?></a></li>
                                <li><a href="#tab-3"><?php esc_html_e( 'Tab 3', 'evolvewp-predictiveerp' ); ?></a></li>
                            </ul>
                            <div id="tab-1"><p><?php esc_html_e( 'Content for tab 1', 'evolvewp-predictiveerp' ); ?></p></div>
                            <div id="tab-2"><p><?php esc_html_e( 'Content for tab 2', 'evolvewp-predictiveerp' ); ?></p></div>
                            <div id="tab-3"><p><?php esc_html_e( 'Content for tab 3', 'evolvewp-predictiveerp' ); ?></p></div>
                        </div>
                    </td>
                </tr>
                
                <!-- Dialog (Button to trigger) -->
                <tr>
                    <th><?php esc_html_e( 'Dialog', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <button type="button" id="open_dialog" class="button"><?php esc_html_e( 'Open Dialog', 'evolvewp-predictiveerp' ); ?></button>
                        <div id="evolvewp_erp_dialog" title="<?php esc_attr_e( 'Example Dialog', 'evolvewp-predictiveerp' ); ?>" style="display:none;">
                            <p><?php esc_html_e( 'This is a jQuery UI dialog example.', 'evolvewp-predictiveerp' ); ?></p>
                        </div>
                    </td>
                </tr>
                
                <!-- Sortable -->
                <tr>
                    <th><?php esc_html_e( 'Sortable', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <ul id="evolvewp_erp_sortable" style="list-style:none; padding:0;">
                            <li class="ui-state-default" style="padding:10px; margin:5px; background:#f0f0f0; cursor:move;">Item 1</li>
                            <li class="ui-state-default" style="padding:10px; margin:5px; background:#f0f0f0; cursor:move;">Item 2</li>
                            <li class="ui-state-default" style="padding:10px; margin:5px; background:#f0f0f0; cursor:move;">Item 3</li>
                        </ul>
                        <p class="description"><?php esc_html_e( 'Drag to reorder', 'evolvewp-predictiveerp' ); ?></p>
                    </td>
                </tr>
                
                <!-- Spinner -->
                <tr>
                    <th><?php esc_html_e( 'Spinner', 'evolvewp-predictiveerp' ); ?></th>
                    <td>
                        <input type="text" id="evolvewp_erp_spinner" name="spinner" value="<?php echo esc_attr( get_option( 'evolvewp_erp_spinner', 0 ) ); ?>">
                        <p class="description"><?php esc_html_e( 'Use arrows or type a number', 'evolvewp-predictiveerp' ); ?></p>
                    </td>
                </tr>
                
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Datepicker
        $('#evolvewp_erp_datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
        
        // Slider
        $('#evolvewp_erp_slider').slider({
            min: 0,
            max: 100,
            value: <?php echo (int) get_option( 'evolvewp_erp_slider', 50 ); ?>,
            slide: function(event, ui) {
                $('#slider_display').text(ui.value);
                $('#evolvewp_erp_slider_value').val(ui.value);
            }
        });
        
        // Progressbar
        $('#evolvewp_erp_progressbar').progressbar({ value: 0 });
        $('#progress_btn').click(function() {
            var val = 0;
            var interval = setInterval(function() {
                val += 10;
                $('#evolvewp_erp_progressbar').progressbar('value', val);
                if (val >= 100) clearInterval(interval);
            }, 200);
        });
        
        // Autocomplete
        $('#evolvewp_erp_autocomplete').autocomplete({
            source: ['PHP', 'JavaScript', 'WordPress', 'MySQL', 'Python', 'Ruby']
        });
        
        // Accordion
        $('#evolvewp_erp_accordion').accordion({ collapsible: true });
        
        // Tabs
        $('#evolvewp_erp_tabs').tabs();
        
        // Dialog
        $('#evolvewp_erp_dialog').dialog({ autoOpen: false, modal: true });
        $('#open_dialog').click(function() {
            $('#evolvewp_erp_dialog').dialog('open');
        });
        
        // Sortable
        $('#evolvewp_erp_sortable').sortable();
        
        // Spinner
        $('#evolvewp_erp_spinner').spinner({ min: 0, max: 100 });
    });
    </script>
    <?php
}
