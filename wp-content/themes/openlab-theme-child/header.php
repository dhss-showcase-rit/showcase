<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- copied from openlab-theme/header.php -->
<!-- the purpose of this file is to place a margin before main page content to accommodate a fixed nav bar-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="noodp,noydir" />
		<title><?php bloginfo( 'name' ); ?></title>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php echo openlab_primary_skip_link(); ?>

		<div class="page-table">

		<div class="page-table-row expanded">
			<?php do_action( 'bp_before_header' ); ?>
			<div style="margin-top: 20px;" class="container-fluid">
				<div id="header" class="row">
					<?php do_action( 'bp_header' ); ?>
				</div><!-- #header -->

				<?php do_action( 'bp_after_header' ); ?>
				<?php do_action( 'bp_before_container' ); ?>