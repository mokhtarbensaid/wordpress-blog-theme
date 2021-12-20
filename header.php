<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>

  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
  
    <?php wp_head(); ?>
<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <?php if (has_custom_logo() ) {
              the_custom_logo();
          } ?>  
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php 
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container_class' => 'collapse navbar-collapse',
                'container_id'=> 'navbarResponsive',
                'menu_class'=> 'navbar-nav ml-auto',
                'walker'=> new WP_Bootstrap_Navwalker()
            ]);
          ?>
        </div>
      </nav>
    </header> 

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php get_template_part( 'template_parts/heading-page' ); ?>
    <!-- Banner Ends Here -->

      <?php 
  if ( get_theme_mod( 'sb_cta_show' ) === true ) {
    get_template_part( 'template_parts/call-to-action' );
  }
   ?>