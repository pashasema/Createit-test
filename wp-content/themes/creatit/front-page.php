<?php
/**
 * The frontpage for our theme
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_header(); ?>

<div class="wrapper" id="page-wrapper">

	<div class="container">

		<section class="table-inner">
			<h1 class="table-inner__title"><?php echo get_the_title(); ?></h1>
		</section><!-- .table-inner -->

		<ul class="nav nav-tabs table-inner__nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-id="">All</a>
			</li><!-- .nav-item -->
			<li class="nav-item">
				<a class="nav-link" data-id="ongoing">ongoing</a>
			</li><!-- .nav-item -->
			<li class="nav-item">
				<a class="nav-link" data-id="verified">verified</a>
			</li><!-- .nav-item -->
			<li class="nav-item">
				<a class="nav-link" data-id="pending">pending</a>
			</li><!-- .nav-item -->

			<div class="nav-tabs__item--right table-inner__item--right">

				<div class="table-inner__date input-group input-daterange">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-th"></span>
						<span class="glyphicon-text">From</span>
					</div><!-- .input-group-addon -->
					<input type="text" class="input-sm form-control table-inner__form-control--start table-inner__form-control--time" name="start" autocomplete="off" />

					<div class="form-control--btw table-inner__form-control--btw">
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/right-arrow.png" alt="arrow">
					</div><!-- .form-control--btw -->

					<input type="text" class="input-sm form-control form-control--end table-inner__form-control--end table-inner__form-control--time" name="end" autocomplete="off" />
				</div><!-- .able-inner__date -->

				<div class="form-inline form-search table-inner__form-search">
					<input class="form-control" type="search" placeholder="Search" aria-label="Search">
				</div><!-- .form-search -->

				<button class="btn btn-warning table-inner__btn">Mark as paid</button>

			</div><!-- .nav-tabs__item--right -->

		</ul><!-- nav-tabs -->

		<div class="table-inner__content">

			<table class="table table-list table-inner__table">
				<?php
				get_template_part( 'loop-templates/content', 'tablehead' );
				$default_posts_per_page = get_option( 'posts_per_page' );
				$args = array(
					'posts_per_page' => $default_posts_per_page,
					'post_type' => 'restaraunt',
				);

				$query = new WP_Query( $args );
				if ($query->have_posts()):
					while ($query->have_posts()):
						$query->the_post();
						get_template_part( 'loop-templates/content', 'restaraunt' );
					endwhile;
					wp_reset_postdata();
				else:
					get_template_part( 'loop-templates/content', 'none' );
				endif;
				?>
			</table><!-- .table-list -->

		</div><!-- .tab-pane -->

		<?php 					
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'restaraunt',
		);
		$query = new WP_Query( $args );
		$count = $query->found_posts;
		$iterationCount = $count % $default_posts_per_page;?>
		<div class="pagination-wrap">
			<?php if($iterationCount): ?>
				<span class="pagination__numb">Page <span>1</span> of <?php echo $iterationCount;?></span>
				<ul class="pagination my-4">
					<li class="page-item"><a class="page-link" data-id="start" onclick="changePage('start')"><</a></li>
					<?php for($i = 1; $iterationCount>=$i; $i++){?>
						<li class="page-item <?php echo $i==1 ? 'active': ''; ?>"><a class="page-link" data-id="<?php echo ($i-1)*$default_posts_per_page; ?>" onclick="changePage(<?php echo ($i-1)*$default_posts_per_page; ?>)"><?php echo $i; ?></a></li>
					<?php } ?>
					<li class="page-item"><a class="page-link" data-id="end" onclick="changePage('end')">></a></li>
				</ul>
			<?php endif; ?>
		</div><!-- .pagination-wrap -->

	</div><!-- .container -->

</div><!-- .wrapper -->

<?php get_footer(); ?>