<?php
/**
 * Posts Controller
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/controllers/PostsController.php
 */

class PostsController extends Controller
{

	/**
	 * Index
	 *
	 * http://localhost/posts
	 */
	public function index() : void
	{
		$this->model( 'PostsModel' );

		$pagination = $this->PostsModel->pagination( 'posts', ( int )$_GET['page'], 5 );
		$sort       = $this->PostsModel->sort( 'post_', ( string )$_GET['sort'], array( 'title', 'time', 'content', 'author' ) );

		$posts = $this->PostsModel->readPosts( $pagination, $sort );

		$data = array(
			'title'      => 'Posts',
			'posts'      => $posts,
			'pagination' => $pagination,
		);

		$this->view( 'posts/posts', $data );
	}

	/**
	 * Post
	 *
	 * http://localhost/posts/post/[$post_id]
	 */
	public function post( $post_id = 0 ) : void
	{
		$this->model( 'PostsModel' );

		$post = $this->PostsModel->readPost( ( int )$post_id );

		$data = array(
			'title' => $post['post_title'] ?? '',
			'post'  => $post,
		);

		$this->view( 'posts/post', $data );
	}

	/**
	 * Add
	 *
	 * http://localhost/posts/add
	 */
	public function add() : void
	{
		$this->model( 'PostsModel' );

		if ( ! User::login() ) {
			Site::redirect( '/users/sign_in' );
		}

		if ( isset( $_POST['post-add'] ) ) {
			try {
				$this->PostsModel->addPost( array(
					'title'   => $_POST['post-title'],
					'author'  => $_SESSION['user']['id'],
					'content' => $_POST['post-content'],
					'cover'   => $_FILES['post-cover'],
				) );
			} catch ( ValidationException $e ) {
				$errors = $e->getError();
			}
		}

		$data = array(
			'title'  => 'Add Post',
			'errors' => $errors,
		);

		$this->view( 'posts/add', $data );
	}

	/**
	 * Edit
	 *
	 * http://localhost/posts/edit/[$post_id]
	 */
	public function edit( $post_id = 0 ) : void
	{
		$this->model( 'PostsModel' );

		$post = $this->PostsModel->readPost( ( int )$post_id );

		if ( ! User::author( ( int )$post['post_author'] ) && ! User::role( array( 'admin', 'editor' ) ) ) {
			Site::redirect( '/' );
		}

		if ( isset( $_POST['post-edit'] ) ) {
			try {
				$this->PostsModel->editPost( array(
					'id'      => ( int )$post_id,
					'title'   => $_POST['post-title'],
					'content' => $_POST['post-content'],
					'cover'   => $_FILES['post-cover'],
				) );
			} catch ( ValidationException $e ) {
				$errors = $e->getError();
			}
		}

		$data = array(
			'title'  => 'Edit ' . $post['post_title'],
			'post'   => $post,
			'errors' => $errors,
		);

		$this->view( 'posts/edit', $data );
	}

	/**
	 * Delete
	 *
	 * http://localhost/posts/delete/[$post_id]
	 */
	public function delete( $post_id = 0 ) : void
	{
		$this->model( 'PostsModel' );

		$post = $this->PostsModel->readPost( ( int )$post_id );

		if ( ! User::author( $post['post_author'] ) && ! User::role( array( 'admin' ) ) ) {
			Site::redirect( '/' );
		}

		if ( ! empty( $post['post_cover'] ) ) {
			File::delete( $post['post_cover'] );
		}

		$this->PostsModel->deletePost( ( int )$post_id );
	}

}

class_alias( 'PostsController', 'Posts' );
