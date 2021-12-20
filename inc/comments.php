<?php 
// change the comment fields order
add_filter( 'comment_form_fields', function ($fields){
	return [
          'author'  => $fields['author'],
          'email'   => $fields['email'],
          'url'     => $fields['url'],
          'comment' => $fields['comment']
	];
} );


// comment structure
if (!function_exists( 'bs_comment_callback' )) {
    function bs_comment_callback( $comment, $args, $depth ){  ?>
        <li <?php comment_class( 'comment' ); ?> id="comment<?php echo $comment->comment_ID; ?>">
        <div class="comment-body" id="comment-body-<?php echo $comment->comment_ID; ?>">
          <div class="author-thumb">
            <?php echo get_avatar( $comment, $args['avatar'], false, false, ['class'=> 'avatar photo'] ); ?>
          </div>
        </div>
          <div class="right-content">
            <h4><?php echo get_comment_author_link( $comment ) ?><span><?php echo esc_html( get_comment_time('F j, Y') ) ?></span></h4>
            <?php
             if ($comment->comment_approved == 0) {
                echo '<p class="alert alert-info">' . esc_html__( 'Your comment is awaiting for mederation by the admin', 'stand-blog' ) . '</p>';
             } ?>
            <p><?php comment_text(); ?></p>
            <div class="reply">
            <?php 
                comment_reply_link([
                     'depth'=> $depth,
                     'max_depth'=> $args['max_depth'],
                     'reply_text'=> __( 'Reply', 'stand-blog' ),
                     'add_below'=> 'comment-body'
                ]);
            ?>
            </div>
          </div>
        </li>
    <?php }
}

// add attributes(classes) to comments pagination
if (!function_exists( 'sb_comments_pagination_attr' ) ) {
    add_filter( 'next_comments_link_attributes', 'sb_comments_pagination_attr' );
    add_filter( 'previous_comments_link_attributes', 'sb_comments_pagination_attr' );
    function sb_comments_pagination_attr(){
        return 'class="comments-pagination-link"';
    }   
}