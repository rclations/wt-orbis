<?php

$query = new WP_Query( array(
	'post_type'          => 'orbis_task',
	'posts_per_page'     => 25,
	'orbis_task_project' => get_the_ID()
) );

if ( $query->have_posts() ) : ?>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th><?php _e( 'Description', 'orbis' ); ?></th>
					<th><?php _e( 'Time', 'orbis' ); ?></th>
					<th><?php _e( 'Due', 'orbis' ); ?></th>
				</tr>
			</thead>

			<tbody>
	
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			
					<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<td>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<?php comments_number( '', '<span class="badge">1</span>', '<span class="badge">%</span>' ); ?>
						</td>
						<td class="task-time">
							<?php orbis_task_time(); ?>
						</td>
						<td>
							<?php orbis_task_due_at(); ?>
						</td>
					</tr>
			
				<?php endwhile; ?>
		
			</tbody>
		</table>
	</div>

<?php else : ?>

	<div class="content">
		<p class="alt">
			<?php _e( 'No tasks found.', 'orbis' ); ?>
		</p>
	</div>

<?php endif; wp_reset_postdata(); ?>