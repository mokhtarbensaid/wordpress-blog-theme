<?php 
class Sb_Tags extends WP_Widget
{
	function __construct(){
		parent::__construct( 
			'sb_tags', 'SB Tags', 
			[
				'classname' => 'widget_archive',
				'description'=>'This widget for show posts tags',
				'customize_selective_refresh'=>true,
			] 
		);
	}
	// In the frontend of website
	function widget($args, $instance){
		$args['before_widget'] = str_replace( 'class="', 'class="tags ', $args['before_widget'] );
		echo $args['before_widget'];
			$title = apply_filters( 'widget_title', $instance['title'] );
			if ( !empty( $title ) ) {
				echo $args['before_title']. $title .$args['after_title'];
			} ?>	
		<div class="content">	
	        <ul>
				<?php 
				$tags = get_terms([
				    'taxonomy'=> 'post_tag',
				    'orderby'=>'count',
				    'order' => ( isset( $instance['tags_order'] ) ) ? $instance['tags_order'] : 'DESC',
				    'hide_empty'=>( isset( $instance['hide_empty'] ) && $instance['hide_empty'] == 1 ) ? true : false,
				]);

				foreach( $tags as $tag ){ ?>
	            <li><a href="<?php echo esc_url( get_term_link($tag) ) ?>"><?php echo esc_html( $tag->name ) ?><?php echo ( isset( $instance['tag_posts_count'] ) && $instance['tag_posts_count'] == 1 ) ? ' <span>('. absint( $tag->count ) . ')</span>' : '' ; ?></a></li>
	            <?php } ?>
	        </ul>
    	</div>
		<?php 
		echo $args['after_widget'];
	}

	//in the dashboard
	function form( $instance ){
		isset( $instance['title'] ) ? $title = $instance['title'] : $title = 'Tags cloud'; 
		isset( $instance['tag_posts_count'] ) ? $tag_posts_count = $instance['tag_posts_count'] : $tag_posts_count = 1;
		isset( $instance['hide_empty'] ) ? $hide_empty = $instance['hide_empty'] : $hide_empty = 1;
		isset( $instance['tags_order'] ) ? $tags_order = $instance['tags_order'] : $tags_order = 'DESC';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php echo esc_html__('Categories title', 'stand-blog'); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ) ?>" id="<?php echo $this->get_field_id( 'title' ) ?>" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tag_posts_count' ) ?>"><?php echo esc_html__('Show post count?', 'stand-blog'); ?></label>
			<input type="checkbox" class="widefat" name="<?php echo $this->get_field_name( 'tag_posts_count' ) ?>" id="<?php echo $this->get_field_id( 'tag_posts_count' ) ?>" value="1" <?php checked( 1, $tag_posts_count ); ?>>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'hide_empty' ) ?>"><?php echo esc_html__('Hide empty tags?', 'stand-blog'); ?></label>
			<input type="checkbox" class="widefat" name="<?php echo $this->get_field_name( 'hide_empty' ) ?>" id="<?php echo $this->get_field_id( 'hide_empty' ) ?>" value="1" <?php checked(1, $hide_empty ); ?>>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tags_order' ) ?>"><?php echo esc_html__('Posts order', 'stand-blog'); ?></label>
			<select name="<?php echo $this->get_field_name( 'tags_order' ) ?>" id="<?php echo $this->get_field_id( 'tags_order' ) ?>" >
				<option value="DESC" <?php echo ( $tags_order == 'DESC' ) ? 'selected': '' ?>>DESC</option>
				<option value="ASC" <?php echo ( $tags_order == 'ASC' ) ? 'selected': '' ?>>ASC</option>
			</select>
		</p>
		<?php
	}

	// update
	function update($new_instance, $old_instance){
        $new_data = [];
        $new_data['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title'];
        $new_data['tag_posts_count'] = (isset($new_instance['tag_posts_count'])) ? 1 : false;
        $new_data['hide_empty'] = (isset($new_instance['hide_empty'])) ? 1 : false;
        $new_data['tags_order'] = (in_array($new_instance['tags_order'], ['DESC', 'ASC'])) ? $new_instance['tags_order'] : $old_instance['tags_order'];
        return $new_data; 
	}
}