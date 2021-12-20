<?php  

class SB_Recent_Posts extends WP_Widget
{
	function __construct(){
		parent::__construct( 
			'sb_recent_posts', 
			'SB Recent Posts', 
			[
				'description'=>'This widget for the popular blog posts',
				'customize_selective_refresh'=>true,
			] );
	}
	// In the frontend of website
	function widget($args, $instance){

		$args['before_widget'] = str_replace( 'class="', 'class="recent-posts ', $args['before_widget'] );
		
		echo $args['before_widget'];
			if ( isset($instance['title'] ) ) {
				echo $args['before_title']. $instance['title'] .$args['after_title'];
			}
	        $recent_posts = get_posts([
	        	'post_type' => 'post',
	            'numberposts'=> ( isset( $instance['posts_count'] ) ) ? $instance['posts_count'] : 3 ,
	            'orderby'=>'date',
	            'order' => ( isset( $instance['posts_order'] ) ) ? $instance['posts_order'] : 'DESC' 
	        ]);
	        if (count($recent_posts)) {
 				echo '<div class="content"><ul>';
	        	foreach( $recent_posts as $post ){ ?>
                    <li>
                    	<a href="<?php esc_url( get_permalink( $post->ID ) ); ?>">
	                      <h5><?php echo esc_html( $post->post_title ); ?></h5>
	                      <span><?php echo esc_html( get_the_date( 'M j, Y', $post->ID ) ); ?></span>
                    	</a>
                	</li>
	        	<?php }
	        	echo '</ul></div>';
	        }else{
	        	echo '<p>'. esc_html__( 'No posts found', 'stand-blog' ) .'</p>';
	        }
		echo $args['after_widget'];
	}

	//in the dashboard
	function form( $instance ){
		isset( $instance['title'] ) ? $title = $instance['title'] : $title = 'Recent posts';
		isset( $instance['posts_count'] ) ? $posts_count = $instance['posts_count'] : $posts_count = 3;
		isset( $instance['posts_order'] ) ? $posts_order = $instance['posts_order'] : $posts_order = 'DESC';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php echo esc_html__('Widget title', 'stand-blog'); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ) ?>" id="<?php echo $this->get_field_id( 'title' ) ?>" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_count' ) ?>"><?php echo esc_html__('Posts count', 'stand-blog'); ?></label>
			<input type="number" class="widefat" min="1" name="<?php echo $this->get_field_name( 'posts_count' ) ?>" id="<?php echo $this->get_field_id( 'posts_count' ) ?>" value="<?php echo $posts_count; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_order' ) ?>"><?php echo esc_html__('Posts order', 'stand-blog'); ?></label>
			<select name="<?php echo $this->get_field_name( 'posts_order' ) ?>" id="<?php echo $this->get_field_id( 'posts_order' ) ?>" >
				<option value="DESC" <?php echo selected( $posts_order, 'DESC' ); ?>><?php echo esc_html__( 'DESC', 'stand-blog' ) ?></option>
				<option value="ASC" <?php echo selected( $posts_order, 'ASC' ); ?>><?php echo esc_html__( 'ASC', 'stand-blog' ) ?></option>
			</select>
		</p>		
		<?php
	}

	// update
	function update($new_instance, $old_instance){
        $new_data = [];
        $new_data['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title'];
        $new_data['posts_count'] = (isset($new_instance['posts_count']) && is_numeric($new_instance['posts_count'])
            && $new_instance['posts_count'] > 0) ? ((int)($new_instance['posts_count'])) : $old_instance['posts_count'];
        $new_data['posts_order'] = (in_array($new_instance['posts_order'], ['DESC', 'ASC'])) ? $new_instance['posts_order'] : $old_instance['posts_order'];
        return $new_data; 
	}
}

