<?php
/**
 * Panel
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/users/panel.php
 */

?>

<div class="mb-3">
	<?php if ( isset( $_SESSION['user'] ) ) : ?>
	<a href="#" id="user-panel" style="display: inline-block" data-toggle="dropdown">
		<?= User::gravatar( $_SESSION['user']['email'], 38, 'monsterid', 'g', true, array( 'alt' => $_SESSION['user']['name'], 'class' => 'img-fluid rounded' ) ); ?>
	</a>

	<div class="dropdown-menu" aria-labelledby="user-panel">
		<a href="/users/user/<?= $_SESSION['user']['id']; ?>" class="dropdown-item">@<?= $_SESSION['user']['name']; ?></a>
		<a href="/users/edit/<?= $_SESSION['user']['id']; ?>" class="dropdown-item">Edit</a>
		<div class="dropdown-divider"></div>
		<a href="/posts" class="dropdown-item">Posts</a>
		<div class="dropdown-divider"></div>
		<a href="/users" class="dropdown-item">Users</a>
		<div class="dropdown-divider"></div>
		<a href="/users/sign_out" class="dropdown-item">Sign Out</a>
	</div>

	<a href="/posts/add" class="btn btn-primary">Add Post</a>
	<?php else : ?>
	<a href="/users/sign_in" class="btn btn-primary">Sign In</a>
	<a href="/users/sign_up" class="btn btn-success">Sign Up</a>
	<?php endif; ?>
</div>
