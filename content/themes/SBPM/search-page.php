<?php
/*
 * Template Name: Search Page
 */
?>
<?php get_header(); ?>
<div role="main">
   <style>
      form .row{
         min-height: 300px;
      }
       #input-s{
          height:45px; 
       }
      .vc_col-md-4{
         display: inline-block;
         width:33%;
      }
      .vc_col-md-8{
         float:left;
         width:33%;
         margin-right: 20px;
      } 
   </style>
   <?php get_template_part('loop', 'page'); ?>
   <?php get_search_form(); ?>
</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
