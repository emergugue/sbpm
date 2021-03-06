<?php
/*
Template Name: Calendario
*/
get_header(); ?>
<div role="main">
	<article id="page-<?php the_ID() ?>">
		<div id="calendario-principal" class="row">
			<div class="columns medium-12">
				<h1 class="h-no-estyle" style="font-family: Roboto; font-weight:300;color: #636567; padding-left:10px;">Prográmate en nuestras bibliotecas</h1>
			</div>
			<div class="columns medium-4">
				<div class="columns medium-12">
					<!-- TIPO DE EVENTO-->
					<table class="tabla-no-borde">
						<tr>
							<td><a><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/icons/i_filtro.png"></a></td>
							<td><p style="font-family: Roboto; font-weight:300; font-size:42px; color: #8b9094;margin: 0px;padding-left: 6px;">Filtros</p></td>
						</tr>
					</table>
					<p class="h-no-estyle" style="font-family: roboto; font-size: 10px; font-weight: bold; width: 100%; border-bottom: 2px solid #cbcbcb"></p>

					<table class="tabla-no-borde" style="width:100%;">
						<tr>
							<td><p style="font-family: Roboto; font-weight:300; font-size:19px; color: #8b9094; font-weight: bold;margin: 0px;">POR BIBLIOTECAS</p></td>
						</tr>
						<tr>
							<td style="width:100%;">
								<select id="bibliotecaSelect" class="select-wrapper">
									<option value="biblioteca0"></option>
								</select>
							</td>
						</tr>
					</table>

					<p class="h-no-estyle" style="font-family: roboto; font-size: 10px; font-weight: bold; width: 100%; border-bottom: 2px solid #cbcbcb"></p>

					<table class="tabla-no-borde" style="width:100%;">
						<tr>
							<td><p style="font-family: Roboto; font-weight:300; font-size:19px; color: #8b9094; font-weight: bold;margin: 0px;">POR PALABRA CLAVE</p></td>
						</tr>
						<tr>
							<td>
							    <fieldset class="search" style="border: 0px; width: 100%;">
							      <input type="text" class="box" id="buscarTodo" style="width: 100%;"/>
							      <input type="submit" class="btn" id="buscador" style="height: 100%; width: 30px;" value="" />
							    </fieldset>
							</td>
						</tr>
					</table>

					<p class="h-no-estyle" style="font-family: roboto; font-size: 10px; font-weight: bold; width: 100%; border-bottom: 2px solid #cbcbcb"></p>

					<table class="tabla-no-borde">
						<tbody>
							<tr>
								<td><p style="font-family: Roboto; font-weight:300; font-size:19px; color: #8b9094; font-weight: bold;margin: 0px;">POR EVENTO</p></td>
							</tr>
							<tr>
								<td class="fila-no-estilo"><a id="academico"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btacademico.png"></a></td>
								<td class="fila-no-estilo"><a id="audiovisual"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btaudiovisual.png"></a></td>
							</tr>
							<tr>
								<td class="fila-no-estilo"><a id="cultural"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btcultural.png"></a></td>
								<td class="fila-no-estilo"><a id="deporteyrecreacion"><img class="evento-swap" id="tipoEvento" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btdeporte.png"></a></td>
							</tr>
							<tr>
								<td class="fila-no-estilo"><a id="digital"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btdigital.png"></a></td>
								<td class="fila-no-estilo"><a id="formaciondeusuarios"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btformacion.png"></a></td>
							</tr>
							<tr>
								<td class="fila-no-estilo"><a id="lecturayescritura"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btlectura.png"></a></td>
								<td class="fila-no-estilo"><a id="memoria"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btmemoria.png"></a></td>
							</tr>
							<tr>
								<td class="fila-no-estilo"><a id="tallercreativo"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/bttaller.png"></a></td>
								<td class="fila-no-estilo"><a id="vacacionescreativas"><img class="evento-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btvacaciones.png"></a></td>
							</tr>
						</tbody>
					</table>
					<!-- FIN TIPO DE EVENTO-->

					<p class="h-no-estyle" style="font-family: roboto; font-size: 10px; font-weight: bold; width: 100%; border-bottom: 2px solid #cbcbcb; padding-top: 3%;"></p>

					<!-- TIPO DE PUBLICO-->
					<table class="tabla-no-borde">
						<tr>
							<td><p style="font-family: Roboto; font-weight:300; font-size:19px; color: #8b9094; font-weight: bold;margin: 0px;">POR PÚBLICO</p></td>
						</tr>
						<tr class="fila-no-estilo">
							<td class="fila-no-estilo"><a id="infantil"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btinfantil.png"></a></td>
							<td class="fila-no-estilo"><a id="jovenes"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btojoven.png"></a></td>
						</tr>
						<tr class="fila-no-estilo">
							<td class="fila-no-estilo"><a id="adultos"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btadulto.png"></a></td>
							<td class="fila-no-estilo"><a id="adultosmayores"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btmayor.png"></a></td>
						</tr>
						<tr class="fila-no-estilo">
							<td class="fila-no-estilo"><a id="familiar"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btfamiliar.png"></a></td>
							<td class="fila-no-estilo"><a id="general"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btgeneral.png"></a></td>
						</tr>
						<tr>
							<td class="fila-no-estilo"><a id="femenino"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/btfemenino.png"></a></td>
							<td class="fila-no-estilo"><a id="personascondiscapacidad"><img class="publico-swap" src="<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/botones/bthandicap.png"></a></td>
						</tr>
					</table>
					<!-- FIN TIPO DE PUBLICO-->

					<p class="h-no-estyle" style="font-family: roboto; font-size: 10px; font-weight: bold; width: 100%; border-bottom: 2px solid #cbcbcb; padding-top: 3%;"></p>

					<table class="tabla-no-borde" style="width:100%;">
						<tr>
							<td><p style="font-family: Roboto; font-weight:300; font-size:19px; color: #8b9094; font-weight: bold;margin: 0px;">POR FECHA</p></td>
						</tr>
						<tr>
							<td>
								<div class="tabla-no-borde" id="datepicker"></div>
							</td>
						</tr>
					</table>
				</div>

