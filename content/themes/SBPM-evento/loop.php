<?php if (is_page()): the_post() ?>
	<article id="page-<?php the_ID() ?>">
		<div class="row">
			<?php the_content(); ?>
		</div>
	</article>
<?php else: ?>
	<?php if (have_posts()):
		while (have_posts()) : the_post() ?>
		<article id="article-<?php the_ID() ?>" class="article">
			<div class="row">
				<header class="article-header">
					<?php if (has_post_thumbnail() and !is_singular()): ?>
						<div class="featured-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail() ?></a>
						</div>
					<?php endif; ?>
					<h1 class="article-title"><?php if(!is_singular()): ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php endif; the_title() ?><?php if(!is_singular()): ?></a><?php endif; ?></h1>
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
				</div>
			</article>
		<?php endwhile; ?>
	<?php else: ?>
		<p>Nothing matches your query.</p>
	<?php  endif; ?>
<?php  endif; ?>
