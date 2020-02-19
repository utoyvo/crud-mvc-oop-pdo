<?php
/**
 * Posts
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/posts/posts.php
 */

?>

<section class="card mt-3 mb-3">
	<div class="card-body">
		<h1 class="card-title">Posts</h1>

		<?php User::panel(); ?>

		<?php if ( ! empty( $posts ) ) : ?>
		<table class="table table-striped mb-0">
			<thead>
				<tr>
					<th>Cover</th>
					<th><a href="/posts/?sort=title">Title</a></th>
					<th><a href="/posts/?sort=time">Time</a></th>
					<th><a href="/posts/?sort=content">Content</a></th>
					<th><a href="/posts/?sort=author">Author</a></th>
					<?php if ( User::login() ) : ?>
					<th>Actions</th>
					<?php endif; ?>
				</tr>
			</thead>

			<tbody>
				<?php foreach ( $posts as $post ) : ?>
				<tr>
					<td>
						<?php if ( $post['post_cover'] ) : ?>
						<a href="/posts/post/<?= $post['post_id']; ?>">
							<img src="/<?= $post['post_cover']; ?>" alt="<?= $post['post_title']; ?>" class="img-fluid rounded" style="height: 32px">
						</a>
						<?php endif; ?>
					</td>

					<td><a href="/posts/post/<?= $post['post_id']; ?>"><?= mb_strimwidth( $post['post_title'], 0, 16, '...' ); ?></a></td>

					<td>
						<time datetime="<?= Time::get( $post['post_created'], $post['post_updated'], 'c' ); ?>">
							<?= Time::get( $post['post_created'], $post['post_updated'], 'Y-m-d H:i' ); ?>
						</time>
					</td>

					<td><?= mb_strimwidth( strip_tags( $post['post_content'] ), 0, 32, '...' ); ?></td>

					<td>
						<a href="/users/user/<?= $post['user_id']; ?>" data-toggle="tooltip" data-placement="left" title="<?= $post['user_name']; ?>">
							<?= User::gravatar( $post['user_email'], 32, 'monsterid', 'g', true, array( 'alt' => $post['user_name'], 'class' => 'img-fluid rounded' ) ); ?>
						</a>
					</td>

					<?php if ( User::login() ) : ?>
					<td>
						<?php if ( User::author( $post['post_author'] ) || User::role( array( 'admin', 'editor' ) ) ) : ?>
						<a href="/posts/edit/<?= $post['post_id']; ?>" class="btn btn-success btn-sm">Edit</a>
							<?php if ( User::author( $post['post_author'] ) || User::role( array( 'admin' ) ) ) : ?>
							<a href="/posts/delete/<?= $post['post_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm( 'Are you want to DELETE <?= $post['post_title']; ?>?' );">Delete</a>
							<?php endif; ?>
						<?php endif; ?>
					</td>
					<?php endif; ?>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php Site::pagination( $pagination ); ?>

		<?php else : ?>
		<div class="alert alert-warning mb-0">Empty.</div>
		<?php endif; ?>
	</div>
</section>
