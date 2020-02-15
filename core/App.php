<?php
/**
 * App
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/App.php
 */

class App
{
	private $config = [];
	public $db;

	function __construct ()
	{
		ini_set( 'display_errors', 0 );
		error_reporting( E_ERROR | E_WARNING | E_PARSE );

		define( 'URI', $_SERVER['REQUEST_URI'] );
		define( 'ROOT', $_SERVER['DOCUMENT_ROOT'] );
	}

	/**
	 * Autoload
	 */
	public function autoload() : void
	{
		spl_autoload_register( function ( $class ) {
			$class = strtolower( $class );

			if ( file_exists( ROOT . '/core/classes/' . $class . '.php' ) ) {
				require_once( ROOT . '/core/classes/' . $class . '.php' );
			} else if ( file_exists( ROOT . '/core/helpers/' . $class . '.php' ) ) {
				require_once( ROOT . '/core/helpers/' . $class . '.php' );
			}
		} );
	}

	/**
	 * Config
	 */
	public function config() : void
	{
		require_once( ROOT . '/core/config/database.php' );
		require_once( ROOT . '/core/config/session.php' );

		try {
			$this->db = new PDO(
				$this->config['db']['driver'] . ':host=' . $this->config['db']['host'] . ';dbname=' . $this->config['db']['name'],
				$this->config['db']['username'],
				$this->config['db']['password']
			);

			$this->db->query( 'SET NAMES utf8' );
			$this->db->query( 'SET CHARACTER_SET utf8_unicode_ci' );

			$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			error_log(
				'[' . date( 'Y-m-d H:i:s' ) . '] [ERROR] [' . $_SERVER['REMOTE_ADDR'] . '] ' . $e->getMessage() . "\n",
				3,
				'error.log'
			);
			die( $e->getMessage() );
		}
	}

	/**
	 * Start
	 */
	public function start() : void
	{
		session_name( $this->config['session-name'] );
		session_start();

		$route    = explode( '/', URI );
		$route[1] = strtolower( $route[1] );

		if ( file_exists( ROOT . '/app/controllers/' . $route[1] . 'Controller.php' ) ) {
			require( ROOT . '/app/controllers/' . $route[1] . 'Controller.php' );
			$controller = new $route[1]();
		} else {
			require( ROOT . '/app/controllers/MainController.php' );
			$main = new MainController();
		}
	}

}
