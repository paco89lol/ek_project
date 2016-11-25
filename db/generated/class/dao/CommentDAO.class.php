<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface CommentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Comment 
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
 	 * @param comment primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Comment comment
 	 */
	public function insert($comment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Comment comment
 	 */
	public function update($comment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGroupDocumentId($value);

	public function queryByAccountId($value);

	public function queryByPage($value);

	public function queryByComment($value);

	public function queryByLastUpdate($value);


	public function deleteByGroupDocumentId($value);

	public function deleteByAccountId($value);

	public function deleteByPage($value);

	public function deleteByComment($value);

	public function deleteByLastUpdate($value);


}
?>