<?php
/**
 * EvolveWP PredictiveERP Business Onboarding Wizard.
 *
 * ROLE: admin-ui
 *
 * Collects company information on first activation that powers all ecosystem
 * plugins. Stores data in evolvewp_companies and evolvewp_contacts tables.
 *
 * DEPENDS ON:
 *   - EvolveWP\Core\Database\Tables\Companies_Query
 *   - EvolveWP\Core\Database\Tables\Contacts_Query
 *   - EvolveWP\PredictiveERP\Core\Settings
 *   - EvolveWP\PredictiveERP\Core\Audit
 *
 * CONSUMED BY:
 *   - loader.php (instantiated during admin file loading)
 *   - Hook: admin_menu, admin_init
 *
 * @package  EvolveWP\PredictiveERP\Admin
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EvolveWP_ERP_Admin_Setup_Wizard' ) ) :

/**
 * Business onboarding wizard for the EvolveWP ecosystem.
 *
 * @since 1.0.0
 */
class EvolveWP_ERP_Admin_Setup_Wizard {

	/** @var string Current step key. */
	private $step = '';

	/** @var array Wizard steps. */
	private $steps = array();

	/**
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( apply_filters( 'evolvewp_erp_enable_setup_wizard', true ) && current_user_can( 'manage_options' ) ) {
			add_action( 'admin_menu', array( $this, 'admin_menus' ) );
			add_action( 'admin_init', array( $this, 'setup_wizard' ) );
		}
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_menus() {
		add_dashboard_page( '', '', 'manage_options', 'evolvewp-predictiveerp-setup', '' );
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	private function step_nonce_action() {
		return 'evolvewp_erp_wizard_step_navigation';
	}

	/**
	 * Main wizard controller.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard() {
		$screen = get_current_screen();
		if ( ! $screen || 'dashboard_page_evolvewp-predictiveerp-setup' !== $screen->id ) {
			return;
		}

		$this->steps = array(
			'introduction' => array(
				'name'    => __( 'Welcome', 'evolvewp-predictiveerp' ),
				'view'    => array( $this, 'step_introduction' ),
				'handler' => '',
			),
			'company' => array(
				'name'    => __( 'Company', 'evolvewp-predictiveerp' ),
				'view'    => array( $this, 'step_company' ),
				'handler' => array( $this, 'step_company_save' ),
			),
			'financial' => array(
				'name'    => __( 'Financial', 'evolvewp-predictiveerp' ),
				'view'    => array( $this, 'step_financial' ),
				'handler' => array( $this, 'step_financial_save' ),
			),
			'team' => array(
				'name'    => __( 'Team', 'evolvewp-predictiveerp' ),
				'view'    => array( $this, 'step_team' ),
				'handler' => array( $this, 'step_team_save' ),
			),
			'ready' => array(
				'name'    => __( 'Ready!', 'evolvewp-predictiveerp' ),
				'view'    => array( $this, 'step_ready' ),
				'handler' => '',
			),
		);

		$nonce = isset( $_GET['_wpnonce'] ) ? sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ) : '';
		$nonce_valid = wp_verify_nonce( $nonce, $this->step_nonce_action() );

		$this->step = ( $nonce_valid && isset( $_GET['step'] ) )
			? sanitize_key( wp_unslash( $_GET['step'] ) )
			: current( array_keys( $this->steps ) );

		wp_enqueue_style( 'evolvewp_erp_admin_styles', EvolveWPPredictiveERP()->plugin_url() . '/assets/css/admin.css', array(), EVOLVEWP_ERP_VERSION );
		wp_enqueue_style( 'evolvewp-predictiveerp-setup', EvolveWPPredictiveERP()->plugin_url() . '/assets/css/evolvewp-predictiveerp-setup.css', array( 'dashicons', 'install' ), EVOLVEWP_ERP_VERSION );

		if ( ! empty( $_POST['save_step'] ) && isset( $this->steps[ $this->step ]['handler'] ) ) {
			call_user_func( $this->steps[ $this->step ]['handler'] );
		}

		ob_start();
		$this->setup_wizard_header();
		$this->setup_wizard_steps();
		$this->setup_wizard_content();
		$this->setup_wizard_footer();
		exit;
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	public function get_next_step_link() {
		$keys = array_keys( $this->steps );
		$next = $keys[ array_search( $this->step, $keys, true ) + 1 ];
		return wp_nonce_url( add_query_arg( 'step', $next ), $this->step_nonce_action() );
	}

	/**
	 * @since 1.0.0
	 * @return string
	 */
	public function get_prev_step_link() {
		$keys = array_keys( $this->steps );
		$idx  = array_search( $this->step, $keys, true );
		if ( $idx <= 0 ) {
			return '';
		}
		return wp_nonce_url( add_query_arg( 'step', $keys[ $idx - 1 ] ), $this->step_nonce_action() );
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_header() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<head>
			<meta name="viewport" content="width=device-width" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title><?php esc_html_e( 'EvolveWP PredictiveERP &rsaquo; Setup', 'evolvewp-predictiveerp' ); ?></title>
			<?php wp_print_styles( 'evolvewp-predictiveerp-setup' ); ?>
			<?php wp_print_styles( 'evolvewp_erp_admin_styles' ); ?>
		</head>
		<body class="evolvewp-predictiveerp-setup wp-core-ui">
			<h1 id="evolvewp-predictiveerp-logo"><?php esc_html_e( 'EvolveWP PredictiveERP', 'evolvewp-predictiveerp' ); ?></h1>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_footer() {
		?>
			<?php if ( 'ready' === $this->step ) : ?>
				<a class="evolvewp-predictiveerp-return-to-dashboard" href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Return to the WordPress Dashboard', 'evolvewp-predictiveerp' ); ?></a>
			<?php endif; ?>
			</body>
		</html>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_steps() {
		$output_steps = $this->steps;
		array_shift( $output_steps );
		?>
		<ol class="evolvewp-predictiveerp-setup-steps">
			<?php foreach ( $output_steps as $step_key => $step ) : ?>
				<li class="<?php
					if ( $step_key === $this->step ) {
						echo 'active';
					} elseif ( array_search( $this->step, array_keys( $this->steps ), true ) > array_search( $step_key, array_keys( $this->steps ), true ) ) {
						echo 'done';
					}
				?>"><?php echo esc_html( $step['name'] ); ?></li>
			<?php endforeach; ?>
		</ol>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_wizard_content() {
		echo '<div class="evolvewp-predictiveerp-setup-content">';
		if ( isset( $this->steps[ $this->step ]['view'] ) ) {
			call_user_func( $this->steps[ $this->step ]['view'] );
		}
		echo '</div>';
	}

	// -------------------------------------------------------------------------
	// Step 1: Introduction
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_introduction() {
		?>
		<h1><?php esc_html_e( 'Welcome to EvolveWP', 'evolvewp-predictiveerp' ); ?></h1>
		<p><?php esc_html_e( 'This wizard collects your company information to power the EvolveWP ecosystem. It takes about two minutes.', 'evolvewp-predictiveerp' ); ?></p>
		<p class="evolvewp-predictiveerp-setup-actions step">
			<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button-primary button button-large button-next"><?php esc_html_e( "Let's Go!", 'evolvewp-predictiveerp' ); ?></a>
			<a href="<?php echo esc_url( admin_url() ); ?>" class="button button-large"><?php esc_html_e( 'Not right now', 'evolvewp-predictiveerp' ); ?></a>
		</p>
		<?php
	}

	// -------------------------------------------------------------------------
	// Step 2: Company Basics
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_company() {
		?>
		<h1><?php esc_html_e( 'Company Details', 'evolvewp-predictiveerp' ); ?></h1>
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="company_name"><?php esc_html_e( 'Company Name', 'evolvewp-predictiveerp' ); ?> <span class="required">*</span></label></th>
					<td><input type="text" id="company_name" name="company_name" class="input-text" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_number"><?php esc_html_e( 'Company Number', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><input type="text" id="company_number" name="company_number" class="input-text" placeholder="<?php esc_attr_e( '8 digits (UK)', 'evolvewp-predictiveerp' ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_type"><?php esc_html_e( 'Company Type', 'evolvewp-predictiveerp' ); ?></label></th>
					<td>
						<select id="company_type" name="company_type">
							<option value=""><?php esc_html_e( 'Select...', 'evolvewp-predictiveerp' ); ?></option>
							<option value="limited"><?php esc_html_e( 'Limited Company', 'evolvewp-predictiveerp' ); ?></option>
							<option value="cic"><?php esc_html_e( 'Community Interest Company', 'evolvewp-predictiveerp' ); ?></option>
							<option value="partnership"><?php esc_html_e( 'Partnership', 'evolvewp-predictiveerp' ); ?></option>
							<option value="sole_trader"><?php esc_html_e( 'Sole Trader', 'evolvewp-predictiveerp' ); ?></option>
							<option value="non_profit"><?php esc_html_e( 'Non-Profit / Charity', 'evolvewp-predictiveerp' ); ?></option>
							<option value="other"><?php esc_html_e( 'Other', 'evolvewp-predictiveerp' ); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="company_email"><?php esc_html_e( 'Email', 'evolvewp-predictiveerp' ); ?> <span class="required">*</span></label></th>
					<td><input type="email" id="company_email" name="company_email" class="input-text" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_phone"><?php esc_html_e( 'Phone', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><input type="text" id="company_phone" name="company_phone" class="input-text" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_website"><?php esc_html_e( 'Website', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><input type="url" id="company_website" name="company_website" class="input-text" value="<?php echo esc_attr( home_url() ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="company_address"><?php esc_html_e( 'Address', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><textarea id="company_address" name="company_address" class="input-text" rows="3"></textarea></td>
				</tr>
			</table>
			<p class="evolvewp-predictiveerp-setup-actions step">
				<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'evolvewp-predictiveerp' ); ?>" name="save_step" />
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php esc_html_e( 'Skip', 'evolvewp-predictiveerp' ); ?></a>
				<?php wp_nonce_field( 'evolvewp-predictiveerp-setup' ); ?>
			</p>
		</form>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_company_save() {
		check_admin_referer( 'evolvewp-predictiveerp-setup' );

		$query = new \EvolveWP\Core\Database\Tables\Companies_Query();

		$company_id = $query->insert( array(
			'name'           => sanitize_text_field( wp_unslash( $_POST['company_name'] ?? '' ) ),
			'company_number' => sanitize_text_field( wp_unslash( $_POST['company_number'] ?? '' ) ),
			'company_type'   => sanitize_text_field( wp_unslash( $_POST['company_type'] ?? '' ) ),
			'email'          => sanitize_email( wp_unslash( $_POST['company_email'] ?? '' ) ),
			'phone'          => sanitize_text_field( wp_unslash( $_POST['company_phone'] ?? '' ) ),
			'website'        => esc_url_raw( wp_unslash( $_POST['company_website'] ?? '' ) ),
			'address'        => sanitize_textarea_field( wp_unslash( $_POST['company_address'] ?? '' ) ),
			'status'         => 'active',
			'created_at'     => gmdate( 'Y-m-d H:i:s' ),
			'created_by'     => get_current_user_id(),
		) );

		if ( $company_id ) {
			update_option( 'evolvewp_erp_primary_company_id', $company_id );

			\EvolveWP\PredictiveERP\Core\Audit::log( array(
				'event_type'     => 'created',
				'event_category' => 'data',
				'plugin_slug'    => 'evolvewp-predictiveerp',
				'object_type'    => 'company',
				'object_id'      => $company_id,
				'object_label'   => sanitize_text_field( wp_unslash( $_POST['company_name'] ?? '' ) ),
				'description'    => 'Company created via onboarding wizard.',
			) );
		}

		wp_safe_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}

	// -------------------------------------------------------------------------
	// Step 3: Financial Configuration
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_financial() {
		?>
		<h1><?php esc_html_e( 'Financial Configuration', 'evolvewp-predictiveerp' ); ?></h1>
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="financial_year_start"><?php esc_html_e( 'Financial Year Start', 'evolvewp-predictiveerp' ); ?></label></th>
					<td>
						<select id="financial_year_start" name="financial_year_start">
							<?php for ( $m = 1; $m <= 12; $m++ ) : ?>
								<option value="<?php echo esc_attr( $m ); ?>" <?php selected( $m, 4 ); ?>><?php echo esc_html( gmdate( 'F', mktime( 0, 0, 0, $m, 1 ) ) ); ?></option>
							<?php endfor; ?>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="tax_id"><?php esc_html_e( 'Tax ID / UTR', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><input type="text" id="tax_id" name="tax_id" class="input-text" placeholder="<?php esc_attr_e( '10 digits (optional)', 'evolvewp-predictiveerp' ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="currency"><?php esc_html_e( 'Currency', 'evolvewp-predictiveerp' ); ?></label></th>
					<td>
						<select id="currency" name="currency">
							<option value="GBP" selected>GBP (£)</option>
							<option value="USD">USD ($)</option>
							<option value="EUR">EUR (€)</option>
						</select>
					</td>
				</tr>
			</table>
			<p class="evolvewp-predictiveerp-setup-actions step">
				<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'evolvewp-predictiveerp' ); ?>" name="save_step" />
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php esc_html_e( 'Skip', 'evolvewp-predictiveerp' ); ?></a>
				<?php if ( $this->get_prev_step_link() ) : ?>
					<a href="<?php echo esc_url( $this->get_prev_step_link() ); ?>" class="button button-large"><?php esc_html_e( 'Back', 'evolvewp-predictiveerp' ); ?></a>
				<?php endif; ?>
				<?php wp_nonce_field( 'evolvewp-predictiveerp-setup' ); ?>
			</p>
		</form>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_financial_save() {
		check_admin_referer( 'evolvewp-predictiveerp-setup' );

		$month = absint( $_POST['financial_year_start'] ?? 4 );
		update_option( 'evolvewp_erp_financial_year_start', $month );
		update_option( 'evolvewp_erp_tax_id', sanitize_text_field( wp_unslash( $_POST['tax_id'] ?? '' ) ) );

		$currency = sanitize_text_field( wp_unslash( $_POST['currency'] ?? 'GBP' ) );
		\EvolveWP\PredictiveERP\Core\Settings::set( 'evolvewp-predictiveerp', 'currency', $currency );

		wp_safe_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}

	// -------------------------------------------------------------------------
	// Step 4: Team & Directors
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_team() {
		?>
		<h1><?php esc_html_e( 'Team & Directors', 'evolvewp-predictiveerp' ); ?></h1>
		<p><?php esc_html_e( 'Add at least one director or key person. You can add more later.', 'evolvewp-predictiveerp' ); ?></p>
		<form method="post">
			<table class="form-table">
				<tr>
					<th scope="row"><label for="director_first_name"><?php esc_html_e( 'First Name', 'evolvewp-predictiveerp' ); ?> <span class="required">*</span></label></th>
					<td><input type="text" id="director_first_name" name="director_first_name" class="input-text" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="director_last_name"><?php esc_html_e( 'Last Name', 'evolvewp-predictiveerp' ); ?> <span class="required">*</span></label></th>
					<td><input type="text" id="director_last_name" name="director_last_name" class="input-text" required /></td>
				</tr>
				<tr>
					<th scope="row"><label for="director_email"><?php esc_html_e( 'Email', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><input type="email" id="director_email" name="director_email" class="input-text" value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="director_role"><?php esc_html_e( 'Position', 'evolvewp-predictiveerp' ); ?></label></th>
					<td><input type="text" id="director_role" name="director_role" class="input-text" placeholder="<?php esc_attr_e( 'e.g. Director, CEO, Owner', 'evolvewp-predictiveerp' ); ?>" /></td>
				</tr>
			</table>
			<p class="evolvewp-predictiveerp-setup-actions step">
				<input type="submit" class="button-primary button button-large button-next" value="<?php esc_attr_e( 'Continue', 'evolvewp-predictiveerp' ); ?>" name="save_step" />
				<a href="<?php echo esc_url( $this->get_next_step_link() ); ?>" class="button button-large button-next"><?php esc_html_e( 'Skip', 'evolvewp-predictiveerp' ); ?></a>
				<?php if ( $this->get_prev_step_link() ) : ?>
					<a href="<?php echo esc_url( $this->get_prev_step_link() ); ?>" class="button button-large"><?php esc_html_e( 'Back', 'evolvewp-predictiveerp' ); ?></a>
				<?php endif; ?>
				<?php wp_nonce_field( 'evolvewp-predictiveerp-setup' ); ?>
			</p>
		</form>
		<?php
	}

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_team_save() {
		check_admin_referer( 'evolvewp-predictiveerp-setup' );

		$company_id = get_option( 'evolvewp_erp_primary_company_id', 0 );

		if ( $company_id ) {
			$query = new \EvolveWP\Core\Database\Tables\Contacts_Query();

			$query->insert( array(
				'company_id' => $company_id,
				'first_name' => sanitize_text_field( wp_unslash( $_POST['director_first_name'] ?? '' ) ),
				'last_name'  => sanitize_text_field( wp_unslash( $_POST['director_last_name'] ?? '' ) ),
				'email'      => sanitize_email( wp_unslash( $_POST['director_email'] ?? '' ) ),
				'role'       => sanitize_text_field( wp_unslash( $_POST['director_role'] ?? '' ) ),
				'is_primary' => 1,
				'status'     => 'active',
				'created_at' => gmdate( 'Y-m-d H:i:s' ),
				'created_by' => get_current_user_id(),
			) );
		}

		wp_safe_redirect( esc_url_raw( $this->get_next_step_link() ) );
		exit;
	}

	// -------------------------------------------------------------------------
	// Step 5: Ready
	// -------------------------------------------------------------------------

	/**
	 * @since 1.0.0
	 * @return void
	 */
	public function step_ready() {
		update_option( 'evolvewp_onboarding_complete', true );

		if ( class_exists( 'EvolveWP_ERP_Admin_Notices' ) ) {
			EvolveWP_ERP_Admin_Notices::remove_notice( 'install' );
		}

		\EvolveWP\PredictiveERP\Core\Audit::log( array(
			'event_type'     => 'setting_changed',
			'event_category' => 'system',
			'plugin_slug'    => 'evolvewp-predictiveerp',
			'object_type'    => 'setting',
			'object_label'   => 'onboarding_complete',
			'description'    => 'Business onboarding wizard completed.',
		) );
		?>
		<h1><?php esc_html_e( 'EvolveWP is Ready!', 'evolvewp-predictiveerp' ); ?></h1>
		<p><?php esc_html_e( 'Your company information has been saved. You can update it anytime from the EvolveWP settings.', 'evolvewp-predictiveerp' ); ?></p>
		<div class="evolvewp-predictiveerp-setup-next-steps">
			<div class="evolvewp-predictiveerp-setup-next-steps-first">
				<h2><?php esc_html_e( 'Next Steps', 'evolvewp-predictiveerp' ); ?></h2>
				<ul>
					<li class="setup-thing"><a class="button button-primary button-large" href="<?php echo esc_url( admin_url( 'options-general.php?page=evolvewp-predictiveerp-settings' ) ); ?>"><?php esc_html_e( 'Go to Settings', 'evolvewp-predictiveerp' ); ?></a></li>
				</ul>
			</div>
		</div>
		<?php
	}
}

endif;

new EvolveWP_ERP_Admin_Setup_Wizard();
