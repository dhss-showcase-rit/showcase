<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 * **************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 * **************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */
//Call the template header
get_header();
?>

<div id="content" class="hfeed row">

	<div class="col-sm-18 col-xs-24">

		<div class="entry-title">
			<h1><span class="profile-name"><?php esc_html_e( 'OpenLab Calendar: Event', 'commons-in-a-box' ); ?></span></h1>
		</div>

		<div class="action-events">
			<div id="item-body">
				<div class="submenu">
					<div class="submenu-text pull-left bold"><?php esc_html_e( 'Calenar:', 'commons-in-a-box' ); ?></div>
					<ul class="nav nav-inline"><!--
						<?php $menu_items = openlab_calendar_submenu(); ?>
						<?php foreach ( $menu_items as $item ) : ?>
							--><li class="<?php echo esc_attr( $item['class'] ); ?>" id="<?php echo esc_attr( $item['slug'] ); ?>-groups-li"><a href="<?php echo esc_attr( $item['link'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a></li><!--
						<?php endforeach; ?>
						--><li class="current-menu-item" id="single-event-name"><span><?php the_title(); ?></span></li><!--
					--></ul>
				</div>

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>

			</div>

		</div>
	</div>

	<?php get_template_part( 'parts/sidebar/about' ); ?>

</div>

<!-- Call template footer -->
<?php
get_footer();
