<?php
/**
 * User
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/users/user.php
 */

?>

<section class="card mt-3 mb-3">
	<?php if ( $user['user_cover'] ) : ?>
	<img src="/<?= $user['user_cover'] ?>" alt="<?= $user['user_name']; ?>" class="card-img-top">
	<?php endif; ?>

	<div class="card-body">
		<?php if ( ! empty( $user ) ) : ?>
		<div class="row">
			<div class="col-lg-3 col-sm-12">
				<?= User::gravatar( $user['user_email'], 256, 'monsterid', 'g', true, array( 'alt' => $user['user_name'], 'class' => 'img-fluid rounded mb-3 w-100' ) ); ?>

				<?php if ( User::author( $user['user_id'] ) || User::role( array( 'admin' ) ) ) : ?>
				<a href="/users/edit/<?= $user['user_id']; ?>" class="btn btn-success btn-block">Edit</a>
					<?php if ( User::author( $user['user_id'] ) ) : ?>
					<a href="/users/sign_out" class="btn btn-outline-danger btn-block">Sing Out</a>
					<?php endif; ?>
				<?php endif; ?>
				<a href="/" class="btn btn-light btn-block">Return</a>
			</div>

			<div class="col-lg-9 col-sm-12">
				<h1 class="card-title"><?= $user['user_name']; ?></h1>

				<p class="card-text"><a href="mailto:<?= $user['user_email']; ?>"><?= $user['user_email']; ?></a></p>
				<p class="card-text">Role <?= $user['user_role']; ?>.</p>
				<p class="card-text">Registered	<?= Time::get( $user['user_created'], $user['user_updated'], 'Y-m-d H:i' ) ?></p>
			</div>
		</div>
		<?php else : ?>
		<div class="alert alert-warning mb-0">User does not exist.</div>
		<?php endif; ?>
	</div>
</section>
