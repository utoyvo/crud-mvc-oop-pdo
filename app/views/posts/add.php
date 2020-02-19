<?php
/**
 * Add
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/views/posts/add.php
 */

?>

<section class="card mt-3 mb-3">
	<div class="card-body">
		<h1 class="card-title">Add Post</h1>

		<?php Errors::get( $errors ); ?>

		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="post-title">Title <span style="color:#f00">*</span></label>
				<input type="text" name="post-title" id="post-title" class="form-control" max="255" required>
			</div>

			<div class="form-group">
				<label for="post-content">Content</label>
				<textarea name="post-content" id="post-content" class="form-control"></textarea>
			</div>

			<img src="#" alt="Cover" id="prev" class="img-fluid rounded mb-3 w-100">

			<div class="input-group mb-3">
				<div class="custom-file">
					<input type="file" name="post-cover" id="post-cover" class="custom-file-input mx-sm-3" aria-describedby="post-cover" size="5000000" accept=".jpg, .jpeg, .png, .gif">
					<label class="custom-file-label" for="post-cover">Choose file</label>
				</div>
				<div class="input-group-append">
					<a id="post-cover-reset" class="btn btn-outline-secondary">Reset</a>
				</div>
			</div>

			<button type="submit" name="post-add" class="btn btn-primary">Add</button>
			<a href="/" class="btn btn-light">Cancel</a>
		</form>
	</div>
</section>
