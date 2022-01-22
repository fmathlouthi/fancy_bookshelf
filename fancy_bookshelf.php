<?php
/**
 *
 * @package fancy_bookshelf
 *
 * @worpress-plugin
 * Plugin Name:       fancy_bookshelf
 * Version:           1.0.0
 * Author:            fadi mathlouthi
 */

defined('ABSPATH') or die('You are not allowed!');

use Inc\Base\Activate;
use Inc\Base\Deactivate;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

register_activation_hook(__FILE__, 'activate_wpbook_plugin');
register_deactivation_hook(__FILE__, 'deactivate_wpbook_plugin');

function activate_wpbook_plugin()
{
    Activate::activate();
}

function deactivate_wpbook_plugin()
{
    Deactivate::deactivate();
}

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
// >> Create Shortcode to Display Movies Post Types
  
function diwp_create_shortcode_book_post_type(){
  
    $args = array(
                    'post_type'      => 'book',
                    'posts_per_page' => '5',
                    'publish_status' => 'published',
                 );
                 $result='<div class="albums">';
    $query = new WP_Query($args);
  
    if($query->have_posts()) :
  
        while($query->have_posts()) :
  
            $query->the_post() ;
                      
        $result .= '<div class="album">';
        $result.='  <div class="img-wrapper"><img src="https://via.placeholder.com/100" alt="img placeholder"></div>';
       $result.='<div class="album-info">';
        $result .= '<div class="title">' . get_the_title() . '</div>';
        $terms = get_the_terms( $post->ID, 'year' );
        foreach ( $terms as $term ) {
            $result .= '<div class="album-name"><strong>Year:</strong>' . $term->name . '</div>'; 
        }
        $termsgenre = get_the_terms( $post->ID, 'genre' );
        foreach ( $termsgenre as $term ) {
            $result .= '<div class="album-name"><strong>Genre:</strong>' . $term->name . '</div>'; 
        }
       
        $result .= '</div>';
        $result .= '</div>';
  
        endwhile;
        $result .= '</div>';
        wp_reset_postdata();
  
    endif;    
  
    return $result;            
}
  
add_shortcode( 'fancy_bookshelf', 'diwp_create_shortcode_book_post_type' ); 


class WP_Widget_Plugin extends WP_Widget
{
    public function __construct()
    {
        // initialize widget name, id or other attributes
        parent::__construct("owt-wp-widget", "WP Widget fancy bookshelf", array(
            "description" => "Sample Widget Plugin created for learning",
        ));
        add_action("widgets_init", function () {
            register_widget("WP_Widget_Plugin");
        });
    }

    public function form($instance)
    {
        echo do_shortcode('[fancy_bookshelf]');
    }

    public function widget($args, $instance)
    {
        echo do_shortcode('[CONTACT-US-FORM]');

    }

    public function update($new_instance, $old_instance)
    {
      
        return do_shortcode('[fancy_bookshelf]');
    }
}

$wp_plugin_widget_object = new WP_Widget_Plugin();

