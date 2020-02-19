<?php
/**
 * User
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/helpers/User.php
 */

class User
{

	/**
	 * Author
	 */
	public static function author( int $author_id ) : bool
	{
		return $_SESSION['user']['id'] == $author_id ? true : false;
	}

	/**
	 * Gravatar
	 *
	 * @source https://gravatar.com/site/implement/images/php/
	 */
	public static function gravatar( string $email, int $s = 64, string $d = 'monsterid', string $r = 'g', bool $img = false, array $atts = array() ) : string
	{
		$url  = 'https://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= '?s=' . $s . '&d=' . $d . '&r=' . $r;

		if ( $img ) {
			$url = '<img src="' . $url . '"';

			foreach ( $atts as $key => $val ) {
				$url .= ' ' . $key . '="' . $val . '"';
			}

			$url .= ' />';
		}

		return $url;
	}

	/**
	 * Login
	 */
	public static function login() : bool
	{
		return isset( $_SESSION['user'] ) ? true : false;
	}

	/**
	 * Panel
	 */
	public static function panel() : void
	{
		require_once( ROOT . '/app/views/users/panel.php' );
	}

	/**
	 * Role
	 */
	public static function role( array $roles ) : bool
	{
		return in_array( $_SESSION['user']['role'], $roles ) ? true : false;
	}

}
