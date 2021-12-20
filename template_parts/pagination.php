<?php 
$pagination_links = paginate_links([
    'prev_text' =>  '<i class="fa fa-angle-double-left"></i>',
    'next_text' =>  '<i class="fa fa-angle-double-right"></i>',
    'type' => 'array',
]); 
if ( is_array( $pagination_links ) ) { ?>

<div class="col-lg-12">
  <ul class="page-numbers">
      <?php     
         foreach( $pagination_links as $link ){
          echo '<li>' . $link . '</li>';
          } 
      ?> 
  </ul>
</div>
   <?php 
}
?>