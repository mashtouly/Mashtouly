<?php get_header() ?>
	
<div class="container main-page">
	<div class="row">
		<div class="text-center">
			<h1><?php single_cat_title() ?></h1>
			<p><?php echo category_description() ?></p>
			<div>
				<span>Article counts : 20</span>
				<span>Comment counts : 100</span>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-8">
		<?php
			if(have_posts())
			{
				while (have_posts()) {
					the_post();
		?>
				<div class="row">
					<div class="col-sm-12">
						<div class="post">
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
								<?php the_excerpt() ?>
								<a href="<?php echo get_permalink() ?>">Read More ...</a>	
							</div>
							<span class="post-category">
								<i class="fa fa-tags"></i> 
								<?php the_category(', '); ?>
							</span>
							<span class="post-tag">
								<?php
									if(has_tag())
									{
										the_tags();
									} else {
								?>
									<p>Tags: No Tags</p>

								<?php
									}
								?>
							</span>
						</div>	
					</div>
				</div>
				
		<?php
				}
				wp_reset_postdata();
		 	} 
		?> 
		</div>	
				<div class="col-sm-4">
					<?php get_sidebar('aoza'); ?>
				</div>
		 	<div class="clearfix"></div>

			<?php echo pagination() ?>
		
	</div>
</div>


<?php get_footer() ?>