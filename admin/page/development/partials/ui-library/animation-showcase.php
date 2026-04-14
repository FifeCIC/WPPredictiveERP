<?php
/**
 * UI Library Animation Showcase Partial
 *
 * @package evolvewp-predictiveerp/Admin/Views/Partials
 * @version 1.0.9
 */

defined('ABSPATH') || exit;
?>
<div class="evolvewp-predictiveerp-ui-section">
    <h3><?php esc_html_e('Animation Showcase', 'evolvewp-predictiveerp'); ?></h3>
    <p><?php esc_html_e('CSS animations and transitions for enhancing user experience and providing visual feedback.', 'evolvewp-predictiveerp'); ?></p>
    
    <div class="evolvewp-predictiveerp-component-group">
        <!-- Fade Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Fade Animations', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fade In', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card fade-in-demo" data-animation="evolvewp-predictiveerp-fade-in"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fade Out', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card fade-out-demo" data-animation="evolvewp-predictiveerp-fade-out"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Slide Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Slide Animations', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Down', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card slide-down-demo" data-animation="evolvewp-predictiveerp-slide-in-down"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Up', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card slide-up-demo" data-animation="evolvewp-predictiveerp-slide-in-up"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Left', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card slide-left-demo" data-animation="evolvewp-predictiveerp-slide-in-left"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slide Right', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card slide-right-demo" data-animation="evolvewp-predictiveerp-slide-in-right"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Continuous Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Continuous Animations', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Pulse', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-pulse"><?php esc_html_e('Pulse', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Heartbeat', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-heartbeat"><?php esc_html_e('Heartbeat', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Spin', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card">
                        <span class="dashicons dashicons-update evolvewp-predictiveerp-spin"></span>
                    </div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Bounce', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-bounce"><?php esc_html_e('Bounce', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Attention Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Attention Animations', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Shake', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card shake-demo" data-animation="evolvewp-predictiveerp-shake"><?php esc_html_e('Click Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Flash', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-flash"><?php esc_html_e('Flash', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Highlight', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card highlight-demo" data-animation="evolvewp-predictiveerp-highlight"><?php esc_html_e('Click Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Scale Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Scale Animations', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Scale In', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card scale-in-demo" data-animation="evolvewp-predictiveerp-scale-in"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Scale Out', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card scale-out-demo" data-animation="evolvewp-predictiveerp-scale-out"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Transitions -->
        <div class="component-demo">
            <h4><?php esc_html_e('Transitions', 'evolvewp-predictiveerp'); ?></h4>
            <div class="evolvewp-predictiveerp-component-showcase">
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Color Transition', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-transition-colors transition-demo"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Transform Transition', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-transition-transform transform-demo"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Fast Transition', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-transition-fast transition-demo"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
                <div class="animation-item">
                    <div class="animation-label"><?php esc_html_e('Slow Transition', 'evolvewp-predictiveerp'); ?></div>
                    <div class="evolvewp-predictiveerp-card evolvewp-predictiveerp-transition-slow transition-demo"><?php esc_html_e('Hover Me', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Sequenced Animations -->
        <div class="component-demo">
            <h4><?php esc_html_e('Sequenced Animations', 'evolvewp-predictiveerp'); ?></h4>
            <div class="animation-sequence">
                <button id="sequence-trigger" class="button button-primary"><?php esc_html_e('Start Sequence', 'evolvewp-predictiveerp'); ?></button>
                <div class="sequence-container">
                    <div class="sequence-item evolvewp-predictiveerp-delay-100"><?php esc_html_e('First', 'evolvewp-predictiveerp'); ?></div>
                    <div class="sequence-item evolvewp-predictiveerp-delay-300"><?php esc_html_e('Second', 'evolvewp-predictiveerp'); ?></div>
                    <div class="sequence-item evolvewp-predictiveerp-delay-500"><?php esc_html_e('Third', 'evolvewp-predictiveerp'); ?></div>
                    <div class="sequence-item evolvewp-predictiveerp-delay-700"><?php esc_html_e('Fourth', 'evolvewp-predictiveerp'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
