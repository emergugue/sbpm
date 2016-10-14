<?php
   global $innovati;
   $editorFooter = $innovati['editor-footer'];
   $footerImage = $innovati['footer-image-url']['url'];
?>
		<hr>
		<!-- Begin Footer -->
		<footer class="footer" role="contentinfo">
         <div class="banner" style="background-image: url('<?php echo $footerImage; ?>')"></div>
			<div class="copyright">
				<div class="row">
					<p><?php echo $editorFooter; ?></p>
				</div>
			</div>
		</footer>
		<!-- End Footer -->
		<?php wp_footer() ?>
		<?php  
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
		<script>
			$(document).foundation();
		</script>
	</body>
</html>
