<?php
/**
 * Model
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/classes/Model.php
 */

abstract class Model
{

	protected $db;

	function __construct()
	{
		global $app;
		$this->db = $app->db;
	}

	/**
	 * Pagination
	 */
	public function pagination( string $for, int $page, int $perpage = 10 ) : array
	{
		$sql = Sql::query()
			->select( 'COUNT(*)' )
			->as( 'total' )
			->from( $for )
			->get();

		$stmt = $this->db->prepare( $sql );
		$stmt->execute();

		$pages = $stmt->fetch( PDO::FETCH_ASSOC );

		$page        = $page != 0 ? $page : 1;
		$total_pages = ceil( $pages['total'] / $perpage );
		$start       = $perpage * $page - $perpage;

		return array(
			'for'         => $for,
			'page'        => $page,
			'total_pages' => $total_pages,
			'start'       => $start,
			'perpage'     => $perpage,
		);
	}

	/**
	 * Sort
	 */
	public function sort( string $prefix, string $by, array $keys = array() ) : array
	{
		if ( isset( $by ) && in_array( $by, $keys ) ) {
			if ( $by == 'time' ) {
				$by = 'created';
			}

			$sort = array(
				'by'    => $prefix . $by,
				'order' => 'ASC',
			);
		} else {
			$sort = array(
				'by'    => $prefix . 'id',
				'order' => 'DESC',
			);
		}

		return $sort;
	}

	/**
	 * Bind
	 */
	public function bind( object $stmt, array $data ) : void
	{
		foreach ( $data as $key => $value ) {
			$stmt->bindValue( ':' . $key, $value );
		}
	}

}
