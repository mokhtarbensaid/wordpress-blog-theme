<?php 
class SB_Search extends WP_Widget
{
	function __construct(){
		parent::__construct( 
			'sb_search', 'SB Search', 
			[
				'description'=>'This widget for the search',
				'customize_selective_refresh'=>true,
			] 
		);
	}
	// In the frontend of website
	function widget($args, $instance){
		// add "search" class to the search widget
		$args['before_widget'] = str_replace( 'class="', 'class="search ', $args['before_widget']);
		// Start Search widget output
		echo $args['before_widget'];
			$title = apply_filters( 'widget_title', $instance['title'] );
			if ( !empty( $title ) ) {
				echo $args['before_title']. $title .$args['after_title'];
			}
		?>
            <form id="search_form" name="gs" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="text" name="s" class="searchText" autocomplete="on" value="<?php echo esc_attr( get_search_query() ) ; ?>" <?php echo isset($instance['placeholder']) ? 'placeholder="'.$instance['placeholder'].'"' : '' ?>>
            </form>
		<?php 
		echo $args['after_widget'];
	}
	// End Search widget output
	
	//in the dashboard
	function form( $instance ){
		isset( $instance['title'] ) ? $title = $instance['title'] : $title = 'Search';
		isset( $instance['placeholder'] ) ? $placeholder = $instance['placeholder'] : $placeholder = 'type to search...';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php echo esc_html__('Search title', 'stand-blog'); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ) ?>" id="<?php echo $this->get_field_id( 'title' ) ?>" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'placeholder' ) ?>"><?php echo esc_html__('Search field placeholder', 'stand-blog'); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'placeholder' ) ?>" id="<?php echo $this->get_field_id( 'placeholder' ) ?>" value="<?php echo $placeholder; ?>">
		</p>
		<?php
	}

	// update
	function update($new_instance, $old_instance){
        $new_data = [];
        $new_data['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title'];
        $new_data['placeholder'] = (!empty($new_instance['placeholder'])) ? strip_tags($new_instance['placeholder']) : $old_instance['placeholder'];
        return $new_data; 
	}
}