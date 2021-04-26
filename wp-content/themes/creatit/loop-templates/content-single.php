<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="single-page">
		<div class="single-page__img" style="background-image: url(<?php echo get_field('photo_of_restaraunt'); ?>);"></div>
		<div class="<?php echo get_field('status'); ?>">Status: <?php echo get_field('status'); ?></div>
		<div>Start date: <?php echo get_field('start_date'); ?></div>
		<div>End date: <?php echo get_field('end_date'); ?></div>
		<div>Total price: HK$<?php echo get_field('total'); ?></div>
		<div>Fees: HK$<?php echo get_field('fees'); ?></div>
		<div>Transfer: HK$<?php echo get_field('transfer'); ?></div>
		<div>Orders: <?php echo get_field('orders'); ?></div> 
	</div>

	<footer class="entry-footer single-page__entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
