<?php get_header() ?>
	
<div class="container single-page">
	<div class="row">
		<?php
			if(have_posts())
			{
				while (have_posts()) {
					the_post();
		?>
				<div class="col-sm-8">
					<div class="single-post">
					<?php edit_post_link('Edit <i class="fa fa-pencil"></i>'); ?>
						<h2 class="post-title">
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</h2>
						<span class="post-auther">
							<i class="fa fa-user"></i>
							<?php the_author_posts_link() ?>
						</span>
						<span class="post-date">
							<i class="fa fa-calendar"></i> 
							<?php the_date('F j, Y') ?>
						</span>
						<span class="post-comment">
							<i class="fa fa-comments-o"></i> 
							<?php 
								comments_popup_link('No Comments','1 Comments','% Comments','Comment-url','Comments Off')
							?>
						</span>
						<?php 
							the_post_thumbnail('',['class'=>'img-responsive img-thumbnail post-img','alt'=>'my image'])
						?>
						<div class="post-content">
							<?php the_content() ?>	
						</div>
						<span class="post-category">
							<i class="fa fa-tags"></i>
							<?php the_category(', ') ?>
						</span>
						<span class="post-tag">
							<?php
								if(has_tag())
								{
									the_tags();
								} else {
									echo 'Tags: No Tags';
								}
							?>
						</span>
					</div>	
				</div>
				<div class="col-sm-4">
					<?php get_sidebar(); ?>
					
				</div>
	</div>
		<?php
				}
				wp_reset_postdata();	
		 	} 
		?>
		 	<div class="clearfix"></div>

		 	<?php
				$args = array(
					'posts_per_page'		=>		2,
					'orderby'				=>		'rand',
					'category__in'			=>		wp_get_post_categories(get_queried_object_id()),
					'post__not_in'			=>		array(get_queried_object_id())
					);
				$query = new WP_Query($args);
				if($query->have_posts())
				{
					while ($query->have_posts()) {
					$query->the_post();
			?>

						<h2 class="post-title">
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</h2>
						
					<div class="clearfix"></div>	
		<?php
				}	
		 	}
		 	wp_reset_postdata();
		 ?>

		 	<div class="row author-single">
			 	<div class="col-md-2">
			 		<?php
				 		echo get_avatar(get_the_author_meta('ID'),'94','','User',array('class'=>'img-responsive img-thumbnail'));
				 	?>
				</div>
				<div class="col-md-10">
				 	<span>
				 		<?php
					 		the_author_meta('first_name');
					 		the_author_meta('last_name');
					 	?>
				 	</span>
				 	<?php
				 		if (get_the_author_meta('description')) {
				 	?>
				 		<p><?php the_author_meta('description') ?></p>
				 	<?php
				 	} else {
				 		echo 'No Biography';
				 	}
				 	?>
				 	<p> <?php echo count_user_posts(get_the_author_meta('ID')).' Posts' ?> </p>	
				 	<p> <?php echo 'Visit My Profile ' ; the_author_posts_link() ?> </p>	 	
				</div>
			</div>

			<hr>

			<?php comments_template() ?>
</div>

<?php get_footer() ?>