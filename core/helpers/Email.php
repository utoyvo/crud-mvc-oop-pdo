<?php
/**
 * Email
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/helpers/Email.php
 */

class Email
{

	/**
	 * Validate
	 */
	public static function validate( string $email ) : void
	{
		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$errors[] = 'Email address is invalid.';
		}

		if ( ! empty( $errors ) ) {
			throw new ValidationException( $errors );
		}
	}

}
