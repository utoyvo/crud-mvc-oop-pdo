<?php
/**
 * Validation Exception
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/classes/ValidationException.php
 */

class ValidationException extends Exception
{
	public $errors;

	function __construct( $errors )
	{
		$this->errors = $errors; 
	}

	public function getError()
	{
		return $this->errors;
	}
}
