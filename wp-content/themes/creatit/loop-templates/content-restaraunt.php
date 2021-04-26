<tbody class="table-list__body" id="print-<?php echo get_the_ID(); ?>">
	<tr class="table-list__row">
		<td class="table-list__th table-list__th--checkbox"><input class="table-list__checkbox" name="all" type="checkbox" data-id="<?php echo get_the_ID(); ?>"></td>
		<td class="table-list__th table-list__th--id"><a href="<?php echo get_the_permalink(); ?>">#<?php echo get_the_ID(); ?></a></td>
		<td class="table-list__th table-list__th--name"><img src="<?php echo get_field('photo_of_restaraunt'); ?>" alt="<?php echo get_the_title(); ?>"><a href="<?php echo get_the_permalink(); ?>"><span><?php echo get_the_title(); ?></span></a></td>
		<td class="table-list__th table-list__th--status"><span class="<?php echo get_field('status'); ?>"><?php echo get_field('status'); ?></span></td>
		<td class="table-list__th table-list__th--date-st"><span><?php echo get_field('start_date'); ?></span></td>
		<td class="table-list__th table-list__th--date-end"><span><?php echo get_field('end_date'); ?></span></td>
		<td class="table-list__th table-list__th--tot"><span>HK$<?php echo get_field('total'); ?></span></td>
		<td class="table-list__th table-list__th--fees"><span>HK$<?php echo get_field('fees'); ?></span></td>
		<td class="table-list__th table-list__th--tran"><span>HK$<?php echo get_field('transfer'); ?></span></td>
		<td class="table-list__th table-list__th--ord"><span><?php echo get_field('orders'); ?></span></td>
		<td class="table-list__th table-list__th--downl"><a onclick="printDiv('print-<?php echo get_the_ID(); ?>')"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/download.png" alt=""></a></td>
	</tr><!-- .table-list__row -->
</tbody><!-- .table-list__body -->