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
				<span class="pagination__numb">Page 1 of <?php echo $iterationCount;?></span>
				<ul class="pagination my-4">
					<li class="page-item"><a class="page-link" href="#"><</a></li>
					<?php 
					for($i = 1; $iterationCount>=$i; $i++){
						?>
						<li class="page-item <?php echo $i==1 ? 'active': ''; ?>"><a class="page-link" href="#"><?php echo $i; ?></a></li>
						<?php
					}
					?>
					<li class="page-item"><a class="page-link" href="#">></a></li>
				</ul>
			<?php endif; ?>
		</div><!-- .pagination-wrap -->