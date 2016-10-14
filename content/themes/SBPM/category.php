<?php get_header() ?>
<link rel="stylesheet" id="js_composer_front-css" href="http://bibliotecasmedellin.gov.co/content/plugins/js_composer/assets/css/js_composer.css?ver=4.3.5" type="text/css" media="all">
<link rel="stylesheet" id="js_composer_custom_css-css" href="http://bibliotecasmedellin.gov.co/content/uploads/js_composer/custom.css?ver=4.3.5" type="text/css" media="screen">
<link rel="stylesheet" id="su-other-shortcodes-css" href="http://bibliotecasmedellin.gov.co/content/plugins/shortcodes-ultimate/assets/css/other-shortcodes.css?ver=4.9.3" type="text/css" media="all">
<div role="main">
   <article class="article">
      <div class="row">
         <div class="vc_row wpb_row vc_row-fluid">
            <div class="vc_col-sm-8 wpb_column vc_column_container">
               <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                     <div class="vc_col-sm-12 wpb_column vc_column_container">
                        <div class="wpb_wrapper">
                           <div class="wpb_text_column wpb_content_element ">
                              <div class="wpb_wrapper">
                                 <h2>Actualidad</h2>
                              </div> 
                           </div> 
                        </div> 
                     </div> 
                     <div class="vc_col-sm-12 wpb_column vc_column_container">
                        <div class="wpb_wrapper">
                           <div class="su-posts su-posts-default-loop">
                              <?php // WHILE ?>
                              <?php while (have_posts()) : the_post(); ?>
                                 <div id="su-post-<?php the_ID(); ?>" class="su-post">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                       <div class="su-post-thumbnail" >
                                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                       </div>
                                    <?php endif; ?>
                                    <h2 class="su-post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                    <div class="su-post-meta">
                                       <?php _e( 'Publicado', 'su' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?>
                                       <?php the_tags( '<br/>Etiquetas: ', ', ', '' ); ?> 
                                    </div>
                                    <div class="su-post-excerpt">
                                       <?php the_excerpt(); ?>
                                    </div>
                                    <div class="wpb_wrapper">
                                       <div class="vc_separator wpb_content_element vc_el_width_100 vc_sep_color_grey">
                                          <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                                          <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                                       </div>
                                    </div>
                                 </div>
                              <?php endwhile; ?>
                           </div>
                        </div> 
                     </div> 
                  </div>
               </div> 
            </div> 
            <div class="vc_col-sm-4 wpb_column vc_column_container wpb_widgetised_column">
               <div class="wpb_wrapper">
                  <ul>
                     <?php dynamic_sidebar('main-sidebar'); ?>
                  </ul>
               </div>
            </div> 
         </div> 
      </div>
   </article>
</div>
<?php get_footer() ?>
