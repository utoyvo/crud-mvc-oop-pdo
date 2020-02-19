<?php
/**
 * Post
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/posts/post.php
 */

?>

<section class="card mt-3 mb-3">
	<?php if ( ! empty( $post['post_cover'] ) ) : ?>
	<img src="/<?= $post['post_cover'] ?>" alt="<?= $post['post_title']; ?>" class="card-img-top">
	<?php endif; ?>

	<div class="card-body">
		<?php if ( ! empty( $post ) ) : ?>
		<h1 class="card-title"><?= $post['post_title']; ?></h1>

		<div class="card-text">
			<time datetime="<?= Time::get( $post['post_created'], $post['post_updated'], 'c' ) ?>" class="card-subtitle text-muted">
				<?= Time::get( $post['post_created'], $post['post_updated'], 'Y-m-d H:i' ) ?>
			</time>
			<span> by <span>
			<a href="/users/user/<?= $post['user_id']; ?>"><?= $post['user_name']; ?></a>
		</div>

		<div class="card-text"><?= $post['post_content']; ?></div>

		<div class="mt-3">
			<?php if ( User::author( $post['post_author'] ) || User::role( array( 'admin', 'editor' ) ) ) : ?>
			<a href="/posts/edit/<?= $post['post_id']; ?>" class="btn btn-success btn-sm">Edit</a>
				<?php if ( User::author( $post['post_author'] ) || User::role( array( 'admin' ) ) ) : ?>
				<a href="/posts/delete/<?= $post['post_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm( 'Are you want to DELETE <?= $post['post_title']; ?>?' );">Delete</a>
				<?php endif; ?>
			<?php endif; ?>
			<a href="/" class="btn btn-light btn-sm">Return</a>
		</div>
		<?php else : ?>
		<div class="alert alert-warning mb-0">Empty</div>
		<?php endif; ?>
	</div>
</section>
