<?php
/**
 * Admin Views Default Structure 
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}    
                        
?>
<div class="wrap evolvewp-predictiveerp">

    <?php
    // Establish Title — read-only navigation parameters gated behind current_user_can()
    // as this template is only included in admin context.
    $evolvewp_erp_title = '';
    if ( ! current_user_can( 'manage_options' ) ) {
        $evolvewp_erp_title = '';
    } elseif ( ! isset( $_GET['listtable'] ) ) {
        $evolvewp_erp_title = array_values( $tabs[ $current_tab ]['maintabviews'] )[0]['title'];
    } elseif ( isset( $_GET['seedview'] ) ) {
        // isset() check added — $_GET['seedview'] used as array key requires validation.
        $evolvewp_erp_seedview = sanitize_key( wp_unslash( $_GET['seedview'] ) );
        $evolvewp_erp_title    = isset( $tabs[ $current_tab ]['maintabviews'][ $evolvewp_erp_seedview ] )
            ? $tabs[ $current_tab ]['maintabviews'][ $evolvewp_erp_seedview ]['title']
            : '';
    }

    echo '<h1>EvolveWP PredictiveERP: ' . esc_html( $evolvewp_erp_title ) . '</h1>';
    ?>
    
    <!-- TABS -->
    <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
        <?php
            foreach ( $tabs as $evolvewp_erp_key => $evolvewp_erp_report_group ) {
                echo '<a href="' . esc_url( admin_url( 'admin.php?page=evolvewp-predictiveerp&tab=' . urlencode( $evolvewp_erp_key ) ) ) . '" class="nav-tab ';
                if ( $current_tab == $evolvewp_erp_key ) {
                    echo 'nav-tab-active';
                }
                echo '">' . esc_html( $evolvewp_erp_report_group[ 'title' ] ) . '</a>';
            }

            do_action( 'evolvewp_erp_mainview_tabs' );
        ?>
    </nav>
    
    
    <?php if ( sizeof( $tabs[ $current_tab ]['maintabviews'] ) > 1 ) { ?>
        <!-- SUB VIEWS (within selected tab) -->
        <ul class="subsubsub">
            <li><?php

                $evolvewp_erp_links = array();

                foreach ( $tabs[ $current_tab ]['maintabviews'] as $evolvewp_erp_key => $tab ) {

                    $link = '<a href="admin.php?page=evolvewp-predictiveerp&tab=' . urlencode( $current_tab ) . '&amp;seedview=' . urlencode( $evolvewp_erp_key ) . '" class="';
  
                    if ( $evolvewp_erp_key == $current_tablelist ) {
                        $link .= 'current';
                    }

                    $link .= '">' . $tab['title'] . '</a>';

                    $evolvewp_erp_links[] = $link;

                }

                echo wp_kses_post( implode( ' | </li><li>', $evolvewp_erp_links ) );

            ?></li>
        </ul>
        <br class="clear" />
        <?php
    }

    if ( isset( $tabs[ $current_tab ][ 'maintabviews' ][ $current_tablelist ] ) ) {

        $tabs = $tabs[ $current_tab ][ 'maintabviews' ][ $current_tablelist ];

        if ( ! isset( $tabs['hide_title'] ) || $tabs['hide_title'] != true ) {
            echo '<h1>' . esc_html( $tabs['title'] ) . '</h1>';
        } else {
            echo '<h1 class="screen-reader-text">' . esc_html( $tabs['title'] ) . '</h1>';
        }

        if ( $tabs['description'] ) {
            echo '<p>' . wp_kses_post( $tabs['description'] ) . '</p>';
        }

        if ( $tabs['callback'] && ( is_callable( $tabs['callback'] ) ) ) {
            call_user_func( $tabs['callback'], $current_tablelist );
        }
    }
    ?>
</div>
