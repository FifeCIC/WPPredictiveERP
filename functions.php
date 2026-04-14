<?php
/**
 * EvolveWP PredictiveERP global helper functions.
 *
 * ROLE: Global accessor functions for namespaced classes.
 * DEPENDS ON: EvolveWP\PredictiveERP\ namespaced classes via Composer autoloader.
 * CONSUMED BY: Any plugin or template that needs the ecosystem registry or main instance.
 * DATA FLOW: Provides shorthand access to singleton instances.
 *
 * @package  EvolveWP\PredictiveERP
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the main EvolveWP PredictiveERP plugin instance.
 *
 * Shorthand for EvolveWPPredictiveERP::instance(). Prevents the need to use
 * globals anywhere in the codebase.
 *
 * @since  1.0.0
 *
 * @return EvolveWPPredictiveERP
 */
function EvolveWPPredictiveERP() {
	return EvolveWPPredictiveERP::instance();
}

/**
 * Return the ecosystem Registry singleton.
 *
 * Global accessor for \EvolveWP\PredictiveERP\Ecosystem\Registry.
 *
 * @since  1.0.0
 *
 * @return \EvolveWP\PredictiveERP\Ecosystem\Registry
 */
function evolvewp_erp_ecosystem() {
	return \EvolveWP\PredictiveERP\Ecosystem\Registry::instance();
}

/**
 * Return the structured Logger singleton.
 *
 * Global accessor for \EvolveWP\PredictiveERP\Core\Logger.
 *
 * @since  1.0.0
 *
 * @return \EvolveWP\PredictiveERP\Core\Logger
 */
function evolvewp_erp_log() {
	return \EvolveWP\PredictiveERP\Core\Logger::instance();
}

/**
 * Record a trace entry via the structured Logger.
 *
 * Convenience shorthand for evolvewp_erp_log()->trace().
 *
 * @since  1.0.0
 *
 * @param string $type    Trace type.
 * @param string $message Description.
 * @param array  $data    Optional structured data.
 *
 * @return void
 */
function evolvewp_erp_trace( $type, $message, $data = array() ) {
	\EvolveWP\PredictiveERP\Core\Logger::instance()->trace( $type, $message, $data );
}

/**
 * Create or retrieve an API connector instance.
 *
 * Global accessor for EvolveWP_ERP_API_Factory::create_from_settings().
 *
 * @since  1.0.0
 *
 * @param string $provider_id Provider identifier (e.g. 'github', 'discord').
 * @param string $account_id  Optional. Account identifier for multi-account setups.
 *
 * @return \EvolveWP\PredictiveERP\API\Connector_Interface|\WP_Error Connector instance or error.
 */
function evolvewp_erp_connector( $provider_id, $account_id = '' ) {
	return EvolveWP_ERP_API_Factory::create_from_settings( $provider_id, $account_id );
}

/**
 * Check whether a user has a specific capability.
 *
 * Global accessor for \EvolveWP\PredictiveERP\Core\Capability_Manager::user_can().
 *
 * @since  1.0.0
 *
 * @param string   $capability Capability name to check.
 * @param int|null $user_id    User ID to check. Null = current user.
 *
 * @return bool True if the user has the capability.
 */
function evolvewp_erp_user_can( $capability, $user_id = null ) {
	return \EvolveWP\PredictiveERP\Core\Capability_Manager::user_can( $capability, $user_id );
}

/**
 * Return all registered REST Bridge endpoints.
 *
 * Global accessor for \EvolveWP\PredictiveERP\API\REST_Bridge::get_registered_endpoints().
 *
 * @since  1.0.0
 *
 * @param string $source Optional. Filter by source: 'manual', 'connector', or empty for all.
 *
 * @return array Registered endpoint metadata.
 */
function evolvewp_erp_rest_endpoints( $source = '' ) {
	return \EvolveWP\PredictiveERP\API\REST_Bridge::get_registered_endpoints( $source );
}

