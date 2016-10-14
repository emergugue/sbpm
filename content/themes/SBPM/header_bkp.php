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
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>      <?php
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
      <style>
         .tabla-no-borde
         {
            border: 0px;
            padding: 1px;
            margin: 0px;
            background-color: white;
            border-color:white;
            float: center;
         }
         .tabla-no-borde table,
         .tabla-no-borde thead,
         .tabla-no-borde th,
         .tabla-no-borde tbody,
         .tabla-no-borde tr,
         .tabla-no-borde td 
         {
            border: 0px;
            padding: 1px;
            margin: 0px;
            background-color: white;
            border-color:white;
            float: center;
         }
         .h-no-estyle h1,
         .h-no-estyle h2,
         .h-no-estyle h3,
         .h-no-estyle h4{
            font-weight: normal;  
            padding: 1px;
            margin: 0px;
            background-color: white;
         }
         .fila-no-estilo{
            background-color: white;
            padding: 3px;
            margin: 0px;
            background-color: white;
         }
         .dataTables_filter 
         { 
            float: right; 
            text-align: right; 
            visibility: hidden; 
            display:none;
         }
         .dataTables_wrapper table thead{
             display:none;
         }
         .dataTables_wrapper .row{
             height: 0%;
         }
         .bb {
            border-bottom: 10px solid black;
         }

         .search {
         background: transparent 0 0 no-repeat;
         margin-top:10px;
         position:relative; /* This is necessary to absolutely position your search button image later */
         }

         .search input {border:none;} /* Prevents form input elements from having the default border placed around the element */

         .search input.box {
         background-color:#ddd;
         position:absolute; /* important */
         bottom:0;
         left:5px;
         }
         .search input.btn {
         margin-top:5px;
         margin-bottom:5px;
         background: transparent url(<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/icons/i_search.png) 0 0 no-repeat;
         position:absolute; /* important */
         top:5px;
         right:5px;
         cursor: pointer;
         }

   .select-wrapper{
      display: inline-block;
      border: 1px solid #d8d8d8;            
      background: url(<?php bloginfo('stylesheet_directory'); ?>/images/iconos_nuevos/dropdown.png) no-repeat right center #ddd;
      right:5px;
      cursor: pointer;
      -moz-appearance: none;
   }

   .select-wrapper select{
      margin: 0;
      position: absolute;
      z-index: 2;            
      cursor: pointer;
      outline: none;
      /* CSS hacks for older browsers */
      _noFocusLine: expression(this.hideFocus=true); 
      -webkit-appearance: none;
      -moz-appearance: none;
      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      -khtml-opacity: 0;
      -moz-opacity: 0;
   }


      </style>
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
                     <a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="Logo" /></a>
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
                                 Un programa de la Secretaría de Cultura Ciudadana
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
                        <h3 class="font-secondary weight-thin text-center"><?php echo $textHeadline; ?></h3>
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
