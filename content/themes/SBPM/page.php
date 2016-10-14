<?php get_header(); ?>
<div role="main">
	<?php
	if (is_front_page()) :
		global $innovati;
		$switchHeader = $innovati['switch-header'];
		if ($switchHeader == true) :
			?>
			<div class="slider">
				<div class="block block-hero">
					<ul class="no-bullet" data-orbit data-options="animation:fade;slide_number:false;navigation_arrows:false">
						<?php
						$carousel = $innovati['slides-header'];
						for ($i = 0; $i < count($carousel); ++$i) {
							$title = $carousel[$i]['title'];
							$image = $carousel[$i]['image'];
							$link = $carousel[$i]['url'];
							$descripcion = $carousel[$i]['description'];
							?>
							<li>
								<div class="slider_item" style="">
									<img src="<?php echo $image; ?>"></img>
                           <div class="slider_captions">
                              <div class="slider_captions_inner">
                                 <span class="slider_item_title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></span>
                                 <span class="slider_item_description"><a href="<?php echo $link;?>"><?php echo $descripcion; ?></a></span>
                              </div>
                           </div>
								</div>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
			<?php
		endif;
	endif;
	?>
	<?php get_template_part('loop', 'page'); ?>
</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
