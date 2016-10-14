<?php 
global $post;
   $recent_posts = new WP_Query(array(
      'post_type' => $posts->query["post_type"][0],
      'order' => 'DESC',
      'orderby' => 'post_date',
      'posts_count' => $posts->query['posts_per_page'],
      'ignore_sticky_posts' => 'false',
      'post__not_in' => get_option('sticky_posts'),
   ));

   $sticky_posts = new WP_Query(array(
      'post_type' => $posts->query["post_type"][0],
      'order' => 'DESC',
      'orderby' => 'post_date',
      'posts_count' => $posts->query['posts_per_page'],
      'ignore_sticky_posts' => 'false',
      'post__in' => get_option('sticky_posts'),
   ));

   $items = array();

   foreach($sticky_posts->posts as $my_post) {
      array_push($items,$my_post);
   }

   foreach($recent_posts->posts as $my_post) {
      array_push($items,$my_post);
   }

   $items = array_slice($items, 0, $posts->query['posts_per_page']);
?>

<div id="actualidad-home">
   <div class="vc_row wpb_row vc_inner vc_row-fluid">
      <?php
      for($i = 0; $i < 3; $i++){
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
   <div class="vc_row wpb_row vc_inner vc_row-fluid">
      <?php
      for($i = 3; $i < 5; $i++){
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
      <p style="text-align:right;"><strong><a href="<?php bloginfo('siteurl'); ?>/actualidad">Ver más &gt;</a><strong></p>
   </div>
</div>
