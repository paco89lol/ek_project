<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface GoodBadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GoodBad 
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
 	 * @param goodBad primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GoodBad goodBad
 	 */
	public function insert($goodBad);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GoodBad goodBad
 	 */
	public function update($goodBad);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCommentId($value);

	public function queryByAccountId($value);

	public function queryByGood($value);


	public function deleteByCommentId($value);

	public function deleteByAccountId($value);

	public function deleteByGood($value);


}
?>