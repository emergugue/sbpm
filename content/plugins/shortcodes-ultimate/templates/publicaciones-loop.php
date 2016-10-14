<div class="su-posts su-posts-default-loop">
	<?php
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$items = new WP_Query(
			array(
				'post_type' => $posts->query["post_type"][0],
				// 'post_type' => 'publicaciones',
				'order' => 'ASC',
				'type' => 'main',
				'posts_per_page' => '4',
				'paged' => $paged
			)
		);
	?>
	<?php
		// Posts are found
		if ($items->have_posts()) {
			while ($items->have_posts()) : $items->the_post();
				global $post;
				?>

				<div id="su-post-<?php the_ID(); ?>" class="su-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="su-post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					<h2 class="su-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="su-post-meta"><?php _e( 'Publicado', 'su' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?></div>
					<div class="su-post-excerpt">
						<?php the_excerpt(); ?>
						<h5>Descargar: </h5>
						<?php if( get_field("archivo") ){ ?>
							<a href="<?php the_field('archivo'); ?>" target="_blank">
								<div class="archivos">
									<div><?the_field('nombre_1')?></div>
									<img src="<?php echo get_template_directory_uri(); ?>/images/default-pdf.png" width="30px" height="auto"/>
								</div>
							</a>
						<?php } ?>
						<?php if( get_field("archivo2") ){ ?>
							<a href="<?php the_field('archivo2'); ?>" target="_blank">
								<div class="archivos">
									<div><?the_field('nombre_2')?></div>
									<img src="<?php echo get_template_directory_uri(); ?>/images/default-pdf.png" width="30px" height="auto"/>
								</div>
							</a>
						<?php } ?>
						<?php if( get_field("archivo3") ){ ?>
							<a href="<?php the_field('archivo3'); ?>" target="_blank">
								<div class="archivos">
									<div><?the_field('nombre_3')?></div>
									<img src="<?php echo get_template_directory_uri(); ?>/images/default-pdf.png" width="30px" height="auto"/>
								</div>
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="wpb_wrapper">
					<div class="vc_separator wpb_content_element vc_el_width_100 vc_sep_color_grey">
						<span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
						<span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
					</div>
				</div>
				<?php
			endwhile;
			?>
			<div class="fluid_row">
					<div class="links_content links_content-green links_content-wide">

						<?php
						if (function_exists('wp_pagenavi')) {
							wp_pagenavi(array('query' => $items));
						}
					?>
					</div>
					<!-- content @end-->
				</div>
			<?php
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'No se encontraron posts', 'su' ) . '</h4>';
		}
	?>
</div>
