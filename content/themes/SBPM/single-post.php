<?php get_header(); ?>
<link rel="stylesheet" id="js_composer_front-css" href="http://bibliotecasmedellin.gov.co/content/plugins/js_composer/assets/css/js_composer.css?ver=4.3.5" type="text/css" media="all">
<link rel="stylesheet" id="js_composer_custom_css-css" href="http://bibliotecasmedellin.gov.co/content/uploads/js_composer/custom.css?ver=4.3.5" type="text/css" media="screen">
<link rel="stylesheet" id="su-other-shortcodes-css" href="http://bibliotecasmedellin.gov.co/content/plugins/shortcodes-ultimate/assets/css/other-shortcodes.css?ver=4.9.3" type="text/css" media="all">
<div role="main">
<article>
   <div class="row">
      <div class="vc_row wpb_row vc_row-fluid">
         <div class="vc_col-sm-8 wpb_column vc_column_container">
            <div class="wpb_wrapper">
               <div class="wpb_text_column wpb_content_element ">
                  <div class="wpb_wrapper">
                     <!-- AAA -->
                     <?php // get_template_part('loop', 'page'); ?>
                     <!-- AAA -->
                     <?php if (have_posts()):
                        while (have_posts()) : the_post() ?>
                              <header class="article-header">
                                 <?php if (has_post_thumbnail() and !is_singular()): ?>
                                    <div class="featured-image">
                                       <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
                                    </div>
                                 <?php endif; ?>
                                 <h2 class="article-title"><?php if(!is_singular()): ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; the_title() ?><?php if(!is_singular()): ?></a><?php endif; ?></h2>
                                    <div class="article-info">
                                       <span class="date"><?php the_date('m-d-Y') ?></span>
                                       <span class="comments"><?php comments_popup_link(__('Leave a comment'), __('1 Comment'), __('% Comments')) ?></span>
                                    </div>
                                 </header>
                                 <div class="article-content">
                                    <?php (is_single()) ? the_content() : the_excerpt() ?>
                                    <?php if( get_field("archivo") ){ ?>
                                       <h5>Descargar: </h5>
                                       <a href="<?php the_field('archivo'); ?>" target="_blank">
                                          <div class="archivos">
                                             <div><?the_field('nombre_1')?></div>
                                             <img src="<?php echo get_template_directory_uri(); ?>/images/default-pdf.png" width="50px" height="auto"/>
                                          </div>
                                       </a>
                                    <?php } ?>
                                    <?php if( get_field("archivo2") ){ ?>
                                       <a href="<?php the_field('archivo2'); ?>" target="_blank">
                                          <div class="archivos">
                                             <div><?the_field('nombre_2')?></div>
                                             <img src="<?php echo get_template_directory_uri(); ?>/images/default-pdf.png" width="50px" height="auto"/>
                                          </div>
                                       </a>
                                    <?php } ?>
                                    <?php if( get_field("archivo3") ){ ?>
                                       <a href="<?php the_field('archivo3'); ?>" target="_blank">
                                          <div class="archivos">
                                             <div><?the_field('nombre_3')?></div>
                                             <img src="<?php echo get_template_directory_uri(); ?>/images/default-pdf.png" width="50px" height="auto"/>
                                          </div>
                                       </a>
                                    <?php } ?>
                                 </div>
                        <?php endwhile; ?>
                     <?php else: ?>
                        <p>Nothing matches your query.</p>
                     <?php  endif; ?>
                  </div> 
               </div> 
            </div> 
         </div> 

         <div class="vc_col-sm-4 wpb_column vc_column_container">
            <div class="wpb_wrapper">
               <div class="vc_row wpb_row vc_inner vc_row-fluid">
                  <div class="vc_col-sm-12 wpb_column vc_column_container wpb_widgetised_column">
                     <div class="wpb_wrapper">
                        <ul>
                           <?php dynamic_sidebar('main-sidebar'); ?>
                        </ul>
                     </div> 
                  </div> 
               </div>
            </div> 
         </div> 
      </div>
   </div>
</article>
</div>
<?php get_footer(); ?>
