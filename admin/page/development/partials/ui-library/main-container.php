<?php
/**
 * EvolveWP PredictiveERP UI Library Main Container
 *
 * @package EvolveWP PredictiveERP/Admin/Views/Partials
 */

defined('ABSPATH') || exit;

$evolvewp_erp_ui_sections = array(
    'color-palette' => __('Color Palette', 'evolvewp-predictiveerp'),
    'button-components' => __('Button Components', 'evolvewp-predictiveerp'),
    'form-components' => __('Form Components', 'evolvewp-predictiveerp'),
    'notice-components' => __('Notice Components', 'evolvewp-predictiveerp'),
    'controls-actions' => __('Controls & Actions', 'evolvewp-predictiveerp'),
    'filters-search' => __('Filters & Search', 'evolvewp-predictiveerp'),
    'pagination-controls' => __('Pagination Controls', 'evolvewp-predictiveerp'),
    'progress-indicators' => __('Progress Indicators', 'evolvewp-predictiveerp'),
    'animation-showcase' => __('Animation Showcase', 'evolvewp-predictiveerp'),
    'accordion-components' => __('Accordion Components', 'evolvewp-predictiveerp'),
    'status-indicators' => __('Status Indicators', 'evolvewp-predictiveerp'),
    'data-analysis-components' => __('Data Analysis Components', 'evolvewp-predictiveerp'),
    'chart-visualization' => __('Chart Visualization', 'evolvewp-predictiveerp'),
    'modal-components' => __('Modal Components', 'evolvewp-predictiveerp'),
    'tooltips' => __('Tooltips', 'evolvewp-predictiveerp'),
    'pointers' => __('Pointers', 'evolvewp-predictiveerp')
);
?>

<div class="wrap evolvewp-predictiveerp-ui-library">
    <h1><?php esc_html_e('EvolveWP PredictiveERP UI Library', 'evolvewp-predictiveerp'); ?></h1>
    <p class="description"><?php esc_html_e('Comprehensive showcase of EvolveWP PredictiveERP UI components, styles, and interactive elements.', 'evolvewp-predictiveerp'); ?></p>
    
    <!-- Section Visibility Controls -->
    <div class="evolvewp-predictiveerp-ui-section-controls">
        <div class="evolvewp-predictiveerp-card">
            <div class="evolvewp-predictiveerp-card-header">
                <h3><?php esc_html_e('Section Visibility Controls', 'evolvewp-predictiveerp'); ?></h3>
                <div class="control-actions">
                    <button type="button" class="button button-secondary" id="show-all-sections">
                        <?php esc_html_e('Show All', 'evolvewp-predictiveerp'); ?>
                    </button>
                    <button type="button" class="button button-secondary" id="hide-all-sections">
                        <?php esc_html_e('Hide All', 'evolvewp-predictiveerp'); ?>
                    </button>
                </div>
            </div>
            <div class="evolvewp-predictiveerp-card-body">
                <p class="description">
                    <?php esc_html_e('Use these controls to show/hide specific sections while working on styles.', 'evolvewp-predictiveerp'); ?>
                </p>
                <div class="section-toggles">
                    <?php foreach ($evolvewp_erp_ui_sections as $evolvewp_erp_section_id => $evolvewp_erp_section_name) : ?>
                        <label class="section-toggle">
                            <input type="checkbox" 
                                   id="toggle-<?php echo esc_attr($evolvewp_erp_section_id); ?>" 
                                   class="section-toggle-checkbox" 
                                   data-section="<?php echo esc_attr($evolvewp_erp_section_id); ?>" 
                                   checked>
                            <span class="section-toggle-label"><?php echo esc_html($evolvewp_erp_section_name); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    $evolvewp_erp_sections = array(
        'color-palette.php',
        'button-components.php',
        'form-components.php',
        'notice-components.php',
        'controls-actions.php',
        'filters-search.php',
        'pagination-controls.php',
        'progress-indicators.php',
        'animation-showcase.php',
        'accordion-components.php',
        'status-indicators.php',
        'data-analysis-components.php',
        'chart-visualization.php',
        'modal-components.php',
        'tooltips.php',
        'pointers.php'
    );
    
    $evolvewp_erp_partials_dir = EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'admin/page/development/partials/ui-library/';
    
    foreach ($evolvewp_erp_sections as $evolvewp_erp_section) {
        $evolvewp_erp_section_id = str_replace('.php', '', $evolvewp_erp_section);
        $evolvewp_erp_section_path = $evolvewp_erp_partials_dir . $evolvewp_erp_section;
        
        echo '<div class="ui-library-section" data-section-id="' . esc_attr($evolvewp_erp_section_id) . '" id="section-' . esc_attr($evolvewp_erp_section_id) . '">';
        
        if (file_exists($evolvewp_erp_section_path)) {
            require_once $evolvewp_erp_section_path;
        } else {
            $evolvewp_erp_section_name = str_replace(array('-', '.php'), array(' ', ''), $evolvewp_erp_section);
            $evolvewp_erp_section_name = ucwords($evolvewp_erp_section_name);
            echo '<div class="evolvewp-predictiveerp-ui-section">';
            echo '<h3>' . esc_html($evolvewp_erp_section_name) . '</h3>';
            /* translators: %s: Section name */
            echo '<p>' . sprintf(esc_html__('Section "%s" is not yet available.', 'evolvewp-predictiveerp'), esc_html($evolvewp_erp_section_name)) . '</p>';
            echo '</div>';
        }
        
        echo '</div>';
    }
    ?>
</div>

<style>
.evolvewp-predictiveerp-ui-section-controls { margin: 20px 0; }
.evolvewp-predictiveerp-card { background: #fff; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); }
.evolvewp-predictiveerp-card-header { padding: 15px 20px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; }
.evolvewp-predictiveerp-card-header h3 { margin: 0; }
.evolvewp-predictiveerp-card-body { padding: 20px; }
.section-toggles { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; }
.section-toggle { display: flex; align-items: center; gap: 8px; }
.ui-library-section { margin-bottom: 30px; }
.evolvewp-predictiveerp-ui-section { padding: 20px; background: #fff; border: 1px solid #ccd0d4; }
.evolvewp-predictiveerp-ui-section h3 { margin-top: 0; border-bottom: 1px solid #ddd; padding-bottom: 10px; }
</style>

<script>
jQuery(document).ready(function($) {
    $('#show-all-sections').on('click', function() {
        $('.section-toggle-checkbox').prop('checked', true).trigger('change');
    });
    
    $('#hide-all-sections').on('click', function() {
        $('.section-toggle-checkbox').prop('checked', false).trigger('change');
    });
    
    $('.section-toggle-checkbox').on('change', function() {
        var sectionId = $(this).data('section');
        var $section = $('#section-' + sectionId);
        
        if ($(this).is(':checked')) {
            $section.show();
        } else {
            $section.hide();
        }
    });
});
</script>
