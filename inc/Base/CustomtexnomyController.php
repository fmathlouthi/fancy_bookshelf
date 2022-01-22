<?php
/**
 * @package fancy_bookshelf
 */
namespace Inc\Base;

use Inc\Base\BaseController;

class CustomtexnomyController extends BaseController
{
    /**
     * for register the custom texnomy
     * the active function and default function of wp.
     */
    public function register()
    {
        add_action('init', array($this, 'activate'));
    }

    public function activate()
    {
        $labels = array(
            'name' => _x('Genre', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('book Genre', 'taxonomy singular name', 'textdomain'),
            'search_items' => __('Search book categories', 'textdomain'),
            'all_items' => __('All book categories', 'textdomain'),
            'parent_item' => __('Parent book Genre', 'textdomain'),
            'parent_item_colon' => __('Parent book Genre:', 'textdomain'),
            'edit_item' => __('Edit book Genre', 'textdomain'),
            'update_item' => __('Update book Genre', 'textdomain'),
            'add_new_item' => __('Add New book Genre', 'textdomain'),
            'new_item_name' => __('New book Genre Name', 'textdomain'),
            'menu_name' => __('Genre', 'textdomain'),
        );
        $args = array(
            'labels' => $labels,
            'description' => __('Genre', 'textdomain'),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var'=>true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => true,
            'rewrite'=>array('slug'=>'book-genre'),
            'show_in_rest' => true,
        );
        register_taxonomy('genre',array('book'), $args);
    }
}
