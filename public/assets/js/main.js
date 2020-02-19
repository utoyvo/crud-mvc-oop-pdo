/**
 * Main
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/public/assets/js/main.php
 */

jQuery( function () {

	/**
	 * Upload File
	 */

	/*
	 * Real URL
	 */
	function readURL( input ) {
		if ( input.files && input.files[0] ) {
			var reader = new FileReader();
			reader.onload = function( e ) {
				$( '#prev' ).attr( 'src', e.target.result );
			}

			reader.readAsDataURL( input.files[0] );
		}
	}

	// Prev
	$( '#post-cover' ).change( function() {
		readURL( this );
	} );

	// Reset
	$( '#post-cover-reset' ).on( 'click', function() {
		$( '#post-cover' ).val( '' );
		$( '#prev' ).attr( 'src', '' );
	} );

	/**
	 * Tolltip
	 */
	$( '[data-toggle="tooltip"]' ).tooltip();
} );
