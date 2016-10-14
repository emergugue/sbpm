<?php get_header() ?>
<div role="main">
     <article class="article">
      <div class="row">
         <div class="features">
            <?php while (have_posts()) : the_post(); ?>
            <div class="features_news features_square features_square-flat">
               <div class="features_news_picture">
                  <?php the_post_thumbnail('thumbnail'); ?>
               </div>
               <!-- picture @end-->
               <div class="features_news_content">
                  <h3><?php the_title(); ?></h3>
                  <span><?php the_time('F j, Y'); ?></span>
                  <?php the_excerpt(); ?>
                  <a class="button button-gray" href="<?php the_permalink(); ?>">Leer más<span class="icon-right"></span></a>
               </div>
               <!-- message @end-->
            </div>
            <!-- news @end-->
            <?php endwhile; ?>
         </div>
      </div>
      <!-- features @end-->
   </article>
</div>
<?php get_footer() ?>