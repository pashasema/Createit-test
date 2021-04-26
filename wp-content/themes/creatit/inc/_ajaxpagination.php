<?php
//custom ajax request to load pagination
add_action('wp_ajax_updatepage','custom_updatepage');
add_action('wp_ajax_nopriv_updatepage','custom_updatepage');
function custom_updatepage(){
	$start = $_POST['start'] ?  $_POST['start'] : '20000000';
	$end = $_POST['end'] ?  $_POST['end'] : '30000000';

	$default_posts_per_page = get_option( 'posts_per_page' );

	$ifexistid = '!=';
	if($_POST['id']){
		$ifexistid = '=';
	} 					
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'restaraunt',
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
	$count = $query->found_posts;
	if($count > $default_posts_per_page):
		$iterationCount = $count % $default_posts_per_page;?>
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
	<?php endif; ?>

	<?php
	echo $data;
	die;
}