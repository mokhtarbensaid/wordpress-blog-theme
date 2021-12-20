<div class="col-lg-12">
  <div class="sidebar-item comments" id="">
    <div class="sidebar-heading">
      <h2>
        <?php 
        printf(
            _n( '%s Comment', '%s Comments', get_comments_number(), 'stand-blog' ),
            number_format_i18n( get_comments_number() )
        )
        ?>
      </h2>
    </div>
    <?php if( get_comments_number() == 0 ) { echo '<p class="alert alert-info">'.__( 'No comments until now.', 'stand-blog' ).'</p>'; } ?>
    <div class="content">
      <ul>
          <?php 
          $max_depth = get_option( 'thread_comments_depth' );
          if ( get_option( 'thread_comments' ) != '1' ) {
              $max_depth = 1;
          }
          wp_list_comments([
              'avatar' => 100,
              'style' => 'li',
              'callback'=> 'bs_comment_callback',
              'max_depth'=> $max_depth
          ]);
          ?>
      </ul>
      <div class="comments-pagination">
          <div><?php previous_comments_link( __( '&larr; Older comments', 'stand-blog' ) ); ?></div>
          <div><?php next_comments_link( __( 'Newer comments &rarr;', 'stand-blog' ) ); ?></div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-12">
  <div class="sidebar-item submit-comment">
    <div class="content">
      <?php 
      if ( comments_open() ) {
          comment_form([
              'class_container'    => 'sidebar-item submit-comment',
              'title_reply_before' => '<div class="sidebar-heading"><h2>',
              'title_reply_after'  => '</h2></div>',
              'title_reply'  =>esc_html__('Your comment', 'stand-blog') ,
              'comment_notes_before'=> '',
              'comment_notes_after'=> '',
              'class_form'=> 'comment-form',
              'id_form' => 'comment',
              'submit_button' =>'<div class="col-lg-12">
                                <fieldset>
                                  <button type="submit" name="submit" id="form-submit" class="main-button">'.esc_html__( 'Submit', 'stand-blog' ).'</button>
                                </fieldset>
                              </div></div>',
              'fields'=>[
                  'author'=>'<div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="author" type="text" id="author" placeholder="'. esc_attr__( 'Your name', 'stand-blog' ) .'" required="">
                            </fieldset>
                          </div>',
                  'email'=>'<div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="email" type="text" id="email" placeholder="'. esc_attr__( 'Your email', 'stand-blog' ) .'" required="">
                          </fieldset>
                        </div>',
                  'url'=> '<div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="url" type="text" id="url" placeholder="'. esc_attr__( 'Website', 'stand-blog' ) .'">
                            </fieldset>
                          </div>',
                  'cookies'=>'',
              ],
              'comment_field'=> '<div class="col-lg-12">
                              <fieldset>
                                <textarea name="comment" rows="6" id="comment" placeholder="'. esc_attr__( 'Type your comment', 'stand-blog' ) .'" required=""></textarea>
                              </fieldset>
                            </div>',

          ]); 
      }else{
          echo '<p class="alert alert-info">'.esc_html__( 'Comments are closed for this post.', 'stand-blog' ).'</p>';
      }
      ?>
    </div>
  </div>
</div>