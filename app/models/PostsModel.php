<?php
/**
 * Posts Model
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/app/models/PostsModel.php
 */

class PostsModel extends Model
{

	/**
	 * Read Posts
	 */
	public function readPosts( array $pagination, array $sort ) : array
	{
		$sql = Sql::query()
			->select( 'post_id, post_created, post_updated, post_title, post_content, post_author, post_cover, user_id, user_name, user_email' )
			->from( 'posts' )
			->innerJoin( 'users' )
			->on( 'posts.post_author = users.user_id' )
			->orderBy( $sort['by'] . ' ' . $sort['order'] )
			->limit( $pagination['start'] . ', ' . $pagination['perpage'] )
			->get();

		$stmt = $this->db->prepare( $sql );
		$stmt->execute();

		return $stmt->fetchAll( PDO::FETCH_ASSOC );
	}

	/**
	 * Read Post
	 */
	public function readPost( int $post_id )
	{
		$sql = Sql::query()
			->select( 'post_id, post_created, post_updated, post_title, post_content, post_author, post_cover, user_id, user_name, user_email' )
			->from( 'posts' )
			->innerJoin( 'users' )
			->on( 'posts.post_author = users.user_id' )
			->where( 'post_id = :id' )
			->get();

		$data = array(
			'id' => $post_id,
		);

		$stmt = $this->db->prepare( $sql );
		$this->bind( $stmt, $data );
		$stmt->execute();

		return $stmt->fetch( PDO::FETCH_ASSOC );
	}

	/**
	 * Add Post
	 */
	public function addPost( array $post ) : void
	{
		Str::validate( $post['title'], true, 255 );
		Str::validate( $post['content'] );
		File::validate( $post['cover'], array( 'image/jpg', 'image/jpeg', 'image/png', 'image/gif' ), 5000000 );

		$post_title   = Str::clean( $post['title'] );
		$post_author  = Str::clean( $post['author'] );
		$post_content = Str::clean( $post['content'], false );
		$post_cover   = File::upload( $post['cover'] );

		$sql = Sql::query()
			->insertInto( 'posts ( post_title, post_author, post_content, post_cover )' )
			->values( '( :title, :author, :content, :cover )' )
			->get();

		$data = array(
			'title'   => $post_title,
			'author'  => $post_author,
			'content' => $post_content,
			'cover'   => $post_cover,
		);

		$stmt = $this->db->prepare( $sql );
		$this->bind( $stmt, $data );
		$stmt->execute();

		Site::redirect( '/' );
	}

	/**
	 * Edit Post
	 */
	public function editPost( array $post ) : void
	{
		Str::validate( $post['title'], true, 255 );
		Str::validate( $post['content'] );
		File::validate( $post['cover'], array( 'image/jpg', 'image/jpeg', 'image/png', 'image/gif' ), 5000000 );

		$post_id      = $post['id'];
		$post_title   = Str::clean( $post['title'] );
		$post_content = Str::clean( $post['content'], false );

		$current_post = $this->readPost( $post_id );
		if ( $post['cover']['error'] === 0 ) {
			File::delete( $current_post['post_cover'] );
			$post_cover = File::upload( $post['cover'] );
		} elseif ( $post['cover']['error'] === 4 ) {
			File::delete( $current_post['post_cover'] );
			$post_cover = '';
		}

		$sql = Sql::query()
			->update( 'posts' )
			->set( 'post_title = :title, post_content = :content, post_cover = :cover' )
			->where( 'post_id = :id' )
			->get();

		$data = array(
			'id'      => $post_id,
			'title'   => $post_title,
			'content' => $post_content,
			'cover'   => $post_cover,
		);

		$stmt = $this->db->prepare( $sql );
		$this->bind( $stmt, $data );
		$stmt->execute();

		Site::redirect( '/posts/edit/' . $post_id );
	}

	/**
	 * Delete Post
	 */
	public function deletePost( int $post_id ) : void
	{
		$sql = Sql::query()
			->delete()
			->from( 'posts' )
			->where( 'post_id = :id' )
			->get();

		$data = array(
			'id' => $post_id,
		);

		$stmt = $this->db->prepare( $sql );
		$this->bind( $stmt, $data );
		$stmt->execute();

		Site::redirect( '/' );
	}

}
