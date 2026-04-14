<?php
/**
 * Dashboard Widgets
 * 
 * @package EvolveWP PredictiveERP
 */

defined( 'ABSPATH' ) || die;

class EvolveWP_ERP_Dashboard_Widgets {
    
    public function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'add_widgets' ) );
    }
    
    public function add_widgets() {
        wp_add_dashboard_widget(
            'evolvewp_erp_stats_widget',
            __( 'EvolveWP PredictiveERP Stats', 'evolvewp-predictiveerp' ),
            array( $this, 'render_stats_widget' )
        );
        
        wp_add_dashboard_widget(
            'evolvewp_erp_quick_links_widget',
            __( 'EvolveWP PredictiveERP Quick Links', 'evolvewp-predictiveerp' ),
            array( $this, 'render_quick_links_widget' )
        );
    }
    
    public function render_stats_widget() {
        $stats = $this->get_plugin_stats();
        ?>
        <div class="evolvewp-predictiveerp-dashboard-widget">
            <ul>
                <li><strong><?php esc_html_e( 'Active Features:', 'evolvewp-predictiveerp' ); ?></strong> <?php echo (int) $stats['features']; ?></li>
                <li><strong><?php esc_html_e( 'API Calls Today:', 'evolvewp-predictiveerp' ); ?></strong> <?php echo (int) $stats['api_calls']; ?></li>
                <li><strong><?php esc_html_e( 'Cache Hit Rate:', 'evolvewp-predictiveerp' ); ?></strong> <?php echo (int) $stats['cache_rate']; ?>%</li>
            </ul>
            <p><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-predictiveerp-development' ) ); ?>" class="button button-primary"><?php esc_html_e( 'View Details', 'evolvewp-predictiveerp' ); ?></a></p>
        </div>
        <?php
    }
    
    public function render_quick_links_widget() {
        ?>
        <div class="evolvewp-predictiveerp-dashboard-widget">
            <ul>
                <li><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-predictiveerp-development' ) ); ?>"><?php esc_html_e( 'Development Dashboard', 'evolvewp-predictiveerp' ); ?></a></li>
                <li><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-predictiveerp-settings' ) ); ?>"><?php esc_html_e( 'Settings', 'evolvewp-predictiveerp' ); ?></a></li>
                <li><a href="<?php echo esc_url( admin_url( 'admin.php?page=evolvewp-predictiveerp-learning' ) ); ?>"><?php esc_html_e( 'Learning Centre', 'evolvewp-predictiveerp' ); ?></a></li>
            </ul>
        </div>
        <?php
    }
    
    private function get_plugin_stats() {
        return array(
            'features' => 5,
            'api_calls' => wp_cache_get( 'evolvewp_erp_api_calls_today' ) ?: 0,
            'cache_rate' => 85
        );
    }
}

return new EvolveWP_ERP_Dashboard_Widgets();
