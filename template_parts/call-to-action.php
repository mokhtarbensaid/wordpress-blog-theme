<?php 
$cta_primary_text = get_theme_mod( 'sb_cta_primary_text' );
$cta_secondary_text = get_theme_mod( 'sb_cta_secondary_text' );
$cta_button_text = get_theme_mod( 'sb_cta_button_text' );
$cta_button_link = get_theme_mod( 'sb_cta_button_link' );
?>
<section class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-content">
          <div class="row">
            <div class="col-lg-8">
              <?php if( $cta_primary_text ){ ?>
              <span><?php echo esc_html( $cta_primary_text ); ?></span>
              <?php } if( $cta_secondary_text ){ ?>
              <h4><?php echo esc_html( $cta_secondary_text ); ?></h4>
              <?php } ?>
            </div>
            <?php if( $cta_button_text ){ ?>
            <div class="col-lg-4">
              <div class="main-button">
                <a href="<?php echo $cta_button_link ? esc_url( $cta_button_link ) : ''; ?>" target="_parent"><?php echo $cta_button_text ? esc_html( $cta_button_text ) : '' ; ?></a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>