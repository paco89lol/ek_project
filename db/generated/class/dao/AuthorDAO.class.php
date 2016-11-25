<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface AuthorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Author 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param author primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Author author
 	 */
	public function insert($author);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Author author
 	 */
	public function update($author);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDocumentId($value);

	public function queryByAuthor($value);


	public function deleteByDocumentId($value);

	public function deleteByAuthor($value);


}
?>