		<hr>
		<!-- Begin Footer -->
		<footer class="footer" role="contentinfo">
			<div class="row">
				<?php
				global $innovati;
				$switchSocial = $innovati['switch-social'];
				$spinnerSocial = $innovati['spinner-social'];
				$switchTheme = $innovati['switch-theme'];
				$switchMenusFooter = $innovati['switch-menu-footer'];
				$editorFooter = $innovati['editor-footer'];
				if ($switchSocial == true) :
					?>
					<div class="columns medium-4">
						<h4 class="weight-thin marked marked-blue">Síguenos en</h4>
						<div class="row medium-collapse">
							<div class="columns medium-8">
								<ul class="small-block-grid-4 medium-block-grid-4">
									<?php
									$networks = ["facebook", "twitter", "flickr", "feed", "youtube"];
									$count = 0;
									for ($i = 0; $i < count($networks); ++$i) {
										$count = $count + 1;
										$social = $networks[$i];
										$count = $innovati['text-'.$social.'-social'];
										if ($count != null) :
											?>
											<li> <a href="<?php echo $count; ?>"><span class="icon icon-<?php echo $social; ?>-purple"></span></a> </li>
											<?php
										endif;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>
				<?php if ($switchMenusFooter == true) : ?>
				<div class="columns <?php if ($switchSocial == true) : echo "medium-8"; else : echo "medium-12"; endif;?>">
					<ul class="small-block-grid-1 <?php if ($switchTheme == true) : echo "medium-block-grid-4"; else : echo "medium-block-grid-3"; endif;?>">
						<?php if ($switchTheme == true) : ?>
						<li>
							<h4 class="weight-thin marked marked-red theme-color">Conócenos</h4>
							<ul class="line-division">
								<?php
								$menuParameters = array(
									'container' => false,
									'class' => '',
									'menu' => 'Conócenos',
									'echo' => true,
									'items_wrap' => '%3$s'
								);
								echo strip_tags(wp_nav_menu($menuParameters), '<a>');
								?>
							</ul>
						</li>
						<?php endif; ?>
						<li>
							<h4 class="weight-thin marked marked-red theme-color">Utilidad</h4>
							<ul class="line-division">
								<?php
								$menuParameters = array(
									'container' => false,
									'class' => '',
									'menu' => 'Utilidad',
									'echo' => true,
									'items_wrap' => '%3$s'
								);
								echo strip_tags(wp_nav_menu($menuParameters), '<a>');
								?>
							</ul>
						</li>
						<li>
                     <h4 class="weight-thin marked marked-pinkLight theme-color">
                        <?php 
                           $url = get_site_url();
                           if($url=='http://bibliotecasmedellin.gov.co/cms'){
                              echo 'Servicios en Línea';
                           }
                           else{
                              echo 'Servicios';
                           }
                        ?>
                     </h4>
							<ul class="line-division">
								<?php
								$menuParameters = array(
									'container' => false,
									'menu' => 'Servicios',
									'echo' => true,
									'items_wrap' => '%3$s'
								);
								echo strip_tags(wp_nav_menu($menuParameters), '<a>');
								?>
							</ul>
						</li>
						<li>
							<h4 class="weight-thin marked marked-orange theme-color">Catálogos</h4>
							<ul class="line-division">
								<?php
								$menuParameters = array(
									'container' => false,
									'class' => 'division',
									'menu' => 'Catálogos',
									'echo' => true,
									'items_wrap' => '%3$s'
								);
								echo strip_tags(wp_nav_menu($menuParameters), '<a>');
								?>
							</ul>
						</li>
					</ul>
				</div>
				<?php endif;?>
			</div>
			<?php if ($switchTheme == true) : ?>
			<div class="copyright">
				<div class="row">
					<p><?php echo $editorFooter; ?></p>
				</div>
			</div>
		<?php endif; ?>
		</footer>
		<!-- End Footer -->
		<?php wp_footer() ?>
		<?php  
	      global $innovati;
	      $switchTheme = $innovati['switch-theme'];
	      $textHeadline = $innovati['text-headline'];
	      if ($switchTheme == true) :
	    ?>
	         <script type="text/javascript">
	            data = '';
				jQuery(document).ready(function(){
				var fecha = new Date();
				var ano = fecha.getFullYear();
				vista_anual(ano);
				jQuery("#vista_anos_button").click();
				var url = '/calend/index.php?nombre=<?php echo $textHeadline; ?>';
				var jqxhr=  jQuery.ajax({
				  url: url,
				  dataType: "JSON",
				  async: false
				})
				// este es el ajax de jquery
				jqxhr.success(function(resp){
				  data = resp;
				});


				var fecha = new Date();
				var ano = fecha.getFullYear();
				vista_anual(ano);
				var config = {
				  '.chosen-select'           : {},
				}
				for (var selector in config) {
				  jQuery(selector).chosen(config[selector]);
				}   
				});

	         </script>
	    <?php else: ?>
	    	<script type="text/javascript">
	            data = '';
				jQuery(document).ready(function(){
				var fecha = new Date();
				var ano = fecha.getFullYear();
				vista_anual(ano);
				jQuery("#vista_anos_button").click();
				var url = '/calend/index.php';
				var jqxhr=  jQuery.ajax({
				  url: url,
				  dataType: "JSON",
				  async: false
				})
				// este es el ajax de jquery
				jqxhr.success(function(resp){
				  data = resp;
				});


				var fecha = new Date();
				var ano = fecha.getFullYear();
				vista_anual(ano);
				var config = {
				  '.chosen-select'           : {},
				}
				for (var selector in config) {
				  jQuery(selector).chosen(config[selector]);
				}   
				});

	         </script>
	         <script type="text/javascript">
				jQuery("#form-form").submit(function(){
					var nombre = jQuery("#form-nombre").val();
					var email = jQuery("#form-email").val();
					var tel = jQuery("#form-tel").val();
					var biblioteca = jQuery("#form-biblioteca").val();
					var mensaje = jQuery("#form-mensaje").val();
					if (biblioteca == "") {
						alert("Debes elegir una biblioteca.");
						jQuery("#form-biblioteca").focus();
						return false;
					}
					if (nombre == "") {
						alert("Debes llenar el campo nombre.");
						jQuery("#form-nombre").focus();
						return false;
					}
					if (email == "") {
						alert("Debes llenar el campo  email.");
						jQuery("#form-email").focus();
						return false;
					}
					if (tel == "") {
						alert("Debes llenar el campo teléfono.");
						jQuery("#form-tel").focus();
						return false;
					}
					jQuery("#form-enviar").attr('disabled', true);
					jQuery("#form-enviar").val("Enviando...");

					jQuery.ajax({
					  url: "<?php echo get_template_directory_uri();?>/mail/mail.php",
					  type: "POST",
					  async: false,
					  data: { 'nombre' : nombre, 'email': email , 'tel': tel, 'biblioteca': biblioteca, 'mensaje': mensaje },
					  success: function(respuesta){
					  	if (respuesta == "") {
					  		alert("Su mensaje ha sido enviado, pronto nos comunicaremos con usted.");
							location.reload();
					  	}else{
					  		alert("Algo salió mal, vuelve a intentarlo más tarde.");
					  		location.reload();
					  	}
			            	
			          }
					});
				});
			</script>
      	<?php endif; ?>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
		<script>
			jQuery(document).foundation();
		</script>
		  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/scripts-calendario.js"></script>
		  
	</body>
</html>
