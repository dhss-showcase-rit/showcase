<!-- the purpose of this file is to remove the link for creating and linking a portfolio or visiting a portfolio from member profiles. -->
<!-- the purpose of this file is replace 'My Profile' and 'Member Profile' with 'Profile Menu' to avoid confusion with identically named menu options. -->
<!-- the purpose of this file is to remove the 'My Messages' option from the member profile submenu -->
<?php
// Get the displayed user's base domain
// This is required because the my-* pages aren't really displayed user pages from BP's
// point of view
$dud = bp_displayed_user_domain();
if ( ! $dud ) {
	$dud = bp_loggedin_user_domain(); // will always be the logged in user on my-*
}

if ( ( bp_is_user_activity() || ! bp_current_component() ) && ! ( strpos( $post->post_name, 'my-' ) > -1 ) ) {
	$mobile_hide = true;
	$el_id       = 'portfolio-sidebar-widget';
} else {
	$mobile_hide = false;
	$el_id       = 'portfolio-sidebar-inline-widget';
}
?>

<div class="sidebar-widget mol-menu" id="<?php echo esc_attr( $el_id ); ?>">

	<?php bp_get_template_part( 'members/single/members-sidebar-blocks' ); //openlab_members_sidebar_blocks( $mobile_hide ); /*does 1 and 2*/ ?>
	<?php bp_get_template_part( 'members/single/member-sidebar-menu' ); //openlab_member_sidebar_menu(); /*does 3*/ ?>

</div>

<?php /* End portfolio links */ ?>

<?php /* Recent Account Activity / Recent Friend Activity */ ?>

<?php
// The 'user_id' param is the displayed user, but displayed user is not set on
// my-* pages
$user_id = bp_is_user() ? bp_displayed_user_id() : bp_loggedin_user_id();

$activity_args = array(
	'user_id'     => $user_id,
	'per_page'    => openlab_is_my_profile() ? 4 : 2, // Legacy. Not sure why
	'scope'       => bp_is_user_friends() ? 'friends' : '',
	'show_hidden' => openlab_is_my_profile(),
	'primary_id'  => false,
);
?>

<?php if ( bp_is_user_friends() ) : ?>
	<h2 class="sidebar-header"><?php esc_html_e( 'Recent Friend Activity', 'commons-in-a-box' ); ?></h2>
<?php else : ?>
	<h2 class="sidebar-header"><?php esc_html_e( 'Recent Activity', 'commons-in-a-box' ); ?></h2>
<?php endif ?>

<div class="activity-wrapper">
	<?php if ( bp_has_activities( $activity_args ) ) : ?>
		<div id="activity-stream" class="activity-list item-list inline-element-list sidebar-sublinks">
			<?php
			while ( bp_activities() ) :
				bp_the_activity();
				?>
				<div class="sidebar-block activity-block">
					<div class="row activity-row">
						<div class="activity-avatar col-sm-8 col-xs-7">
							<a href="<?php bp_activity_user_link(); ?>">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo openlab_activity_user_avatar(); ?>
							</a>
						</div>

						<div class="activity-content overflow-hidden col-sm-16 col-xs-17">

							<div class="activity-header">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo openlab_get_custom_activity_action(); ?>
							</div>

						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<div id="activity-stream" class="activity-list item-list">
			<div class="sidebar-block">
				<div class="row activity-row">
					<div id="message" class="info col-sm-24">
						<p><?php esc_html_e( 'No recent activity.', 'commons-in-a-box' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
