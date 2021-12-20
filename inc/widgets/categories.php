<?php 
class Sb_Categories extends WP_Widget
{
	function __construct(){
		parent::__construct( 
			'sb_categories', 'SB Categories', 
			[
				'classname' => 'widget_archive',
				'description'=>'This widget for show posts categories',
				'customize_selective_refresh'=>true,
			] 
		);
	}
	// In the frontend of website
	function widget($args, $instance){
		$args['before_widget'] = str_replace( 'class="', 'class="categories ', $args['before_widget'] );
		echo $args['before_widget'];

			$title = apply_filters( 'widget_title', $instance['title'] );
			if ( !empty( $title ) ) {
				echo $args['before_title']. $title .$args['after_title'];
			} ?>	
		<div class="content">	
	        <ul>
				<?php 
				$categories = get_terms([
				    'taxonomy'=> 'category',
				    'number' => ( isset( $instance['categories_count'] ) ) ? $instance['categories_count'] : 5,
				    'orderby'=>'count',
				    'order' => ( isset( $instance['categories_order'] ) ) ? $instance['categories_order'] : 'DESC',
				    'hide_empty'=>( isset( $instance['hide_empty'] ) && $instance['hide_empty'] == 1 ) ? true : false,
				]);

				foreach( $categories as $category ){ ?>
	            <li><a href="<?php echo esc_url( get_term_link($category) ) ?>"><?php echo sprintf('- %s', esc_html( $category->name ) ) ?><?php echo ( isset( $instance['category_posts_count'] ) && $instance['category_posts_count'] == 1 ) ? '<span>('. absint( $category->count ) . ')</span>' : '' ; ?></a></li>
	            <?php } ?>
	        </ul>
    	</div>
    	
		<?php 
		echo $args['after_widget'];
	}

	//in the dashboard
	function form( $instance ){
		isset( $instance['title'] ) ? $title = $instance['title'] : $title = 'Categories list'; 
		isset( $instance['category_posts_count'] ) ? $category_posts_count = $instance['category_posts_count'] : $category_posts_count = 1;
		isset( $instance['categories_count'] ) ? $categories_count = $instance['categories_count'] : $categories_count = 5;
		isset( $instance['hide_empty'] ) ? $hide_empty = $instance['hide_empty'] : $hide_empty = 1;
		isset( $instance['categories_order'] ) ? $categories_order = $instance['categories_order'] : $categories_order = 'DESC';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ) ?>"><?php echo esc_html__('Categories title', 'stand-blog'); ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'title' ) ?>" id="<?php echo $this->get_field_id( 'title' ) ?>" value="<?php echo $title; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'categories_count' ) ?>"><?php echo esc_html__('Categories count', 'stand-blog'); ?></label>
			<input type="number" class="widefat" min="1" name="<?php echo $this->get_field_name( 'categories_count' ) ?>" id="<?php echo $this->get_field_id( 'categories_count' ) ?>" value="<?php echo $categories_count; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'category_posts_count' ) ?>"><?php echo esc_html__('Show posts count?', 'stand-blog'); ?></label>
			<input type="checkbox"   value="1" <?php checked( 1, $category_posts_count ); ?> class="widefat" name="<?php echo $this->get_field_name( 'category_posts_count' ) ?>" id="<?php echo $this->get_field_id( 'category_posts_count' ) ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'hide_empty' ) ?>"><?php echo esc_html__('Hide empty categories?', 'stand-blog'); ?></label>
			<input type="checkbox"  value="1" <?php checked( 1, $hide_empty ); ?> class="widefat" name="<?php echo $this->get_field_name( 'hide_empty' ) ?>" id="<?php echo $this->get_field_id( 'hide_empty' ) ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'categories_order' ) ?>"><?php echo esc_html__('Posts order', 'stand-blog'); ?></label>
			<select name="<?php echo $this->get_field_name( 'categories_order' ) ?>" id="<?php echo $this->get_field_id( 'categories_order' ) ?>" >
				<option value="DESC" <?php echo selected( $categories_order, 'DESC' ); ?>><?php echo esc_html__( 'DESC', 'stand-blog' ) ?></option>
				<option value="ASC" <?php echo selected( $categories_order, 'ASC' ); ?>><?php echo esc_html__( 'ASC', 'stand-blog' ) ?></option>
			</select>
		</p>
		<?php
	}

	// update
	function update($new_instance, $old_instance){
        $new_data = [];
        $new_data['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title'];
        $new_data['category_posts_count'] = (isset($new_instance['category_posts_count'])) ? 1 : false;
        $new_data['hide_empty'] = isset($new_instance['hide_empty']) ? 1 : false;
        $new_data['categories_count'] = (isset($new_instance['categories_count']) && is_numeric($new_instance['categories_count'])
            && $new_instance['categories_count'] > 0) ? ((int)($new_instance['categories_count'])) : $old_instance['categories_count'];
        $new_data['categories_order'] = (in_array($new_instance['categories_order'], ['DESC', 'ASC'])) ? $new_instance['categories_order'] : $old_instance['categories_order'];
        return $new_data; 
	}
}