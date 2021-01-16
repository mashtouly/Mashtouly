<?php

	$args = array('status'	=>	'approve');
	$count = 0;
	$comments = get_comments($args);
	foreach ($comments as $comment) {
		$id = $comment->comment_post_ID;
		if (! in_category('aoza',$id)) {
			continue;
		}
		$count++;
	}

	$posts = get_queried_object();
	$post_count = $posts->count;
?>

<div class="all-widgets">
	<div class="widget">
		<h4>Stat</h4>
		<ul>
			<li>Comments Count : <?php echo $count ?></li>
			<li>Posts Count : <?php echo $post_count ?></li>
		</ul>
	</div>
	<div class="widget">
		<h4>Latest Test Article</h4>
		<ul>
			<?php
				$args = array('posts_per_page'	=>	5 , 'cat'	=>	3);
				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post() ?>
					<li>
					<a href="<?php echo the_permalink() ?>" target="_blank"><?php the_title() ?> </a>
					</li>
			<?php
					}
					wp_reset_postdata();
				}
			?>

		</ul>
	</div>
	<div class="widget">
		<h4>Hot Articles</h4>
		<ul>
			<?php
				$args = array('posts_per_page'	=>	5 , 'orderby'	=>	'comment_count');
				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post() ?>
					<li>
					<a href="<?php echo the_permalink() ?>" target="_blank"><?php the_title() ?> </a>
					</li>
			<?php
					}
					wp_reset_postdata();
				}
			?>

		</ul>
	</div>
</div>