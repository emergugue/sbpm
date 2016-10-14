<?php get_header() ?>
<?php if (is_page()): the_post() ?>
<?php if (current_user_can("administrator")) : ?>
<div role="main">
	<article id="page-<?php the_ID() ?>">
		<div class="row">
			<?php the_content(); ?>
		</div>
	</article>
</div>
<?php else: ?>
	<div role="main">
	<article id="page-<?php the_ID() ?>">
		<h1>No tienes permisos para acceder a esta página.</h1>
	</article>
</div>
<?php endif;?>
<?php endif;?>
<?php get_footer() ?>
