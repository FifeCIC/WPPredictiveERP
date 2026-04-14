<?php
/**
 * Example Test Case
 *
 * @package EvolveWP PredictiveERP/Tests
 */

class EvolveWP_ERP_Test_Example extends WP_UnitTestCase {
    
    public function test_plugin_activated() {
        $this->assertTrue(function_exists('EvolveWP PredictiveERP'));
    }
    
    public function test_version_constant() {
        $this->assertTrue(defined('EVOLVEWP_ERP_VERSION'));
    }
}
