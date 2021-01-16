<!DOCTYPE html>
<html lang="<?php language_attributes() ?>">
	<head>
		<meta charset="<?php bloginfo('charset') ?>" />
		<title>
			<?php 
				wp_title('|','true','right');
				bloginfo('name');
			?>	
		</title>
		<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
		<?php wp_head() ?>
	</head>
	<body>
		<header>
				<div class="logo">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
				</div>
				<div class="nav">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <?php boot_menu(); ?>
				    </div>
				</div>
				<div class="services">
					
				</div>
		</header>
		
		
