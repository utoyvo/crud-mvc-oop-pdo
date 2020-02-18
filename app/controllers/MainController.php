<?php
/**
 * Main Controller
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/controllers/MainController.php
 */

class MainController extends Controller
{

	/**
	 * Index
	 *
	 * http://localhost/
	 */
	public function index()
	{
		Site::redirect( '/posts' );
	}

}
