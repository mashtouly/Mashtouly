<?php
	if (comments_open()) {
	?>
		<h5><?php comments_number() ?></h5>
		<ul class="list-unstyled mash-comment">
			<?php
				wp_list_comments(array('max_depth'	=>	3,'type'	=>	'comment'));
			?>
		</ul>
		<hr>
		<?php
			comment_form(); // comment_form have arguments

	}
	else {
	
		echo 'No Comments';
	}