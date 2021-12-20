<?php 

if (!function_exists('sb_enqueue_scripts')) {

	function sb_enqueue_scripts() {
		//styles
		wp_enqueue_style( 'sb-fontRoboto', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap', [], false );
		wp_enqueue_style( 'sb-bootstrap', get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css', [], false );
		wp_enqueue_style( 'sb-fontawesome', get_template_directory_uri().'/assets/css/fontawesome.css', [], false );
		wp_enqueue_style( 'sb-templatemo-stand-blog', get_template_directory_uri().'/assets/css/templatemo-stand-blog.css', [], false );
		wp_enqueue_style( 'sb-owl', get_template_directory_uri().'/assets/css/owl.css', [], false );

		
		//scripts
		wp_enqueue_script('jb-jquery', get_template_directory_uri().'/assets/vendor/jquery/jquery.min.js', [], false, true);
		wp_enqueue_script('jb-bootstrap', get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', [], false, true);
		wp_enqueue_script('sb-custom', get_template_directory_uri().'/assets/js/custom.js', [], false, true);
		wp_enqueue_script('sb-owl', get_template_directory_uri().'/assets/js/owl.js', [], false, true);
		wp_enqueue_script('sb-slick', get_template_directory_uri().'/assets/js/slick.js', [], false, true);
		wp_enqueue_script('sb-isotope', get_template_directory_uri().'/assets/js/isotope.js', [], false, true);
		wp_enqueue_script('sb-accordions', get_template_directory_uri().'/assets/js/accordions.js', [], false, true);
		if ( is_single() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'sb_enqueue_scripts' );	
}

if (!function_exists('sb_theme_setup')) {

	function sb_theme_setup(){
		add_theme_support( "title-tag" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'html5', ['comments-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'] );
		add_theme_support( 'post-formats', [
			'aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'video', 'chat'
		]);


		add_theme_support('custom-logo',[
			'width'  => 283,
			'height' => 61
		]);

		//custom page header
		$sb_header_info = [
		    'default-image' => get_template_directory_uri() . '/assets/images/heading-bg.jpg',
	        'width'              => 1580,
	        'height'             => 300,
		];

		register_default_headers( [
		    'default-image' => [
		        'url'           => get_stylesheet_directory_uri() . '/assets/images/heading-bg.jpg',
		        'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/heading-bg.jpg',
		        'description'   => esc_html__( 'Default Header Image', 'stand-blog' )
		    ],
		] );
		add_theme_support( 'custom-header', $sb_header_info );

		register_nav_menus([
			'main-menu' => 'Main Menu'
		]);

		// Add custom images sizes
		add_image_size( 'blog', 350, 322, true );
		add_image_size( 'post', 730, 323, true );
	}

	add_action( 'after_setup_theme', 'sb_theme_setup' );
}

require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/walkers/walkers.php';



if ( !function_exists( 'sb_get_archive_title' ) ) {
	function sb_get_archive_title(){
		$the_title = '';
		if ( is_archive() ) {
			$the_title .= get_the_archive_title();
			return ( !empty( $the_title ) ) ? '<h2>' .$the_title. '</h2>' : '';
		}
	}
}
if ( !function_exists( 'sb_generate_breadcrumb' ) ) {
	function sb_generate_breadcrumb(){
		$links = [];
		$links['home'] = '<a href="' . home_url() . '" >' . esc_html__( 'Home', 'stand-blog' ) . '</a>';
		if ( is_archive() ) {
			$links['title'] = sb_get_archive_title();
		}elseif( is_404() ) {
			$links['title'] = esc_html__( 'Not found', 'stand-blog' );
		}elseif( is_search() ) {
			$links['title'] = esc_html__( 'Search', 'stand-blog' );
		}elseif( get_post_type_archive_link('post') ) {
			$links['title'] = esc_html__( 'blog', 'stand-blog' );
		}elseif( is_singular() ) {
			$post_type_archive = get_post_type_archive_link( get_post_type() );
			if ( $post_type_archive ) {
				$post_type_object = get_post_type_object( get_post_type() );
				$links['title'] = '<a href="' . esc_url( $post_type_archive ) . '" >' . esc_html( $post_type_object->labels->name ) . '</a>';
			}
			$links['title'] = get_the_title();

		}else{
			$links['title'] = get_the_title();
		}
		
	echo '<h4>'. $links['home'] .'</h4>
            <h2>'. $links['title'] .'</h2>';
	}
}


//Choose Excerpt length of Posts
function sb_post_excerpt_length($length){
	return 32;
}
add_filter( 'excerpt_length', 'sb_post_excerpt_length');

//Remove Excerpt dots of Posts

function sb_remove_post_excerpt_dots($more){
	return '...';
}
add_filter( 'excerpt_more','sb_remove_post_excerpt_dots');