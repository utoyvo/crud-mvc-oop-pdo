<?php
/**
 * Time
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/helpers/Time.php
 */

class Time
{

	/**
	 * Get
	 *
	 * Time format examples:
	 * с                – 1970-01-01T00:00:00+00:00
	 * F j, Y g:i a     – January 1, 1970 00:00 am
	 * F j, Y           – January 1, 1970
	 * F, Y             – January, 1970
	 * g:i a            – 00:00 am
	 * g:i:s a          – 00:00:00 am
	 * l, F jS, Y       – Thursday, January 1th, 1970
	 * M j, Y @ G:i     – Jan 1, 1970 @ 0:00
	 * Y/m/d \a\t g:i A – 1970/01/01 at 00:00 AM
	 * Y/m/d \a\t g:ia  – 1970/01/01 at 00:00am
	 * Y/m/d g:i:s A    – 1970/01/01 00:00:00 AM
	 * Y/m/d            – 1970/01/01
	 */
	public static function get( string $time_created, string $time_updated = '0000-00-00 00:00:00', string $time_format = 'Y-m-d H:i' ) : string
	{
		$time = $time_updated != '0000-00-00 00:00:00' ? $time_updated : $time_created;
		$time = date( $time_format, strtotime( $time ) );

		return $time;
	}

}
