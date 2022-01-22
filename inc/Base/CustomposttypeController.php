<?php
/**
 * @package fancy_bookshelf
 */
namespace Inc\Base; 

use Inc\Base\BaseController;

//class will call custompost type creation of book
class CustomposttypeController extends BaseController
{

    /**
     * for register the custom post type call
     * the active function and default function of wp.
     */
    public function register()
    {

        add_action('init', array($this, 'activate'));
        

        // add_action('init',array($this,'register_call'));
        add_theme_support('post-thumbnails');
    }
    /**
     * calling the register_post_type
     *  after init call of custom post type
     *
     * also it will declare meta box
     * and save meta box info by add_action
     * and calling function
     */
    public function activate()
    {
        register_post_type('Book',
            array(
                'labels' => array(
                    'name' => 'Book',
                    'singular_name' => 'Books',
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'thumbnail'),
                // 'show_in_rest'=>true,
            )
        );

    }
   

}
