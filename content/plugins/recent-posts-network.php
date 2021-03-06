<?php
/**
 * Plugin Name: Network Recent Posts 
 * Plugin URI: https://github.com/rvega/wordpress-widget-network-recent-posts
 * Description: A widget to display recent posts from all blogs in the network.
 * Version: 1.0
 * Author: Rafael Vega
 * Author URI: http://github.com/rvega
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

function load_network_recent_posts_widget() {
	register_widget( 'Widget_Recent_Posts_Network' );
}
add_action( 'widgets_init', 'load_network_recent_posts_widget' );

/**
 * Recent_Posts_Network widget class
 *
 * @since 2.8.0
 */
class Widget_Recent_Posts_Network extends WP_Widget {
   public function __construct() {
      $widget_ops = array('classname' => 'widget_recent_entries_network', 'description' => __( "Your network&#8217;s most recent Posts.") );
      parent::__construct('recent-posts-network', __('Recent Posts Network'), $widget_ops);
      $this->alt_option_name = 'widget_recent_entries_network';

      add_action( 'save_post', array($this, 'flush_widget_cache') );
      add_action( 'deleted_post', array($this, 'flush_widget_cache') );
      add_action( 'switch_theme', array($this, 'flush_widget_cache') );
   }

   public function widget($args, $instance) {
      $cache = array();
      if ( ! $this->is_preview() ) {
         $cache = wp_cache_get( 'widget_recent_posts_network', 'widget' );
      }

      if ( ! is_array( $cache ) ) {
         $cache = array();
      }

      if ( ! isset( $args['widget_id'] ) ) {
         $args['widget_id'] = $this->id;
      }

      if ( isset( $cache[ $args['widget_id'] ] ) ) {
         echo $cache[ $args['widget_id'] ];
         return;
      }

      ob_start();

      $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

      /** This filter is documented in wp-includes/default-widgets.php */
      $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

      $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
      if ( ! $number )
         $number = 5;
      $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

      // Find posts in all blogs
      $blog_list = wp_get_sites();
      $found_posts = array();
      foreach ($blog_list as $blog) {
         switch_to_blog($blog['blog_id']);

         $query = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
         ) ) );

         while ($query->have_posts()) {
            $query->the_post()
            array_push($found_posts, array(
               'blog_id' => $blog['blog_id'],
               'post_id' => get_the_ID(),
               'date' => get_the_date()
            )
         }

         restore_current_blog();
      }

      // Sort posts by date
      foreach($post in $found_posts){
         echo 'A';
         echo $post; 
      } 


      // if ($r->have_posts()) : ?>
         <?php echo $args['before_widget']; ?>
         <?php if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
         } ?>
         <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
               <li>
                  <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
               <?php if ( $show_date ) : ?>
                  <span class="post-date"><?php echo get_the_date(); ?></span>
               <?php endif; ?>
               </li>
            <?php endwhile; ?>
         </ul>
         <?php echo $args['after_widget']; ?>
         <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();
         
      endif;

      if ( ! $this->is_preview() ) {
         $cache[ $args['widget_id'] ] = ob_get_flush();
         wp_cache_set( 'widget_recent_posts_network', $cache, 'widget' );
      } else {
         ob_end_flush();
      }
   } // Widget function

   public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['number'] = (int) $new_instance['number'];
      $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
      $this->flush_widget_cache();

      $alloptions = wp_cache_get( 'alloptions', 'options' );
      if ( isset($alloptions['widget_recent_entries']) )
         delete_option('widget_recent_entries');

      return $instance;
   }

   public function flush_widget_cache() {
      wp_cache_delete('widget_recent_posts_network', 'widget');
   }

   public function form( $instance ) {
      $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
      $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
      $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false; ?>
      
      <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
      
      <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
      
      <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
      <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
      <?php
   }
}

?>
