<?php
/**
 * RtCamp Task one Plugin
 *
 *
 * @since 1.0.0
 * @package fancy_bookshelf
*/
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}
