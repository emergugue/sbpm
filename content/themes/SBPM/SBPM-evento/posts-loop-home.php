<?php 
global $post;
$args = array(
   'post_type' => $posts->query['post_type'][0],
   'posts_per_page' => $posts->query['posts_per_page']
);
$items = get_posts($args);
?>

<div id="actualidad-home">
   <div class="vc_row wpb_row vc_inner vc_row-fluid">
      <?php
      for($i = 0; $i < 5; $i++){
         if($items[$i]!=NULL){
            $width = $i>=3 ? 6 : 4; 
            $post = $items[$i]; 
            setup_postdata($post);
      ?>
         <div class="vc_col-sm-<?php echo $width; ?> wpb_column vc_column_container">
            <div class="wpb_wrapper">
               <?php if ( has_post_thumbnail() ) : ?>
                  <div class="thumbnail" >
                     <div class="dummy"></div>
                     <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail(); ?>
                     </a>
                  </div>
               <?php else: // no thumbail ?>
                  <div class="no-thumbnail" >
                     <div class="dummy"></div>
                     <a href="<?php the_permalink() ?>">
                        <?php the_title(); ?>
                     </a>
                  </div>
               <?php endif; ?>
               <h2>
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
               </h2>
               <?php the_excerpt(); ?>
            </div> 
         </div> 
      <?php } } //if, for ?>
</div>
