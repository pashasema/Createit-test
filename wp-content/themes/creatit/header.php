<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$user_ID = get_current_user_id();
$user_data = get_userdata($user_ID);
$user_name = $user_data->user_nicename;

$container = get_theme_mod( 'understrap_container_type' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action( 'wp_body_open' ); ?>

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="site table" id="page">

			<!-- ******************* The Navbar Area ******************* -->
			<div id="wrapper-navbar">

				<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">

					<div class="main-nav__inner">

						<?php the_custom_logo();?>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- The WordPress Menu goes here -->
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => '',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
						?>

					</div><!-- .main-nav__inner -->

					<?php if(is_user_logged_in()):?>

						<div class="navbar-nav">
							<a class="nav-link" href="<?php echo admin_url( 'user-edit.php?user_id=' . $user_ID, 'http' ); ?>"><?php echo $user_name; ?></a>
						</div>

					<?php endif;?>

				</nav><!-- .site-navigation -->

			</div><!-- #wrapper-navbar end -->
