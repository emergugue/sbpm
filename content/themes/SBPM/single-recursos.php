<?php get_header(); ?>
<div role="main">
	<div class="row">
		<?php get_template_part('loop', 'single'); ?>
		<?php comments_template(); ?>
	</div>
</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