<!--
				<div class="calendarViews">
					<dl data-tab data-options="deep_linking:true">
						<script type="text/javascript">
							
						</script>
						<dd class="active">
							<a href="#months" id="vista_anos_button"><i class="fi-thumbnails"></i> VISTA <br /> ANUAL</a>
						</dd>
						<dd>
							<a href="#weeks" id="vista_meses_button"><i class="fi-align-justify"></i> VISTA <br /> MENSUAL</a>
						</dd>
						<dd>
							<a href="#days" id="vista_dias_button"><i class="fi-stop"></i> VISTA <br /> DIARIA</a>
						</dd>
						<dd style="display:none;">
							<a href="#search" ></a>
						</dd>
					</dl>
				</div>
-->
<!--
				<div class="columns medium-12">
					<div class="filters">
						<div class="row">
							<div class="columns medium-12">
								<input type="text" value="" placeholder="Buscar" id="buscar"/>
								<a href="#search" onClick="buscar()"><button class="button round">Buscar...</button></a>
							</div>
						</div>
					</div>
				</div> 
-->
			</div>

			<div class="columns medium-8">
<!--				<h1 class="h-no-estyle" style="font-family: roboto; font-weight: bold; background-color: #2b3057; color: white; width: 100%; padding-left: 6px;"><?php $now = new \DateTime('now'); $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']; $month = $now->format('m'); $year = $now->format('Y'); $mes = (int)$month - 1; echo strtoupper($meses[$mes]); ?>/<?php echo $year; ?></h1>-->
					<h2 id="nombreBibliotecaTabla" style="font-family: Roboto; font-weight:300; font-size:42px; color: #8b9094; padding-bottom: 4px;">Todas las bibliotecas</h2>
					<p class="h-no-estyle" style="font-family: roboto; font-size: 10px; font-weight: bold; width: 100%; border-bottom: 2px solid #cbcbcb"></p>
				<div class="tabs-content">
