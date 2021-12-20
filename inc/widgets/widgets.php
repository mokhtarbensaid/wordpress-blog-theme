<?php 

require 'sidebars.php';
require 'recent_posts.php';
require 'categories.php';
require 'search.php';
require 'tags.php';

add_action( 'widgets_init', function(){
	register_widget( 'SB_Recent_Posts' );
	register_widget( 'Sb_Categories' );
	register_widget( 'SB_Search' );
	register_widget( 'Sb_Tags' );
} );