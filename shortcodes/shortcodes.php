<?php
/**
 * EvolveWP PredictiveERP Shortcodes
 *
 * @package EvolveWP PredictiveERP/Shortcodes
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Example shortcode with template loading
 */
function evolvewp_erp_example_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Example',
        'count' => 5
    ), $atts, 'evolvewp_erp_example');
    
    // Get data
    $data = array(
        'title' => sanitize_text_field($atts['title']),
        'count' => absint($atts['count']),
        'items' => evolvewp_erp_get_example_items($atts['count'])
    );
    
    // Load template
    ob_start();
    evolvewp_erp_load_template('example', $data);
    return ob_get_clean();
}
add_shortcode('evolvewp_erp_example', 'evolvewp_erp_example_shortcode');

/**
 * Load template file
 */
function evolvewp_erp_load_template($name, $data = array()) {
    $template = EVOLVEWP_ERP_PLUGIN_DIR_PATH . 'templates/' . $name . '.php';
    
    if (file_exists($template)) {
        extract($data);
        include $template;
    }
}

/**
 * Get example items (placeholder function)
 */
function evolvewp_erp_get_example_items($count) {
    $items = array();
    for ($i = 1; $i <= $count; $i++) {
        $items[] = array(
            'id' => $i,
            'name' => 'Item ' . $i
        );
    }
    return $items;
}
