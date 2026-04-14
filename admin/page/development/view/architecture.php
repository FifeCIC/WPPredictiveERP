<?php
/**
 * Architecture View
 * 
 * @package EvolveWP PredictiveERP
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once EVOLVEWP_ERP_PLUGIN_DIR . 'includes/classes/architecture-mapper.php';

?>

<div class="evolvewp-predictiveerp-architecture-view">
    <h2>Plugin Architecture</h2>
    <p>Visual guide to EvolveWP PredictiveERP structure for developers and AI assistants.</p>
    
    <?php EvolveWP_ERP_Architecture_Mapper::render_tree(); ?>
</div>
