<?php
/**
 * @package fancy_bookshelf
 */
namespace Inc\Base;

use Inc\Base\BaseController;

class CustomtexnomyTagcontroller extends BaseController
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
            'name'              => _x( 'Year', 'taxonomy general name', 'fancy_bookshelf' ),
            'singular_name'     => _x( 'Year', 'taxonomy singular name', 'fancy_bookshelf' ),
            'search_items'      => __( 'Search book Year', 'fancy_bookshelf' ),
            'all_items'         => __( 'All book Year', 'fancy_bookshelf' ),
            'parent_item'       => __( 'Parent Book Year', 'fancy_bookshelf' ),
            'parent_item_colon' => __( 'Parent Book Year:', 'fancy_bookshelf' ),
            'edit_item'         => __( 'Edit Book Year', 'fancy_bookshelf' ),
            'update_item'       => __( 'Update Book Year', 'fancy_bookshelf' ),
            'add_new_item'      => __( 'Add New Book Year', 'fancy_bookshelf' ),
            'new_item_name'     => __( 'New Book Tag Year', 'fancy_bookshelf' ),
            'menu_name'         => __( 'Year', 'fancy_bookshelf' ),
        );
        $args = array(
            'labels' => $labels,
            'description' => __('Year', 'textdomain'),
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
            'rewrite'=>array('slug'=>'book-year'),
            'show_in_rest' => true,
        );
        register_taxonomy('year', array('book'), $args);
    }
}
