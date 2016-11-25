<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface InnerCommentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return InnerComment 
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
 	 * @param innerComment primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InnerComment innerComment
 	 */
	public function insert($innerComment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param InnerComment innerComment
 	 */
	public function update($innerComment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCommentId($value);

	public function queryByAccountId($value);

	public function queryByComment($value);

	public function queryByDate($value);


	public function deleteByCommentId($value);

	public function deleteByAccountId($value);

	public function deleteByComment($value);

	public function deleteByDate($value);


}
?>