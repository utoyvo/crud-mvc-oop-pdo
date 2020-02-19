<?php
/**
 * Sql
 *
 * @package CRUD MVC OOP PDO
 * @link    https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/core/classes/Sql.php
 */

class Sql
{

	private static $instance = NULL;

	/**
	 * Query
	 */
	public static function query()
	{
		self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Get
	 */
	public function get()
	{
		$array = ( array )$this;
		$string = implode( ' ', $array );

		return $string;
	}

	/**
	 * Vocabulary:
	 *
	 * And
	 * As
	 * Delete
	 * From
	 * Inner Join
	 * Insert Into
	 * Limit
	 * On
	 * Order By
	 * Select
	 * Set
	 * Update
	 * Values
	 * Where
	 */

	// And
	public function and( string $options )
	{
		$query_part = 'AND ' . $options;
		$this->and = $query_part;

		return $this;
	}

	// As
	public function as( string $options )
	{
		$query_part = 'AS ' . $options;
		$this->as = $query_part;

		return $this;
	}

	// Delete
	public function delete()
	{
		$query_part = 'DELETE';
		$this->delete = $query_part;

		return $this;
	}

	// From
	public function from( string $options )
	{
		$query_part = 'FROM ' . $options;
		$this->from = $query_part;

		return $this;
	}

	// Inner Join
	public function innerJoin( string $options )
	{
		$query_part = 'INNER JOIN ' . $options;
		$this->innerJoin = $query_part;

		return $this;
	}

	// Insert Into
	public function insertInto( string $options )
	{
		$query_part = 'INSERT INTO ' . $options;
		$this->insertInto = $query_part;

		return $this;
	}

	// Limit
	public function limit( string $options )
	{
		$query_part = 'LIMIT ' . $options;
		$this->limit = $query_part;

		return $this;
	}

	// On
	public function on( string $options )
	{
		$query_part = 'ON ' . $options;
		$this->on = $query_part;

		return $this;
	}

	// Or
	public function or( string $options )
	{
		$query_part = 'OR ' . $options;
		$this->or = $query_part;

		return $this;
	}

	// Order By
	public function orderBy( string $options )
	{
		$query_part = 'ORDER BY ' . $options;
		$this->orderBy = $query_part;

		return $this;
	}

	// Select
	public function select( string $options = '*' )
	{
		$query_part = 'SELECT ' . $options;
		$this->select = $query_part;

		return $this;
	}

	// Set
	public function set( string $options )
	{
		$query_part = 'SET ' . $options;
		$this->set = $query_part;

		return $this;
	}

	// Update
	public function update( string $options )
	{
		$query_part = 'UPDATE ' . $options;
		$this->update = $query_part;

		return $this;
	}

	// Values
	public function values( string $options )
	{
		$query_part = 'VALUES ' . $options;
		$this->values = $query_part;

		return $this;
	}

	// Where
	public function where( string $options )
	{
		$query_part = 'WHERE ' . $options;
		$this->where = $query_part;

		return $this;
	}

}
