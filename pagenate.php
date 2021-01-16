<?php
	echo '<div class="post-pagination text-center">';

	 	if (get_previous_posts_link()) {
			previous_posts_link('Prev');
		}
		else
		{
			echo '<span class="prev-span">prev</span>';
		}

		if (get_next_posts_link()) {
			next_posts_link('Next');
		}
		else
		{
			echo '<span class="next-span">Next</span>';
		}

	echo '</div>';
?>