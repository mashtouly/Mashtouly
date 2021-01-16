<?php get_header() ?>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php
				 	$args = array('class'	=>		'img-responsive img-thumbnail');
				 	echo get_avatar(get_the_author_meta('ID'),'196','','User',$args);
				 ?>
			</div>
			<div class="col-md-9">
			 	<ul class="list-unstyled">
			 		<li><?php the_author_meta('first_name') ?></li>
			 		<li><?php the_author_meta('last_name') ?></li>
			 	</ul>
			 	<hr>
			 	<?php
				 	if (get_the_author_meta('description')) { 
				 ?>
				 		<p><?php the_author_meta('description') ?></p>
				<?php 
					} else {
				?>
						<p>No Biography</p>
				<?php
				 	}
		 		?>	 	
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-3">
				<h5>Posts Count</h5>
				<span><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>
			</div>
			<div class="col-md-3">
				<h5>Comments Count</h5>
				<span>
					<?php
						$args = array('user_id'=>get_the_author_meta('ID'),'count'=>true);
						echo get_comments($args);
					?>
				</span>
			</div>
			<div class="col-md-3">
				<h5>Total Posts View</h5>
				<span>0</span>
			</div>
			<div class="col-md-3">
				<h5>Testing</h5>
				<span>0</span>
			</div>
		</div>
		<div class="row">
			<?php
				$page_count = 6;
				$args = array('author'=>get_the_author_meta('ID'),'posts_per_page'=>$page_count);
				$query = new WP_Query($args);
				if($query->have_posts())
				{
			?>
			<h4>
				Latest
					<?php
						if(count_user_posts(get_the_author_meta('ID')) < $page_count)
						{
							echo count_user_posts(get_the_author_meta('ID'));
						} else {
							echo $page_count;
						}
					?>
				Posts
			</h4>

			<?php
				while ($query->have_posts()) {
					$query->the_post();
			?>
				
					<div class="post">
						<div class="col-md-3">
							<?php 
								the_post_thumbnail('',['class'=>'img-responsive img-thumbnail post-img','alt'=>'my image']) 
							?>
						</div>
						<div class="col-md-9">
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
							<div class="post-content">
								<?php the_excerpt() ?>
								<a href="<?php echo get_permalink() ?>">Read More ...</a>	
							</div>
						</div>
						
					</div>
					<div class="clearfix"></div>	
			<?php
				}
					wp_reset_postdata();	
		 		}

		 		

		 		$comments_count = 4;
				$args = array(
					'user_id'		=>		get_the_author_meta('ID'),
					'status'		=>		'approve',
					'number'		=>		$comments_count,
					'post_status'	=>		'publish',
					'post_type'		=>		'post'
				);
				$comments = get_comments($array);
				if ($comments) {
					foreach ($comments as $com) { ?>
						<a href="<?php echo get_permalink($com->comment_post_ID); ?>">
							<?php echo get_the_title($com->comment_post_ID); ?>
						</a>
						<br>
						<?php echo mysql2date('l ,F j, Y',$com->comment_date) ?>	
						<br>
						<?php echo $com->comment_content ?>	
						<hr>				
			<?php	}
				} else { 
			?>
				<p>No Comments</p>
			<?php
				}
			?>
		</div>
	</div>
<?php get_footer() ?>