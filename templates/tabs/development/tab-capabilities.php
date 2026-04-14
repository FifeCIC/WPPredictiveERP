<?php
/**
 * Development tab — Capabilities.
 *
 * ROLE: template
 *
 * Shows all registered capabilities grouped by group key, with their
 * metadata and which roles currently have each capability.
 *
 * @package  EvolveWP PredictiveERP
 * @category Admin
 * @since    3.1.0
 */

defined( 'ABSPATH' ) || exit;

$all_caps = \EvolveWP\PredictiveERP\Core\Capability_Manager::get_all();
$groups   = \EvolveWP\PredictiveERP\Core\Capability_Manager::get_groups();

// Build a map of which roles have which caps.
$wp_roles  = wp_roles();
$role_caps = array();
foreach ( $wp_roles->role_objects as $role_slug => $role ) {
	foreach ( $all_caps as $cap_name => $cap_meta ) {
		if ( $role->has_cap( $cap_name ) ) {
			$role_caps[ $cap_name ][] = $role_slug;
		}
	}
}
?>

<div class="evolvewp-predictiveerp-admin-wrap">

	<div class="evolvewp-predictiveerp-arch-section">
		<h3><?php esc_html_e( 'Registered Capabilities', 'evolvewp-predictiveerp' ); ?></h3>
		<p>
			<?php
			printf(
				/* translators: %d: number of capabilities */
				esc_html__( '%d capabilities registered via the Capability Manager.', 'evolvewp-predictiveerp' ),
				count( $all_caps )
			);
			?>
		</p>

		<?php foreach ( $groups as $group ) :
			$group_caps = \EvolveWP\PredictiveERP\Core\Capability_Manager::get_by_group( $group );
			if ( empty( $group_caps ) ) {
				continue;
			}
		?>
			<h4 style="margin-top: 16px; text-transform: capitalize;">
				<span class="dashicons dashicons-shield" style="margin-right: 4px;"></span>
				<?php echo esc_html( $group ); ?>
			</h4>

			<table class="evolvewp-predictiveerp-table" style="margin-bottom: 20px;">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Capability', 'evolvewp-predictiveerp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Label', 'evolvewp-predictiveerp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Description', 'evolvewp-predictiveerp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Default Roles', 'evolvewp-predictiveerp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Currently Granted To', 'evolvewp-predictiveerp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $group_caps as $cap_name => $cap_meta ) :
						$granted = $role_caps[ $cap_name ] ?? array();
					?>
					<tr>
						<td><code><?php echo esc_html( $cap_name ); ?></code></td>
						<td><?php echo esc_html( $cap_meta['label'] ); ?></td>
						<td class="description"><?php echo esc_html( $cap_meta['description'] ); ?></td>
						<td>
							<?php foreach ( $cap_meta['grant_to'] as $role ) : ?>
								<span class="evolvewp-predictiveerp-badge"><?php echo esc_html( $role ); ?></span>
							<?php endforeach; ?>
						</td>
						<td>
							<?php if ( empty( $granted ) ) : ?>
								<em class="evolvewp-predictiveerp-text-muted"><?php esc_html_e( 'None', 'evolvewp-predictiveerp' ); ?></em>
							<?php else : ?>
								<?php foreach ( $granted as $role ) : ?>
									<span class="evolvewp-predictiveerp-badge evolvewp-predictiveerp-status-success"><?php echo esc_html( $role ); ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endforeach; ?>
	</div>

	<div class="evolvewp-predictiveerp-arch-section" style="margin-top: 20px;">
		<h3><?php esc_html_e( 'How Capabilities Work', 'evolvewp-predictiveerp' ); ?></h3>

		<div class="evolvewp-predictiveerp-arch-flow">
			<div class="evolvewp-predictiveerp-arch-step">
				<div class="evolvewp-predictiveerp-arch-step-number">1</div>
				<div class="evolvewp-predictiveerp-arch-step-content">
					<strong><?php esc_html_e( 'Register', 'evolvewp-predictiveerp' ); ?></strong>
					<p><?php esc_html_e( 'Capability_Manager::register() declares a capability with metadata during plugin init.', 'evolvewp-predictiveerp' ); ?></p>
				</div>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<div class="evolvewp-predictiveerp-arch-step-number">2</div>
				<div class="evolvewp-predictiveerp-arch-step-content">
					<strong><?php esc_html_e( 'Install', 'evolvewp-predictiveerp' ); ?></strong>
					<p><?php esc_html_e( 'On plugin activation, Install::create_roles() calls Capability_Manager::install() to add caps to WordPress roles.', 'evolvewp-predictiveerp' ); ?></p>
				</div>
			</div>
			<div class="evolvewp-predictiveerp-arch-step">
				<div class="evolvewp-predictiveerp-arch-step-number">3</div>
				<div class="evolvewp-predictiveerp-arch-step-content">
					<strong><?php esc_html_e( 'Check', 'evolvewp-predictiveerp' ); ?></strong>
					<p><?php esc_html_e( 'evolvewp_erp_user_can() checks capabilities at runtime. The evolvewp_erp_user_can filter allows EvolveWP PredictiveERP to override.', 'evolvewp-predictiveerp' ); ?></p>
				</div>
			</div>
		</div>
	</div>

</div>
