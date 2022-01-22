<?php
/**
 * @package fancy_bookshelf
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('init', array($this, 'enqueue'));
    }
    public function enqueue()
    {
        // enqueue all our scripts and css files
        wp_enqueue_style('mypluginstyle', $this->plugin_url . '/assets/css/style.css');
    }

}
