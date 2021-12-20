<?php 
$post_id = get_the_ID();
$post_link = get_permalink(); 
$tags = get_the_terms( $post_id, 'post_tag' );
$categories = get_the_terms( $post_id, 'category' );
?>

<div class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blog-thumb"> 
    <img src="<?php echo get_the_post_thumbnail_url( null, 'blog' ); ?>" alt="">
  </div>
  <div class="down-content">
    <span><?php echo esc_html( $tags[0]->name ) ?></span>
    <a href="<?php echo esc_url( $post_link ); ?>" title="<?php esc_attr( the_title() ); ?>"><h4><?php echo esc_html( the_title() ); ?></h4></a>
    <ul class="post-info">
      <li><?php echo esc_html( the_author_posts_link() ); ?></li>
      <li><a href="<?php echo esc_html( get_day_link( get_the_date( 'Y' ), get_the_date( 'M' ), get_the_date( 'd' ) ) ) ?>"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></a></li>
      <li><a href="<?php echo esc_url( get_comments_link() ); ?>">
          <?php 
          printf(
              _n( '%s Comment', '%s Comments', get_comments_number(), 'stand-blog' ),
              number_format_i18n( get_comments_number() )
          )
          ?>
    </a></li>
    </ul>
    <?php the_excerpt(); ?>
    <div class="post-options">
      <div class="row">
        <div class="col-lg-12">
          <?php if ( is_array( $categories ) ) { ?>
          <ul class="post-tags">
            <li><i class="fa fa-tags"></i></li>
            <?php foreach ($categories as $category) { ?>
            <li><a href="<?php echo esc_url( get_term_link( $category ) ) ; ?>" title="<?php echo esc_attr( $category->name ) ?>"><?php echo esc_html( $category->name ) ?></a>,</li>
            <?php } ?>
          </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>