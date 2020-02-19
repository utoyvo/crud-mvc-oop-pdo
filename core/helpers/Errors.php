<?php
/**
 * Errors
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/helpers/Errors.php
 */

class Errors
{

	/**
	 * Get
	 */
	public static function get( $errors ) : void
	{
		if ( ! empty( $errors ) ) : ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php foreach ( $errors as $field => $error ) : ?>
					<?= $error; ?><br>
				<?php endforeach; ?>
			</div>
		<?php endif;
	}

}
