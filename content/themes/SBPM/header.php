
<!DOCTYPE html>
   <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
   <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
   <!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
   <!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
   <head>
      <meta charset="<?php bloginfo( 'charset' ) ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width">
      <title><?php bloginfo('name'); ?></title>
      <meta name="author" content="">
      <link rel="author" href="">
      <?php wp_head() ?>

      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
      <link href='<?php bloginfo('stylesheet_directory'); ?>/css/calendario-eventos.css' rel="stylesheet" type="text/css">
      <style type="text/css">
         .search input.btn {
         background: transparent url(<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/icons/i_search.png) no-repeat 97% center;
         position:absolute; /* important */
         top:3px;
         right:3px;
         cursor: pointer;
         }

         .select-wrapper{
         display: inline-block;
         background: url(<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/dropdown.png) no-repeat 97% center #ddd;
         right:5px;
         cursor: pointer;
         -moz-appearance: none;
         -moz-padding-end: 20px;
         }
      </style>

      <?php
      global $innovati;
      $switchTheme = $innovati['switch-theme'];
      $colorTheme = $innovati['color-theme'];
      if ($switchTheme == true) :
         ?>
         <style media="screen">
         .button,
         .block-orbit .orbit-prev,
         .block-orbit .orbit-next {
            background-color: <?php echo $colorTheme; ?>;
         }
         .theme-color:after {
            background-color: <?php echo $colorTheme; ?>;
         }
         .vc_separator .vc_sep_holder .vc_sep_line {
            height: 3px;
            border-top: 3px solid <?php echo $colorTheme; ?>;
         }
         </style>
      <?php endif; ?>

   </head>
      <body <?php body_class();?> id="<?php echo $innovati['tipo_micrositio']; ?>">
      <!-- Begin .header -->
      <header class="header" role="banner">
         <?php
         global $innovati;
         $switchTheme = $innovati['switch-theme'];
         ?>
         <div class="row <?php if ($switchTheme == true) : echo "medium-uncollapse large-collapse"; endif; ?>">
            <div class="columns <?php if ($switchTheme == true) : echo "medium-2"; else : echo "medium-3"; endif; ?>">
               <div class="logo small-text-center">
                  <?php if($innovati['tipo_micrositio']=='plan_municipal'){ ?>
                     <a href="/plan-municipal-de-lectura"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo_plan.png" alt="Logo" /></a>
                  <?php } else { ?>
                     <a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="Logo" class="main-logo"></a>
                  <?php } ?>
               </div>
            </div>
            <div class="columns medium-9">
               <?php
               $switchSocial = $innovati['switch-social'];
               $spinnerSocial = $innovati['spinner-social'];
               if ($switchSocial == true) :
                  ?>
                  <div class="social social-header">
                     <div class="row">
                        <div class="columns">

                         <?php if($innovati['logo_comfenalco']): ?>
                            <a href="http://www.comfenalcoantioquia.com"><img id="logo-comfenalco" src="<?php bloginfo('stylesheet_directory'); ?>/images/comfenalco.png" alt="Logo Comfenalco Antioquia"></a>
                           
                        <?php endif; ?>
                        
                           <?php if($_SERVER['REQUEST_URI']=='/casa-de-la-lectura-infantil/'): ?>
                             
                            <a href="https://www.medellin.gov.co/irj/portal/ciudadanos?NavigationTarget=navurl://031784aeee1f3003874306b01391da3a"><img id="logo-buencomienzo" src="<?php bloginfo('stylesheet_directory'); ?>/images/buencomienzo.png" alt="Logo Buen Comienzo"></a>
                           <?php endif; ?>

                       
                          <a href="http://www.medellin.gov.co" target="_blank"><img id="logo-alcaldia" src="<?php bloginfo('stylesheet_directory'); ?>/images/logoAlcaldia.png" alt="Logo Alcaldía de Medellín"></a>
                        </div>

                        <div class="columns">
                           <ul class="small-block-grid-3 medium-block-grid-<?php echo $spinnerSocial; ?>">
                              <?php
                              $networks = ["facebook", "twitter", "flickr", "feed", "youtube"];
                              $count = 0;
                              for ($i = 0; $i < count($networks); ++$i) {
                                 $count = $count + 1;
                                 $social = $networks[$i];
                                 $count = $innovati['text-'.$social.'-social'];
                                 if ($count != null) :
                                    ?>
                                    <li> <a href="<?php echo $count; ?>" target="_blank"><span class="icon icon-<?php echo $social; ?>"></span></a> </li>
                                    <?php
                                 endif;
                              }
                              ?>
                           </ul>
                        </div>
                        <div class="columns" id="siguenos">
                           <p class="text-right weight-thin">Síguenos en</p>
                        </div>
                        <div id="search-frm" class="columns">
                           <form action="<?php bloginfo('siteurl'); ?>" class="search-form">
                              <input id="glass" value="" class="button" type="submit">
                              <input id="input-s" name="s" type="search">
                           </form>
                        </div>
                     </div>
                  </div>
               <?php
               else:
               ?>
               <div class="social social-header">
                     <div class="row">
                        <div class="columns medium-4">
                        </div>
                        <div class="columns medium-5">
                        </div>
                        <div class="columns medium-3">
                           <img id="logo-alcaldia" src="<?php bloginfo('stylesheet_directory'); ?>/images/logoAlcaldia.png" alt="logoAlcaldia">
                        </div>
                     </div>
                  </div>
                  <?php
               endif;
               ?>
               <div class="byLine <?php if ($switchHeader != true) : echo "byLine-sites"; endif; ?>">
                  <div class="row">
                     <div class="columns medium-12">
                        <div class="block block-headline">
                           <?php
                           $textTitle = $innovati['text-title'];
                           $textSlogan = $innovati['text-slogan'];
                           $textHeadline = $innovati['text-headline'];
                           ?>
                           <h2 class="font-secondary small-text-center medium-text-right">
                              <?php echo $textTitle; ?>
                           </h2>
                           <h3 class="font-secondary small-text-center medium-text-right">
                              <?php echo $textSlogan; ?>
                           </h3>
                           <?php if(home_url('/', 'http') != 'http://bibliotecasmedellin.gov.co/plan-municipal-de-lectura/'){ ?>
                              <h5 class="font-secondary small-text-center medium-text-right">
                                 <!-- Fix by ninagato required by Shirley -->
                                 <!-- Un programa de la Secretaría de Cultura Ciudadana -->
                              </h5>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- End .header -->
      <?php
      $layoutHeader = $innovati['layout-header'];
      if ($layoutHeader == "headline") :
         $textHeadline = $innovati['text-headline'];
         if ($textHeadline != null) :
            ?>
            <!-- Begin .headline -->
            <div class="headline">
               <div class="row">
                  <div class="columns medium-12">
                     <div class="hgroup">
                        <h3 id="nombreBiblioteca" class="font-secondary weight-thin text-center"><?php if ($textHeadline == 'Parque Biblioteca Tomás Carrasquilla, La Quintana')
                           {
                              echo 'Parque Biblioteca Tomás Carrasquilla - La Quintana';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca León de Greiff, La Ladera')
                           {
                              echo 'Parque Biblioteca León de Greiff - La Ladera';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca Belén')
                           {
                              echo 'Parque Biblioteca Belén';
                           }
                           elseif (($textHeadline == 'Parque Biblioteca Manuel Mejía Vallejo, Guayabal') || ($textHeadline == 'Parque Biblioteca Manuel Mejía Vallejo - Guayabal'))
                           {
                              echo 'Parque Biblioteca Manuel Mejía Vallejo - Guayabal';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca José Horacio Betancur, San Antonio de Prado')
                           {
                              echo 'Parque Biblioteca José Horacio Betancur - San Antonio de Prado';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca España, Santo Domingo')
                           {
                              echo 'Parque Biblioteca España - Santo Domingo';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca Doce de Octubre')
                           {
                              echo 'Parque Biblioteca Doce de Octubre';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca Presbítero José Luis Arroyave, San Javier')
                           {
                              echo 'Parque Biblioteca Presbítero José Luis Arroyave - San Javier';
                           }
                           elseif ($textHeadline == 'Parque Biblioteca Fernando Botero, San Cristóbal')
                           {
                              echo 'Parque Biblioteca Fernando Botero - San Cristóbal';
                           }
                           elseif (($textHeadline == 'Biblioteca Público Escolar Popular No.2') || ($textHeadline == 'Biblioteca Público Escolar Popular No. 2'))
                           {
                              echo 'Biblioteca Público Escolar Popular No.2';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Escolar Granizal')
                           {
                              echo 'Biblioteca Público Escolar Granizal';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Escolar Santa Cruz')
                           {
                              echo 'Biblioteca Público Escolar Santa Cruz';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Corregimental Santa Elena')
                           {
                              echo 'Biblioteca Público Corregimental Santa Elena';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Corregimental El Limonar')
                           {
                              echo 'Biblioteca Público Corregimental El Limonar';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Corregimental San Sebastián de Palmitas')
                           {
                              echo 'Biblioteca Público Corregimental San Sebastián de Palmitas';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Barrial La Floresta')
                           {
                              echo 'Biblioteca Público Barrial La Floresta';
                           }
                           elseif ($textHeadline == 'Biblioteca Público Barrial Fernando Gómez Martínez')
                           {
                              echo 'Biblioteca Público Barrial Fernando Gómez Martínez';
                           }
                           elseif ($textHeadline == 'Biblioteca Centro Occidental')
                           {
                              echo 'Biblioteca Centro Occidental';
                           }
                           elseif (($textHeadline == 'Centro de Documentación Museo Casa de la Memoria') || ($textHeadline == 'Centro de Documentación Casa de la Memoria'))
                           {
                              echo 'Centro de Documentación Museo Casa de la Memoria';
                           }
                           elseif ($textHeadline == 'Centro de Documentación en Primera Infancia Buen Comienzo')
                           {
                              echo 'Centro de Documentación en Primera Infancia Buen Comienzo';
                           }
                           elseif ($textHeadline == 'Centro de Documentación de Medio Ambiente')
                           {
                              echo 'Centro de Documentación de Medio Ambiente';
                           }
                           elseif ($textHeadline == 'Centro de Documentación de Planeación')
                           {
                              echo 'Centro de Documentación de Planeación';
                           }
                           elseif ($textHeadline == 'Archivo Histórico de Medellín')
                           {
                              echo 'Archivo Histórico de Medellín';
                           }
                           elseif ($textHeadline == 'Casa de la Lectura Infantil')
                           {
                              echo 'Casa de la Lectura Infantil';
                           }
                           elseif ($textHeadline == 'Biblioteca Pública Piloto')
                           {
                              echo 'Biblioteca Pública Piloto';
                           }
                           else
                           {
                              echo $textHeadline;
                           }?></h3>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End .headline -->
            <?php
         endif;
      endif;
      ?>
      <!-- Begin .navbar -->
      <nav class="navbar" role="navigation">
         <div class="row">
            <div class="columns large-12">
               <div class="top-bar" data-topbar data-topbar="">
                  <section class="top-bar-section">
                     <ul class="left">
                        <?php
                           $menuParameters = array(
                              'container' => false,
                              'menu' => 'Principal',
                              'echo' => true,
                              'items_wrap' => '%3$s'
                           );
                           // echo strip_tags(wp_nav_menu($menuParameters), '<a>');
                           $items = wp_get_nav_menu_items('Principal');
                           $need_to_close = false;
                           for ($i = 0; $i < count($items); $i++) {
                              $item = $items[$i];
                              if($item->menu_item_parent == 0){
                                 $has_children = '';
                                 $next_item = $items[$i+1];
                                 if($next_item->menu_item_parent == $item->db_id){
                                    $has_children = ' has-dropdown not-click ';
                                 }
                                 if($need_to_close){
                                    echo '</ul>';
                                    $need_to_close = false;
                                 }
                                 echo '<li id="menu-item-' . $item->db_id . '" class=" '.$has_children .' menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-7 current_page_item menu-item-' . $item->db_id . '">';
                                 echo '<a href="'.$item->url.'">'.$item->title.'</a>';
                                 echo '<ul class="dropdown">';
                                 $need_to_close = true;
                                 echo '</li>';
                              }
                              else{
                                 echo '<li id="menu-item-' . $item->db_id . '" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-' . $item->db_id . '"><a href="'.$item->url.'">'.$item->title.'</a></li>';
                              }
                           }
                           if($need_to_close){
                              echo '</ul>';
                              $need_to_close = false;
                           }
                        ?>
                     </ul>
                     <ul class="right">
                        <?php
                        $menuParameters = array(
                           'container' => false,
                           'menu' => 'Secundario',
                           'echo' => true,
                           'items_wrap' => '%3$s',
                           'fallback_cb' => 'false'
                        );
                        echo strip_tags(wp_nav_menu($menuParameters), '<a>');
                        ?>
                     </ul>
                  </section>
                  <ul class="title-area">
                     <li class="toggle-topbar menu-icon"> <a href="#"><span>menu</span></a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <!-- End .navigation -->
