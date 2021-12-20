<?php get_header(); ?>
    <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                  <span>Stand Blog HTML5 Template</span>
                  <h4>Creative HTML Template For Bloggers!</h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="blog-posts grid-system">
      <div class="container">
          <div class="all-blog-posts">
            <?php 
            if ( have_posts() ) { ?>

              <div class="row">
              <?php 
            while( have_posts() ){
              the_post();
              echo '<div class="col-lg-4">';
                  get_template_part( 'template_parts/post-card', 'blog' );
              echo '</div>';    
              } 
              get_template_part( 'template_parts/pagination' );
              } 
              ?>
            </div>
          </div>
      </div>
    </section>
<?php get_footer(); ?>