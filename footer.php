    <?php 
    $facebook_url = get_theme_mod( 'footer_facebook_url' );
    $twitter_url  = get_theme_mod( 'footer_twitter_url' );
    $behance_url  = get_theme_mod( 'footer_behance_url' );
    $linkedin_url = get_theme_mod( 'footer_linkedin_url' );
    $dribbble_url = get_theme_mod( 'footer_dribbble_url' );
    ?>
    <footer>

      <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
                <?php dynamic_sidebar('footer-area-1') ?>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
                <?php dynamic_sidebar('footer-area-2') ?>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                <?php dynamic_sidebar('footer-area-3') ?>
            </div>
          </div>
          <div class="col-lg-12">
            <ul class="social-icons">
              <?php if( $facebook_url ){ ?>
              <li><a href="<?php echo esc_url( $facebook_url ); ?>"><?php echo esc_html__( 'Facebook', 'stand-blog' ); ?></a></li>
              <?php } ?>
              <?php if( $twitter_url ){ ?>
              <li><a href="<?php echo esc_url( $twitter_url ); ?>"><?php echo esc_html__( 'Twitter', 'stand-blog' ); ?></a></li>
              <?php } ?>
              <?php if( $behance_url ){ ?>
              <li><a href="<?php echo esc_url( $behance_url ); ?>"><?php echo esc_html__( 'Behance', 'stand-blog' ); ?></a></li>
              <?php } ?>
              <?php if( $linkedin_url ){ ?>
              <li><a href="<?php echo esc_url( $linkedin_url ); ?>"><?php echo esc_html__( 'Linkedin', 'stand-blog' ); ?></a></li>
              <?php } ?>
              <?php if( $dribbble_url ){ ?>
              <li><a href="<?php echo esc_url( $dribbble_url ); ?>"><?php echo esc_html__( 'Dribbble', 'stand-blog' ); ?></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">

              <p class="copyright">
                <?php echo esc_html( get_theme_mod( 'footer_copyright', 'All right reserved 2021 for: Developer: <a rel="nofollow" href="https://mokhtarbensaid.com" target="_parent">Mokhtar Bensaid</a> | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a>' ) ) ; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>