<?php get_header(); ?>
  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
          	<?php 
          	if ( have_posts() ) { ?>

            	<div class="row">
            	<?php 
        		while( have_posts() ){
              the_post();
              echo '<div class="col-lg-6">';
              	 	get_template_part( 'template_parts/post-card', 'blog' );
              echo '</div>';    
           		} 
           		get_template_part( 'template_parts/pagination' );
              } 
              ?>
            </div>
          </div>
        </div>
        	<?php get_sidebar(); ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>