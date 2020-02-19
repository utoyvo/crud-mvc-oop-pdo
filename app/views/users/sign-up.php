<?php
/**
 * Sign Up
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/users/sign-up.php
 */

?>

<section class="card mt-3 mb-3">
	<div class="card-body">
		<h1 class="card-title">Sign Up</h1>

		<?php Errors::get( $errors ); ?>

		<form action="" method="POST">
			<div class="form-group">
				<label for="user-name">Name</label>
				<input type="text" name="user-name" id="user-name" class="form-control" max="255" required>
			</div>

			<div class="form-group">
				<label for="user-email">Email</label>
				<input type="email" name="user-email" id="user-email" class="form-control" max="255" required>
			</div>

			<div class="form-group">
				<label for="user-password">Password</label>
				<input type="password" name="user-password" id="user-password" class="form-control" max="255" required>
			</div>

			<button type="submit" name="sign-up" class="btn btn-success">Sign Up</button>
			<a href="/" class="btn btn-light">Cancel</a>
		</form>

		<p class="card-text text-center mt-3">Are you have an account? <a href="/users/sign_in">Sign In</a>.</p>
	</div>
</section>
