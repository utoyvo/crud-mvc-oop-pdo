<?php
/**
 * Edit
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/users/edit.php
 */

?>

<section class="card mt-3 mb-3">
	<div class="card-body">
		<?php if ( ! empty( $user ) ) : ?>
		<div class="row">
			<div class="col-lg-3 col-sm-12">
				<?= User::gravatar( $user['user_email'], 256, 'monsterid', 'g', true, array( 'alt' => $user['user_name'], 'class' => 'img-fluid rounded mb-3 w-100' ) ); ?>

				<p class="card-text">Change your <a href="https://gravatar.com/" target="_blank">Gravatar</a>.</p>
				<p class="card-text">Last edit <?= Time::get( $user['user_created'], $user['user_updated'], 'Y-m-d H:i' ); ?></p>
				<a href="/" class="btn btn-light btn-block">Cancel</a>
			</div>

			<div class="col-lg-9 col-sm-12">
				<h1 class="card-title">Edit <?= $user['user_name']; ?></h1>

				<?php Errors::get( $errors ); ?>

				<div class="card mb-3">
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group">
								<label for="user-name">Name</label>
								<input type="text" name="user-name" id="user-name" class="form-control" max="255" value="<?= $user['user_name']; ?>" required>
							</div>

							<div class="form-group">
								<label for="user-email">Email</label>
								<input type="email" name="user-email" id="user-email" class="form-control" max="255" value="<?= $user['user_email']; ?>" required>
							</div>

							<button type="submit" name="user-edit" class="btn btn-success">Edit</button>
						</form>
					</div>
				</div>

				<?php if ( ! User::author( $user['user_id'] ) && User::role( array( 'admin' ) ) ) : ?>
				<div class="card mb-3">
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group">
								<label for="user-role" class="h2">Role</label>
								<select name="user-role" id="user-role" class="custom-select">
								<?php foreach ( $roles = array( 'admin', 'editor', 'user' ) as $role ) : ?>
									<?php $selected = $user['user_role'] == $role ? 'selected' : NULL; ?>
									<option value="<?= $role; ?>" <?= $selected; ?>><?= $role; ?></option>
								<?php endforeach; ?>
								</select>
							</div>

							<button type="submit" name="user-change-role" class="btn btn-success">Change Role</button>
						</form>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( User::author( $user['user_id'] ) ) : ?>
				<div class="card mb-3">
					<div class="card-body">
						<h2 class="card-title">Change password</h2>

						<form action="" method="POST">
							<div class="form-group">
								<label for="old-password">Old Password</label>
								<input type="password" name="old-password" id="old-password" class="form-control" max="255" required>
							</div>

							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" name="new-password" id="new-password" class="form-control" max="255" required>
							</div>

							<div class="form-group">
								<label for="confirm-new-password">Confirm New Password</label>
								<input type="password" name="confirm-new-password" id="confirm-new-password" class="form-control" max="255" required>
							</div>

							<button type="submit" name="user-change-password" class="btn btn-success">Change Password</button>
						</form>
					</div>
				</div>
				<?php endif; ?>

				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Delete <?= $user['user_name']; ?></h2>
						<a href="/users/delete/<?= $user['user_id']; ?>" class="btn btn-danger" onclick="return confirm( 'Are you want to DELETE @<?= $user['user_name']; ?>?' );">Delete</a>
					</div>
				</div>
			</div>
		</div>
		<?php else : ?>
		<div class="alert alert-warning mb-0">Empty</div>
		<?php endif; ?>
	</div>
</section>
