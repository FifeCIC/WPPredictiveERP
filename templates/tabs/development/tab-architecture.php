<?php
/**
 * Architecture tab — plugin structure, data flow, and key functions reference.
 *
 * ROLE: template
 *
 * Displays the plugin's internal architecture using three reusable UI patterns:
 * 1. Data storage display (JSON/option structure with annotations)
 * 2. Button behaviour table (action → handler → data effect)
 * 3. Data flow diagram (numbered steps with split branches)
 *
 * Every plugin cloned from EvolveWP PredictiveERP gets this tab and replaces the content
 * with its own architecture.
 *
 * @package  EvolveWP PredictiveERP
 * @since    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="evolvewp-predictiveerp-arch-intro">
	<p><?php esc_html_e( 'This tab documents the internal architecture of the plugin — how data flows, where files live, and what each key class does. Useful for developers and AI assistants navigating the codebase.', 'evolvewp-predictiveerp' ); ?></p>
</div>

<!-- Two Column Layout -->
<div class="evolvewp-predictiveerp-arch-grid">

	<!-- Left: Namespace Map -->
	<div class="evolvewp-predictiveerp-arch-panel">
		<h3><?php esc_html_e( 'Namespace Map', 'evolvewp-predictiveerp' ); ?> <span class="evolvewp-predictiveerp-help-tip" data-tooltip="<?php esc_attr_e( 'PSR-4 autoloading maps each namespace to a directory under includes/. Composer resolves class names to file paths automatically.', 'evolvewp-predictiveerp' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
		<div class="evolvewp-predictiveerp-arch-flow">
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>EvolveWP PredictiveERP\Ecosystem\</strong><br>
				→ <code>includes/Ecosystem/</code><br>
				<?php esc_html_e( 'Registry, Menu_Manager, Installer', 'evolvewp-predictiveerp' ); ?>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>EvolveWP PredictiveERP\Core\</strong><br>
				→ <code>includes/Core/</code><br>
				<?php esc_html_e( 'Install, AJAX_Handler, Logger, Enhanced_Logger, Task_Scheduler', 'evolvewp-predictiveerp' ); ?>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>EvolveWP PredictiveERP\Admin\</strong><br>
				→ <code>includes/Admin/</code><br>
				<?php esc_html_e( 'Dashboard_Widgets, Notification_Bell, Uninstall_Feedback', 'evolvewp-predictiveerp' ); ?>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>EvolveWP PredictiveERP\API\</strong><br>
				→ <code>includes/API/</code><br>
				<?php esc_html_e( 'Connector_Interface, Base_API, REST_Bridge, REST_Controller', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>
	</div>

	<!-- Right: Template Map -->
	<div class="evolvewp-predictiveerp-arch-panel">
		<h3><?php esc_html_e( 'Template Structure', 'evolvewp-predictiveerp' ); ?> <span class="evolvewp-predictiveerp-help-tip" data-tooltip="<?php esc_attr_e( 'Templates are in three levels: pages/ for full admin pages, tabs/ for tab content, partials/ for reusable fragments.', 'evolvewp-predictiveerp' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
		<div class="evolvewp-predictiveerp-arch-flow">
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>templates/pages/</strong><br>
				<?php esc_html_e( 'Full admin pages — one file per menu item', 'evolvewp-predictiveerp' ); ?>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>templates/tabs/{page}/</strong><br>
				<?php esc_html_e( 'Tab content — one file per tab within a page', 'evolvewp-predictiveerp' ); ?><br>
				<?php esc_html_e( 'Example: tabs/development/tab-roadmap.php', 'evolvewp-predictiveerp' ); ?>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<strong>templates/partials/</strong><br>
				<?php esc_html_e( 'Reusable HTML fragments and UI components', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>
	</div>
</div>

<!-- Pattern 1: Data Storage Display -->
<div class="evolvewp-predictiveerp-arch-json-panel">
	<h3><?php esc_html_e( 'Data Storage & Options', 'evolvewp-predictiveerp' ); ?> <span class="evolvewp-predictiveerp-help-tip" data-tooltip="<?php esc_attr_e( 'Plugin state is stored in wp_options. Each option is prefixed with evolvewp_erp_ to avoid conflicts. The ecosystem registry persists cross-plugin state here.', 'evolvewp-predictiveerp' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
	<div class="evolvewp-predictiveerp-arch-json-files">

		<div class="evolvewp-predictiveerp-arch-json-file">
			<h5><code>evolvewp_erp_version</code> — <?php esc_html_e( 'Plugin Version', 'evolvewp-predictiveerp' ); ?></h5>
			<div class="evolvewp-predictiveerp-arch-json-content">
				<strong><?php esc_html_e( 'Type:', 'evolvewp-predictiveerp' ); ?></strong> <?php esc_html_e( 'WordPress option (string)', 'evolvewp-predictiveerp' ); ?><br>
				<strong><?php esc_html_e( 'Written by:', 'evolvewp-predictiveerp' ); ?></strong> <code>EvolveWP PredictiveERP\Core\Install::update_package_version()</code><br>
				<strong><?php esc_html_e( 'Read by:', 'evolvewp-predictiveerp' ); ?></strong> <code>EvolveWP PredictiveERP\Core\Install::check_version()</code><br>
				<strong><?php esc_html_e( 'Purpose:', 'evolvewp-predictiveerp' ); ?></strong> <?php esc_html_e( 'Triggers install routine when version changes.', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>

		<div class="evolvewp-predictiveerp-arch-json-file">
			<h5><code>evolvewp_erp_ecosystem_mode</code> — <?php esc_html_e( 'Ecosystem Status', 'evolvewp-predictiveerp' ); ?></h5>
			<div class="evolvewp-predictiveerp-arch-json-content">
				<strong><?php esc_html_e( 'Type:', 'evolvewp-predictiveerp' ); ?></strong> <?php esc_html_e( 'WordPress option (boolean)', 'evolvewp-predictiveerp' ); ?><br>
				<strong><?php esc_html_e( 'Written by:', 'evolvewp-predictiveerp' ); ?></strong> <code>EvolveWP PredictiveERP\Ecosystem\Registry::detect_ecosystem()</code><br>
				<strong><?php esc_html_e( 'Read by:', 'evolvewp-predictiveerp' ); ?></strong> <?php esc_html_e( 'Admin UI for conditional menu placement', 'evolvewp-predictiveerp' ); ?><br>
				<strong><?php esc_html_e( 'Purpose:', 'evolvewp-predictiveerp' ); ?></strong> <?php esc_html_e( 'True when 2+ EvolveWP plugins are active.', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>

		<div class="evolvewp-predictiveerp-arch-json-file">
			<h5><code>evolvewp_erp_ecosystem_plugins</code> — <?php esc_html_e( 'Registered Plugins', 'evolvewp-predictiveerp' ); ?></h5>
			<div class="evolvewp-predictiveerp-arch-json-content">
				<strong><?php esc_html_e( 'Type:', 'evolvewp-predictiveerp' ); ?></strong> <?php esc_html_e( 'WordPress option (serialized array)', 'evolvewp-predictiveerp' ); ?><br>
				<strong><?php esc_html_e( 'Written by:', 'evolvewp-predictiveerp' ); ?></strong> <code>EvolveWP PredictiveERP\Ecosystem\Registry::detect_ecosystem()</code><br>
				<strong><?php esc_html_e( 'Structure:', 'evolvewp-predictiveerp' ); ?></strong>
				<pre>{
  evolvewp-predictiveerp": {
    "name": "EvolveWP PredictiveERP",
    "version": "3.0.0",
    "has_logging": true,
    "has_cron": true,
    "has_background_tasks": true
  }
}</pre>
			</div>
		</div>

	</div>
</div>

<!-- Pattern 2: Key Functions Table -->
<div class="evolvewp-predictiveerp-arch-json-panel">
	<h3><?php esc_html_e( 'Key Functions & Classes', 'evolvewp-predictiveerp' ); ?> <span class="evolvewp-predictiveerp-help-tip" data-tooltip="<?php esc_attr_e( 'These are the core classes that every plugin inherits from EvolveWP PredictiveERP. Each has a single responsibility documented in its file header.', 'evolvewp-predictiveerp' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
	<table class="wp-list-table widefat fixed striped">
		<thead>
			<tr>
				<th style="width:30%;"><?php esc_html_e( 'Class / Function', 'evolvewp-predictiveerp' ); ?></th>
				<th style="width:25%;"><?php esc_html_e( 'File', 'evolvewp-predictiveerp' ); ?></th>
				<th style="width:45%;"><?php esc_html_e( 'Purpose', 'evolvewp-predictiveerp' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><code>EvolveWP PredictiveERP\Ecosystem\Registry</code></td>
				<td><code>includes/Ecosystem/Registry.php</code></td>
				<td><?php esc_html_e( 'Cross-plugin registration, feature detection, shared resource management.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>EvolveWP PredictiveERP\Core\Install</code></td>
				<td><code>includes/Core/Install.php</code></td>
				<td><?php esc_html_e( 'Activation, DB tables, roles, version checking, transient cleanup.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>EvolveWP PredictiveERP\Core\Logger</code></td>
				<td><code>includes/Core/Logger.php</code></td>
				<td><?php esc_html_e( 'Structured trace logging with loop detection and data-loss tracking.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>EvolveWP PredictiveERP\Core\Enhanced_Logger</code></td>
				<td><code>includes/Core/Enhanced_Logger.php</code></td>
				<td><?php esc_html_e( 'Query Monitor-style per-request logging — queries, hooks, HTTP, errors.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>EvolveWP PredictiveERP\Core\Task_Scheduler</code></td>
				<td><code>includes/Core/Task_Scheduler.php</code></td>
				<td><?php esc_html_e( 'Action Scheduler wrapper — schedule, cancel, query background jobs.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>EvolveWP PredictiveERP\API\REST_Controller</code></td>
				<td><code>includes/API/REST_Controller.php</code></td>
				<td><?php esc_html_e( 'Abstract base for REST endpoints with secure-by-default permissions.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>EvolveWP PredictiveERP\API\Base_API</code></td>
				<td><code>includes/API/Base_API.php</code></td>
				<td><?php esc_html_e( 'Abstract base for external API integrations with logging.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>evolvewp_erp_ecosystem()</code></td>
				<td><code>functions.php</code></td>
				<td><?php esc_html_e( 'Global accessor → Registry singleton.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>evolvewp_erp_log()</code></td>
				<td><code>functions.php</code></td>
				<td><?php esc_html_e( 'Global accessor → Logger singleton.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Pattern 3: Data Flow Diagram -->
<div class="evolvewp-predictiveerp-arch-json-panel">
	<h3><?php esc_html_e( 'Plugin Boot Sequence', 'evolvewp-predictiveerp' ); ?> <span class="evolvewp-predictiveerp-help-tip" data-tooltip="<?php esc_attr_e( 'The numbered steps show the exact order files load when WordPress activates the plugin. Understanding this helps debug load-order issues.', 'evolvewp-predictiveerp' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>

	<div class="evolvewp-predictiveerp-arch-data-flow">
		<div class="evolvewp-predictiveerp-arch-flow-step">
			<div class="evolvewp-predictiveerp-arch-flow-number">1</div>
			<div class="evolvewp-predictiveerp-arch-flow-content">
				<strong><?php esc_html_e( 'WordPress loads evolvewp-predictiveerp.php', 'evolvewp-predictiveerp' ); ?></strong><br>
				<?php esc_html_e( 'Constants defined → Composer autoloader loaded → functions.php loaded → loader.php loaded', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>

		<div class="evolvewp-predictiveerp-arch-flow-arrow">↓</div>

		<div class="evolvewp-predictiveerp-arch-flow-step">
			<div class="evolvewp-predictiveerp-arch-flow-number">2</div>
			<div class="evolvewp-predictiveerp-arch-flow-content">
				<strong><?php esc_html_e( 'EvolveWPPredictiveERP::__construct()', 'evolvewp-predictiveerp' ); ?></strong><br>
				<?php esc_html_e( 'define_constants() → includes() → init_hooks() → fires evolvewp_erp_loaded action', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>

		<div class="evolvewp-predictiveerp-arch-flow-arrow">↓</div>

		<div class="evolvewp-predictiveerp-arch-flow-step">
			<div class="evolvewp-predictiveerp-arch-flow-number">3</div>
			<div class="evolvewp-predictiveerp-arch-flow-content">
				<strong><?php esc_html_e( 'includes() — grouped file loading', 'evolvewp-predictiveerp' ); ?></strong><br>
				<?php esc_html_e( 'Core functions → Core classes → Libraries → Ecosystem → Features → API', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>

		<div class="evolvewp-predictiveerp-arch-flow-arrow">↓</div>

		<div class="evolvewp-predictiveerp-arch-flow-step evolvewp-predictiveerp-arch-flow-decision">
			<div class="evolvewp-predictiveerp-arch-flow-number">4</div>
			<div class="evolvewp-predictiveerp-arch-flow-content">
				<strong><?php esc_html_e( 'Request type detection', 'evolvewp-predictiveerp' ); ?></strong><br>
				<?php esc_html_e( 'is_request("admin") → load admin files on init priority 1', 'evolvewp-predictiveerp' ); ?><br>
				<?php esc_html_e( 'is_request("frontend") → load frontend scripts', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>

		<div class="evolvewp-predictiveerp-arch-flow-arrow">↓</div>

		<div class="evolvewp-predictiveerp-arch-flow-step">
			<div class="evolvewp-predictiveerp-arch-flow-number">5</div>
			<div class="evolvewp-predictiveerp-arch-flow-content">
				<strong><?php esc_html_e( 'Admin files loaded (admin requests only)', 'evolvewp-predictiveerp' ); ?></strong><br>
				<?php esc_html_e( 'admin.php → admin-menus.php → notifications → toolbars', 'evolvewp-predictiveerp' ); ?><br>
				<?php esc_html_e( 'Menus registered on admin_menu hook → pages render via callbacks', 'evolvewp-predictiveerp' ); ?>
			</div>
		</div>
	</div>
</div>

<!-- Database Tables -->
<div class="evolvewp-predictiveerp-arch-json-panel">
	<h3><?php esc_html_e( 'Database Tables', 'evolvewp-predictiveerp' ); ?> <span class="evolvewp-predictiveerp-help-tip" data-tooltip="<?php esc_attr_e( 'Custom tables created on activation via dbDelta(). All prefixed with the WordPress table prefix plus evolvewp_erp_. Dropped on uninstall.', 'evolvewp-predictiveerp' ); ?>"><span class="dashicons dashicons-editor-help"></span></span></h3>
	<table class="wp-list-table widefat fixed striped">
		<thead>
			<tr>
				<th style="width:30%;"><?php esc_html_e( 'Table', 'evolvewp-predictiveerp' ); ?></th>
				<th style="width:20%;"><?php esc_html_e( 'Created by', 'evolvewp-predictiveerp' ); ?></th>
				<th style="width:50%;"><?php esc_html_e( 'Purpose', 'evolvewp-predictiveerp' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><code>{prefix}evolvewp_erp_api_calls</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Logs every external API call with status and outcome.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}evolvewp_erp_api_endpoints</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Tracks unique API endpoints with usage counters.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}evolvewp_erp_api_errors</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Records API errors with code, message, and source location.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}evolvewp_erp_debug_logs</code></td>
				<td><code>Enhanced_Logger::create_table()</code></td>
				<td><?php esc_html_e( 'Per-request performance data — queries, hooks, memory, errors.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}evolvewp_erp_notifications</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'Admin notification queue with read/snooze/expiry tracking.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
			<tr>
				<td><code>{prefix}evolvewp_erp_ai_usage</code></td>
				<td><code>Install::create_tables()</code></td>
				<td><?php esc_html_e( 'AI provider usage tracking — tokens consumed per task type.', 'evolvewp-predictiveerp' ); ?></td>
			</tr>
		</tbody>
	</table>
</div>
