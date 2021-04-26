<?php
//custom ajax request to load restaraunts
add_action('wp_ajax_changepage','custom_changepage');
add_action('wp_ajax_nopriv_changepage','custom_changepage');
function custom_changepage(){
	?>
	<table class="table table-list table-inner__table">
		<?php
		$start = $_POST['start'] ?  $_POST['start'] : '20000000';
		$end = $_POST['end'] ?  $_POST['end'] : '30000000';

		$ifexistid = '!=';
		if($_POST['id']){
			$ifexistid = '=';
		}

		$default_posts_per_page = get_option( 'posts_per_page' );

		get_template_part( 'loop-templates/content', 'tablehead' );

		$args = array(
			'posts_per_page' => $default_posts_per_page,
			'post_type' => 'restaraunt',
			'offset' => $_POST['countOfPosts'],
			's' => $_POST['search'],
			'meta_query'	=> array(
				'relation'		=> 'AND',
				array(
					'key'		=> 'status',
					'value'		=> $_POST['id'],
					'compare'	=> $ifexistid
				),
				array(
					'key'		=> 'start_date',
					'value'		=> $start,
					'type'		=> 'DATE',
					'compare'	=> '>='
				),
				array(
					'key'		=> 'end_date',
					'value'		=> $end,
					'type'		=> 'DATE',
					'compare'	=> '<='
				)
			)
		);
		$query = new WP_Query( $args );
		if ($query->have_posts()):
			while ($query->have_posts()):
				$query->the_post();
				get_template_part( 'loop-templates/content', 'restaraunt' );
			endwhile;
			wp_reset_postdata();
		else:
			get_template_part( 'loop-templates/content', 'none');
		endif;
		?>
	</table><!-- .table-list -->

	<?php
	echo $data;
	die;
}