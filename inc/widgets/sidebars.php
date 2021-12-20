<?php 
if (!function_exists('sb_register_sidebars')) {

	function sb_register_sidebars(){
		register_sidebar([
			'id'		    => 'blog-sidebar',
			'name'		    => 'Blog sidebar',
			'description'   => 'This is blog sidebar',
			'class'		    => '',
			'before_widget' => '<div class="col-lg-12"><div class="widget sidebar-item">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="sidebar-heading"><h2 class="widget-title">',
			'after_title'   => '</h2></div>'
		]);
		register_sidebars( 3, [
			'id'		    => 'footer-area',
			'name'		    => 'Footer Area %d',
			'description'   => 'This is footer area sidebar',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-heading"><h2 class="widget-title">',
			'after_title'   => '</h2></div>'
		] );
	}
	add_action( 'widgets_init', 'sb_register_sidebars' );

}
if (!function_exists('sb_reform_widgets')) {
	function sb_reform_widgets($params) {
	    $params[0]['before_title'] = '<div class="sidebar-heading"><h2 class="' . $params[0]['widget_name'] . '">' ;
	    $params[0]['after_title'] = '</h2></div>' ;
	    return $params;
	}
	add_filter('dynamic_sidebar_params', 'sb_reform_widgets');
}