<?php
/**
 * Uninstall feedback modal — collects user feedback on plugin deactivation.
 *
 * ROLE: admin-ui
 *
 * Single responsibility: Show a feedback modal when the user deactivates the
 * plugin from the Plugins screen, collect the reason, and store/email it.
 *
 * DEPENDS ON:
 *   - WordPress functions: wp_enqueue_style, wp_enqueue_script, wp_mail
 *   - EVOLVEWP_ERP_PLUGIN_FILE, EVOLVEWP_ERP_PLUGIN_BASENAME, EVOLVEWP_ERP_VERSION constants
 *
 * CONSUMED BY:
 *   - Hook: admin_footer (renders modal on plugins.php)
 *   - Hook: admin_enqueue_scripts (enqueues CSS/JS on plugins.php)
 *   - Hook: wp_ajax_evolvewp_erp_uninstall_feedback
 *
 * DATA FLOW:
 *   Input  → $_POST['reason'], $_POST['details'], $_POST['email']
 *   Output → evolvewp_erp_uninstall_feedbacks option, admin email
 *
 * @package  EvolveWP\PredictiveERP\Admin
 * @since    1.0.0
 */

namespace EvolveWP\PredictiveERP\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Deactivation feedback modal.
 *
 * @since 1.0.0
 */
class Uninstall_Feedback {

	/**
	 * Constructor — registers all hooks.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_footer', array( $this, 'render_modal' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_ajax_evolvewp_erp_uninstall_feedback', array( $this, 'handle_feedback' ) );
	}

	/**
	 * Enqueue assets only on the plugins screen.
	 *
	 * @since  1.0.0
	 * @param  string $hook Current admin page hook suffix.
	 * @return void
	 */
	public function enqueue_assets( $hook ) {
		if ( 'plugins.php' !== $hook ) {
			return;
		}

		wp_enqueue_style( 'evolvewp-predictiveerp-uninstall-feedback', plugins_url( 'assets/css/uninstall-feedback.css', EVOLVEWP_ERP_PLUGIN_FILE ), array(), EVOLVEWP_ERP_VERSION );
		wp_enqueue_script( 'evolvewp-predictiveerp-uninstall-feedback', plugins_url( 'assets/js/uninstall-feedback.js', EVOLVEWP_ERP_PLUGIN_FILE ), array( 'jquery' ), EVOLVEWP_ERP_VERSION, true );

		wp_localize_script( 'evolvewp-predictiveerp-uninstall-feedback', 'evolvewpCoreUninstall', array(
			'ajaxurl'     => admin_url( 'admin-ajax.php' ),
			'nonce'       => wp_create_nonce( 'evolvewp_erp_uninstall_feedback' ),
			'plugin_slug' => EVOLVEWP_ERP_PLUGIN_BASENAME,
		) );
	}

	/**
	 * Render the feedback modal on the plugins screen.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function render_modal() {
		$screen = get_current_screen();
		if ( ! $screen || 'plugins' !== $screen->id ) {
			return;
		}
		?>
		<div id="evolvewp-predictiveerp-uninstall-feedback-modal" style="display:none;">
			<div class="evolvewp-predictiveerp-modal-overlay"></div>
			<div class="evolvewp-predictiveerp-modal-content">
				<div class="evolvewp-predictiveerp-modal-header">
					<h2><?php esc_html_e( 'Quick Feedback', 'evolvewp-predictiveerp' ); ?></h2>
					<button class="evolvewp-predictiveerp-modal-close">&times;</button>
				</div>
				<div class="evolvewp-predictiveerp-modal-body">
					<p><?php esc_html_e( 'If you have a moment, please let us know why you\'re deactivating:', 'evolvewp-predictiveerp' ); ?></p>
					<form id="evolvewp-predictiveerp-feedback-form">
						<label class="evolvewp-predictiveerp-reason"><input type="radio" name="reason" value="temporary"><span><?php esc_html_e( 'Temporary deactivation', 'evolvewp-predictiveerp' ); ?></span></label>
						<label class="evolvewp-predictiveerp-reason"><input type="radio" name="reason" value="missing_features"><span><?php esc_html_e( 'Missing features I need', 'evolvewp-predictiveerp' ); ?></span></label>
						<label class="evolvewp-predictiveerp-reason"><input type="radio" name="reason" value="found_better"><span><?php esc_html_e( 'Found a better plugin', 'evolvewp-predictiveerp' ); ?></span></label>
						<label class="evolvewp-predictiveerp-reason"><input type="radio" name="reason" value="not_working"><span><?php esc_html_e( 'Plugin not working', 'evolvewp-predictiveerp' ); ?></span></label>
						<label class="evolvewp-predictiveerp-reason"><input type="radio" name="reason" value="too_complex"><span><?php esc_html_e( 'Too complex to use', 'evolvewp-predictiveerp' ); ?></span></label>
						<label class="evolvewp-predictiveerp-reason"><input type="radio" name="reason" value="other"><span><?php esc_html_e( 'Other', 'evolvewp-predictiveerp' ); ?></span></label>
						<div class="evolvewp-predictiveerp-details" style="display:none;">
							<textarea name="details" placeholder="<?php esc_attr_e( 'Please tell us more...', 'evolvewp-predictiveerp' ); ?>" rows="4"></textarea>
						</div>
						<div class="evolvewp-predictiveerp-email">
							<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your email (optional)', 'evolvewp-predictiveerp' ); ?>">
							<small><?php esc_html_e( 'We may follow up to help resolve issues', 'evolvewp-predictiveerp' ); ?></small>
						</div>
					</form>
				</div>
				<div class="evolvewp-predictiveerp-modal-footer">
					<button class="button button-secondary evolvewp-predictiveerp-skip"><?php esc_html_e( 'Skip & Deactivate', 'evolvewp-predictiveerp' ); ?></button>
					<button class="button button-primary evolvewp-predictiveerp-submit"><?php esc_html_e( 'Submit & Deactivate', 'evolvewp-predictiveerp' ); ?></button>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Handle the AJAX feedback submission.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function handle_feedback() {
		check_ajax_referer( 'evolvewp_erp_uninstall_feedback', 'nonce' );

		$reason  = sanitize_text_field( wp_unslash( $_POST['reason'] ?? '' ) );
		$details = sanitize_textarea_field( wp_unslash( $_POST['details'] ?? '' ) );
		$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );

		$feedback = array(
			'reason'      => $reason,
			'details'     => $details,
			'email'       => $email,
			'date'        => current_time( 'mysql' ),
			'site_url'    => get_site_url(),
			'wp_version'  => get_bloginfo( 'version' ),
			'php_version' => PHP_VERSION,
		);

		$feedbacks = get_option( 'evolvewp_erp_uninstall_feedbacks', array() );
		array_unshift( $feedbacks, $feedback );
		update_option( 'evolvewp_erp_uninstall_feedbacks', array_slice( $feedbacks, 0, 50 ) );

		$admin_email = get_option( 'admin_email' );
		$subject     = sprintf( __( '[%s] Plugin Deactivation Feedback', 'evolvewp-predictiveerp' ), get_bloginfo( 'name' ) );
		$message     = sprintf(
			"Reason: %s\n\nDetails: %s\n\nEmail: %s\n\nSite: %s\nWP: %s\nPHP: %s",
			$reason, $details, $email, get_site_url(), get_bloginfo( 'version' ), PHP_VERSION
		);

		wp_mail( $admin_email, $subject, $message );
		wp_send_json_success();
	}
}
