<?php
/*
Template Name: Afiliación
*/
get_header(); ?>
<div role="main">
	<article id="page-<?php the_ID() ?>">
		<div class="row">
			<div class="columns medium-12">
				<form name="" action="" method="get" onSubmit="return false;" id="form-form">
					<div class="col-md-4">
						<span class="wpcf7-form-control-wrap your-name">
							<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre" id="form-nombre" required>
						</span>
					</div>
					<div class="col-md-4">
						<span class="wpcf7-form-control-wrap your-email">
							<input type="email" name="your-email" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email" id="form-email" required>
						</span>
					</div>
					<div class="col-md-4">
						<span class="wpcf7-form-control-wrap tel">
							<input type="tel" name="tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Teléfono" id="form-tel" required>
						</span>
					</div>
					<div class="col-md-4">
						<span class="wpcf7-form-control-wrap biblioteca">
							<select name="biblioteca" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false" id="form-biblioteca" required>
							<option value="">Biblioteca</option>
							<?php
								$blog_list = wp_get_sites();

								foreach ($blog_list as $blog):
									$detalles = get_blog_details($blog["blog_id"]);
									$email = get_blog_option( $blog["blog_id"], 'admin_email' );
									if ($blog["blog_id"] != 1) {
								?>
								<option value="<?php echo $email;?>"><?php echo $detalles->blogname; ?></option>
								<?php } endforeach; ?>
							</select>
						</span>
					</div>
					<div class="col-md-12">
						<span class="wpcf7-form-control-wrap your-message">
							<textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Mensaje" id="form-mensaje" ></textarea>
						</span>
					</div>
					<div class="col-md-3">
						<input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit button" id="form-enviar" >
					</div>
				</form>
			</div>
		</div>
	</article>
</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