<!--					<div class="content active" id="months">-->


<!--						<div class="calendar">-->
<!--
							<div class="calendar_heading">
								<div class="row">
									<div class="columns medium-4">
										<div class="medium-text-left">
											<h3>Meses</h3>
											<div id="text-anio"></div>
										</div>
									</div>
								</div>
							</div>
-->
<!--							<div class="calendar_content calendar_content-months">-->
<!--
								<span>Haz clic en cada mes para ver el resumen de eventos</span>
-->
								<div class="calendar-months">

								</div>
<!--							</div>-->
<!--						</div>-->

					<div class="content" id="days">
						<div class="calendar">
							<div class="calendar_heading">
								<div class="row">
									<div class="columns medium-12">
										<div class="medium-text-left" id="nombre_dia">
										</div>
									</div>
								</div>
							</div>
							<div class="calendar_content calendar_content-days">
								<div class="calendar-dia">

								</div>
							</div>
						</div>
					</div>




<!--
						<div class="calendarPager pager-mo">
							<div class="row medium-collapse">
								<div class="columns small-6">
									<div class="medium-text-left">
										<a href="#months" id="ant-ano" ir="<?php echo date('Y')-1;?>">Anterior</a>
									</div>
								</div>
								<div class="columns small-6">
									<div class="medium-text-right">
										<a href="#months"  id="sig-ano" ir="<?php echo date('Y')+1;?>">Siguiente</a>
									</div>
								</div>
							</div>
						</div>
-->
<!--					</div> -->
<!--
					<div class="content" id="weeks">
						<div class="calendar">
							<div class="calendar_heading">
								<div class="row">
									<div class="columns medium-4">
										<div class="medium-text-left">
											<div id="nombre_mes"></div>
										</div>
									</div>
									<div class="columns medium-8">
										<div class="medium-text-right">
										</div>
									</div>
								</div>
							</div>
							<div class="calendar_content calendar_content-weeks">
								<span>Haz clic en cada día para ver el resumen de eventos</span>
								<div class="calendar-mes">

								</div>
							</div>
						</div>
						<div class="calendarPager">
							<div class="row medium-collapse">
								<div class="columns small-6">
									<div class="medium-text-left">
										<a href="#weeks" class="ir-hacia-mes" id="ant-mes">Anterior</a>
									</div>
								</div>
								<div class="columns small-6">
									<div class="medium-text-right">
										<a href="#weeks" class="ir-hacia-mes" id="sig-mes">Siguiente</a>
									</div>
								</div>
							</div>
						</div>
					</div>
-->

<!--
					<div class="content" id="days">
						<div class="calendar">
							<div class="calendar_heading">
								<div class="row">
									<div class="columns medium-12">
										<div class="medium-text-left" id="nombre_dia">
										</div>
									</div>
								</div>
							</div>
							<div class="calendar_content calendar_content-days">
								<div class="calendar-dia">

								</div>
							</div>
						</div>
						<div class="calendarPager">
							<div class="row medium-collapse">
								<div class="columns small-6">
									<div class="medium-text-left">
										<a href="#days" class="ir-hacia-dia" id="ant-dia">Anterior</a>
									</div>
								</div>
								<div class="columns small-6">
									<div class="medium-text-right">
										<a href="#days" class="ir-hacia-dia" id="sig-dia">Siguiente</a>
									</div>
								</div>
							</div>
						</div>
					</div>
-->

<!--
					<div class="content" id="search">
						<div class="calendar">
							<div class="calendar_heading">
								<div class="row">
									<div class="columns medium-12">
										<div class="medium-text-left" id="nombre_search">
										</div>
									</div>
								</div>
							</div>
							<div class="calendar_content calendar_content-days">
								<div class="calendar-search">

								</div>
							</div>
						</div>
					</div>
-->
				</div>
			</div>

		</div>
		<div id="detalle-calendario" class="row">

		</div>
	</article>
</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
