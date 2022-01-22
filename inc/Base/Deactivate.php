<?php
/**
 * RtCamp Task one Plugin
 *
 *
 * @link http://example.com/
 * @since 1.0.0
 * @package fancy_bookshelf
*/
namespace Inc\Base;

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}
