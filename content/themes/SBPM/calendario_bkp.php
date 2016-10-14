<?php
/*
Template Name: Calendario
*/
get_header(); ?>
<div role="main">
	<article id="page-<?php the_ID() ?>">
		<div class="row">
			<div class="columns medium-6">
				<h1>Calendario</h1>
				<div class="tabs-content">
					<div class="content active" id="months">
						<div class="calendar">
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
							<div class="calendar_content calendar_content-months">
								<span>Haz clic en cada mes para ver el resumen de eventos</span>
								<div class="calendar-months">

								</div>
							</div>
						</div>
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
					</div>
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
				</div>
			</div>
			<div class="columns medium-6">
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
			</div>
		</div>
	</article>
</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
