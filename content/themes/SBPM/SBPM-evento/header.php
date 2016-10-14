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
   <body <?php body_class() ?>>
      <!-- Begin .header -->
      <header class="header" role="banner">
         <?php
         global $innovati;
         $switchTheme = $innovati['switch-theme'];
         ?>
         <div class="row">
            <div class="columns medium-2">
               <div class="logo small-text-center">
                  <a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="Logo" /></a>
               </div>
            </div>
            <div class="columns medium-10">
               <div id="header-logos">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logoAlcaldia.png" alt="logoAlcaldia"/>
               </div>
            </div>
         </div>
      </header>

      <?php
         $textTitle = $innovati['text-title'];
         $textSlogan = $innovati['text-slogan'];
         $textHeadline = $innovati['text-headline'];
         $imageURL = $innovati['image-url']['url'];
         $imageSmallURL = $innovati['image-small-url']['url'];
      ?>
      <div class="header2-small">
         <a href="<?php echo bloginfo('url'); ?>">
            <img src="<?php echo $imageSmallURL; ?>"/>
         </a>
      </div>

      <div class="header2-big">
         <div class="row" style="background-image:url('<?php echo $imageURL; ?>');">
            <div class="columns medium-12">
               <h1>
                  <a href="<?php echo bloginfo('url'); ?>">
                     <?php echo $textTitle; ?>
                  </a>
               </h1>
               <h2>
                  <?php echo $textSlogan; ?>
               </h2>
               <h3>
                  <?php echo $textHeadline; ?>
               </h3>
            </div>
         </div>
      </div>
      <!-- End .header -->

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
                           'items_wrap' => '%3$s'
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
