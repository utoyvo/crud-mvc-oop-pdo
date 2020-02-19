<?php
/**
 * File
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/helpers/File.php
 */

class File
{

	/**
	 * Delete
	 */
	public static function delete( string $file_path ) : void
	{
		if ( file_exists( $file_path ) ) {
			unlink( $file_path );
		}
	}

	/**
	 * Upload
	 */
	public static function upload( array $file ) : string
	{
		if ( $file['error'] === 0 ) {
			$temp          = explode( '.', $file['name'] );
			$upload_dir    = 'public/uploads/';
			$new_file_name = Str::random() . '.' . end( $temp );
			$file_path     = $upload_dir . $new_file_name;

			if ( move_uploaded_file( $file['tmp_name'], $file_path ) ) {
				$result = $file_path;
			}
		} else {
			$result = '';
		}

		return $result;
	}

	/**
	 * Validate
	 */
	public static function validate( array $file, array $allowed_file_mime_types, int $max_file_size ) : void
	{
		if ( $file['error'] === 0 ) {
			if ( ! in_array( mime_content_type( $file['tmp_name'] ), $allowed_file_mime_types ) ) {
				$errors[] = 'File MIME type not allowed.';
			}

			if ( $file['size'] > $max_file_size ) {
				$errors[] = 'File is too large.';
			}

			if ( $errors ) {
				throw new ValidationException( $errors );
			}
		}
	}

}
