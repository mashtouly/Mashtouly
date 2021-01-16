<?php

	// include navwalker for nav menu and dropdawn
	require_once('wp-bootstrap-navwalker.php');

	// add post thumbnails
	add_theme_support('post-thumbnails');

	function my_files()
	{
		// Styles
		wp_enqueue_style('awesome-css',get_template_directory_uri().'/css/font-awesome.min.css');
		wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/css/bootstrap.min.css');
		wp_enqueue_style('main-css',get_stylesheet_uri());

		//Scripts
		wp_deregister_script('jquery');
		wp_register_script('jquery',includes_url('js/jquery/jquery.js'),array(),false,true);
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),false,true);
		wp_enqueue_script('main-js',get_template_directory_uri().'/js/main.js',array(),false,true);
		wp_enqueue_script('html5',get_template_directory_uri().'/js/html5shiv.min.js');
		wp_script_add_data('html5','conditional','lt IE 9');
		wp_enqueue_script('respond',get_template_directory_uri().'/js/respond.min.js');
		wp_script_add_data('respond','conditional','lt IE 9');
	} 

	// include files
	add_action('wp_enqueue_scripts','my_files'); 

	// create custom nav
	function custom_menu()
	{
		register_nav_menus(array(
			'bootstrap-menu' 	=> 		'Main Menu',
			'foot-menu'		 	=> 		'Footer Menu'
		));
	}

	add_action('init','custom_menu');

	function boot_menu()
	{
		wp_nav_menu(array(
			'theme_location'	=> 		'bootstrap-menu',
			'menu_class'		=> 		'nav navbar-nav navbar-right',
			'container'			=> 		false,
			'depth'				=> 		2,
			'walker'			=> 		new wp_bootstrap_navwalker()
		));
	}


	function excerpt_len($length)
	{
		if (is_author()) {
			return 40 ;
		} else {
			return 80 ;
		}
		
	}

	// add excerpt length
	add_filter('excerpt_length','excerpt_len');


	function excerpt_mo($more)
	{
		return ' ..';
	}

	// add excerpt More
	add_filter('excerpt_more','excerpt_mo');

	// create pagination
	function pagination()
	{
		global $wp_query;
		$all_pages 		= $wp_query->max_num_pages;
		$curren_page 	= max(1,get_query_var('paged'));
		if ($all_pages > 1) {
			return paginate_links(array(
				'base'			=>		get_pagenum_link() . '%_%',
				'format'		=>		'page/%#%',
				'current'		=>		$curren_page

			));
		}
	}

	// register sidebar

	function sidebar()
	{
		register_sidebar(array(
			'name'				=> 		'Sidebar',
			'id'				=>		'side',
			'description'		=>		'This is awesome sidebar',
			'class'				=>		'my-sidebar',
			'before_widget'		=>		'<div class="widget-sidebar">',
			'after_widget'		=>		'</div>',
			'before_title'		=>		'<h4 class="sidebar-title">',
			'after_title'		=>		'</h4>'
			));
	}

	add_action('widgets_init','sidebar');
?>