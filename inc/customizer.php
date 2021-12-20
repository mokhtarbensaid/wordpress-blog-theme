<?php 

if ( !function_exists( 'sb_register_settings' ) ) {
	function sb_customize_register( $wp_customize ){

		/** Colors site**/
		// remove existant color setting
		$wp_customize->remove_control('header_textcolor');

		// add primary color setting
		$wp_customize->add_setting(
			'sb_primary_color',
			array(
			  'default' => '#f48840',
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		 );
		$wp_customize->add_control(
		 new WP_Customize_Color_Control(
			$wp_customize,
			'sb_custom_primary_color',
			[
				'label'      => esc_html__( 'Primary Color', 'stand-blog' ), 
				'section'    => 'colors',
				'settings'   => 'sb_primary_color'
			]
		 )
		);

		// add secondary color setting
		$wp_customize->add_setting(
			'sb_secondary_color',
			[
			  'default' => '#fb9857',
			  'sanitize_callback' => 'sanitize_hex_color'
			]
		 );
		$wp_customize->add_control(
		 new WP_Customize_Color_Control(
			$wp_customize,
			'sb_custom_secondary_color',
			[
				'label'      => esc_html__( 'Secondary Color', 'stand-blog' ), 
				'section'    => 'colors',
				'settings'   => 'sb_secondary_color'
			]
		 )
		);
		// add text color setting
		$wp_customize->add_setting(
			'sb_text_color',
			[
			  'default' => '#7a7a7a',
			  'sanitize_callback' => 'sanitize_hex_color'
			]
		);
		$wp_customize->add_control(
		 new WP_Customize_Color_Control(
			$wp_customize,
			'sb_custom_text_color',
			[
				'label'      => esc_html__( 'Text Color', 'stand-blog' ), 
				'section'    => 'colors',
				'settings'   => 'sb_text_color'
			]
		 )
		);

		// add background footer color setting
		$wp_customize->add_setting(
			'sb_footer_bg_color',
			[
				'default' => '#20232e',
				'sanitize_callback' => 'sanitize_hex_color'
			]
		);
		$wp_customize->add_control(
		 new WP_Customize_Color_Control(
			$wp_customize,
			'sb_custom_footer_bg_color',
			[
				'label'      => esc_html__( 'Footer Background Color', 'stand-blog' ), 
				'section'    => 'colors',
				'settings'   => 'sb_footer_bg_color'
			]
		 )
		);

		// add background footer setting
		$wp_customize->add_setting(
			'sb_footer_text_color',
			[
			  'default' => '#ffffff',
			  'sanitize_callback' => 'sanitize_hex_color'
			]
		);
		$wp_customize->add_control(
		 new WP_Customize_Color_Control(
			$wp_customize,
			'sb_custom_footer_text_color',
			[
				'label'      => esc_html__( 'Footer Background Text Color', 'stand-blog' ), 
				'section'    => 'colors',
				'settings'   => 'sb_footer_text_color'
			]
		 )
		);

		/**Call to action settings **/
		//add section
		$wp_customize->add_section( 'sb_cta_settings', [
			'title'=> esc_html__( 'Call to action', 'stand-blog' ),
			'priority'=>105,
		] );

		// add call to action show setting
	    $wp_customize->add_setting( 'sb_cta_show', array(
            'default' => true,
            'sanitize_callback' => 'sb_sanitize_checkboxes'
	    ));
	 
	    //add call to action show control
	    $wp_customize->add_control( 'cta_show_control', array(
            'label' => esc_html__( 'Show call to action', 'stand-blog' ),
            'type'  => 'checkbox',
            'section' => 'sb_cta_settings',
            'settings' => 'sb_cta_show'
	    ));


		// add call to action background setting
		$wp_customize->add_setting( 'sb_cta_background', [
			'default' => '',
			'sanitize_callback' => 'absint'
		] );

		// add call to action background control
		$wp_customize->add_control( new WP_Customize_Media_Control( 
			$wp_customize,
			'sb_cta_background',
			[
				'label'=> 'Call to action background',
				'section'=>'sb_cta_settings',
				'mime_types'=>'image',

			]
		 ) );

		// add call to action primary text control
		$wp_customize->add_setting( 'sb_cta_primary_text', [
			'default'=> esc_html( 'Stand Blog Wordpress Theme' ),
			'sanitize_callback' => 'sanitize_text_field'
		] );

		// add call to action primary text setting
		$wp_customize->add_control( 'sb_cta_primary_text', [
			'type'=> 'text',
			'label'=> esc_html__( 'Call to action primary text', 'stand-blog' ),
			'section'=> 'sb_cta_settings'
		] );

		// add call to action secondary text control
		$wp_customize->add_setting( 'sb_cta_secondary_text', [
			'default'=> esc_html( 'Creative Wordpress Theme For Bloggers!' ),
			'sanitize_callback' => 'sanitize_text_field'
		] );

		// add call to action secondary text setting
		$wp_customize->add_control( 'sb_cta_secondary_text', [
			'type'=> 'text',
			'label'=> esc_html__( 'Call to action secondary text', 'stand-blog' ),
			'section'=> 'sb_cta_settings'
		] );

		// add call to action button text control
		$wp_customize->add_setting( 'sb_cta_button_text', [
			'default'=> esc_html( 'DOWNLOAD NOW!' ),
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add call to action button text setting
		$wp_customize->add_control( 'sb_cta_button_text', [
			'type'=> 'text',
			'label'=> esc_html__( 'Button text', 'stand-blog' ),
			'section'=> 'sb_cta_settings'
		] );

		// add call to action button link control
		$wp_customize->add_setting( 'sb_cta_button_link', [
			'default'=> esc_html( '#' ),
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add call to action button link setting
		$wp_customize->add_control( 'sb_cta_button_link', [
			'type'=> 'text',
			'label'=> esc_html__( 'Button link', 'stand-blog' ),
			'section'=> 'sb_cta_settings'
		] );

		/**Footer settings **/
		//add section
		$wp_customize->add_section( 'sb_footer_settings', [
			'title'=> esc_html__( 'Footer settings', 'stand-blog' ),
			'priority'=>115,

		] );
		// add copyright control
		$wp_customize->add_setting( 'sb_footer_copyright', [
			'default'=> '',
			'transport'=> 'postMessage',
			'sanitize_callback' => 'sb_sanitize_footer_copyright'
		] );

		// Add selective refresh
		$wp_customize->selective_refresh->add_partial( 'sb_footer_copyright', [
			'selector'=> '.copyright',
			'container_inclusive'=> false,
			'render_callback'=> function(){
				echo get_theme_mod( 'sb_footer_copyright', '' );
			}
		] );

		// add copyright setting
		$wp_customize->add_control( 'sb_footer_copyright', [
			'type'=> 'text',
			'label'=> esc_html__( 'Footer copyright', 'stand-blog' ),
			'description'=> esc_html__( 'You can write your site copyright content', 'stand-blog' ),
			'section'=> 'sb_footer_settings'
		] );

		// add footer facebook control
		$wp_customize->add_setting( 'sb_footer_facebook_url', [
			'default'=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add footer facebook setting
		$wp_customize->add_control( 'sb_footer_facebook_url', [
			'type'=> 'text',
			'label'=> esc_html__( 'Footer facebook account', 'stand-blog' ),
			'section'=> 'sb_footer_settings'
		] );

		// add footer twitter control
		$wp_customize->add_setting( 'footer_twitter_url', [
			'default'=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add footer twitter setting
		$wp_customize->add_control( 'sb_footer_twitter_url', [
			'type'=> 'text',
			'label'=> esc_html__( 'Footer twitter account', 'stand-blog' ),
			'section'=> 'sb_footer_settings'
		] );

		// add footer behance control
		$wp_customize->add_setting( 'sb_footer_behance_url', [
			'default'=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add footer behance setting
		$wp_customize->add_control( 'sb_footer_behance_url', [
			'type'=> 'text',
			'label'=> esc_html__( 'Footer behance account', 'stand-blog' ),
			'section'=> 'sb_footer_settings'
		] );

		// add footer linkedin control
		$wp_customize->add_setting( 'sb_footer_linkedin_url', [
			'default'=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add footer linkedin setting
		$wp_customize->add_control( 'sb_footer_linkedin_url', [
			'type'=> 'text',
			'label'=> esc_html__( 'Footer linkedin account', 'stand-blog' ),
			'section'=> 'sb_footer_settings'
		] );

		// add footer dribbble control
		$wp_customize->add_setting( 'sb_footer_dribbble_url', [
			'default'=> '',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		// add footer dribbble setting
		$wp_customize->add_control( 'sb_footer_dribbble_url', [
			'type'=> 'text',
			'label'=> esc_html__( 'Footer dribbble account', 'stand-blog' ),
			'section'=> 'sb_footer_settings'
		] );
	}
	add_action( 'customize_register', 'sb_customize_register' );
}

add_action( 'wp_head', function(){
	echo '<style>';

		echo ':root{';
			$primary_color = esc_html( get_theme_mod( 'sb_primary_color', '' ) );
			$secondary_color = esc_html( get_theme_mod( 'sb_secondary_color', '' ) );
			$text_color = esc_html( get_theme_mod( 'sb_text_color', '' ) );
			$footer_bg_color = esc_html( get_theme_mod( 'sb_footer_bg_color', '' ) );
			$footer_text_color = esc_html( get_theme_mod( 'sb_footer_text_color', '' ) );
			if (!empty($primary_color)) {
				echo '--primary-color:'.$primary_color.';';
			}
			if (!empty($secondary_color)) {
				echo '--secondary-color:'.$secondary_color.';';
			}
			if (!empty($text_color)) {
				echo '--text-color:'.$text_color.';';
			}
			if (!empty($footer_bg_color)) {
				echo '--footer-bg-color:'.$footer_bg_color.';';
			}
			if (!empty($footer_text_color)) {
				echo '--footer-text-color:'.$footer_text_color.';';
			}
		echo '}';

		echo '.call-to-action .main-content{';
			$cta_background = esc_html( get_theme_mod( 'sb_cta_background', '' ) ) ;
			if (!empty($cta_background)) {
				echo 'background-image: url('. wp_get_attachment_image_url( $cta_background, 'full' ) .')';
			}
		echo '}';

		echo '.footer{';
			$footer_bg_color = esc_html( get_theme_mod( 'sb_footer_bg_color', '' ) ) ;
			if (!empty($footer_bg_color)) {
				echo 'background-color:'.$footer_bg_color;
			}
		echo '}';

		echo 'footer p{';
			$footer_text_color = esc_html( get_theme_mod( 'sb_footer_text_color', '' ) ) ;
			if (!empty($footer_text_color)) {
				echo 'color:'.$footer_text_color;
			}
		echo '}';

		echo 'footer ul.social-icons li a{';
			$footer_text_color = esc_html( get_theme_mod( 'sb_footer_text_color', '' ) ) ;
			if (!empty($footer_text_color)) {
				echo 'color:'.$footer_text_color;
			}
		echo '}';

	echo '</style>';
}, 99 );

function sb_sanitize_footer_copyright( $footer_copyright ){
	return wp_kses( $footer_copyright, [
		'a' =>[
			'href'=> [],
			'target' =>[],
			'rel'=>[]
		]
	] );
}
function sb_sanitize_checkboxes( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}