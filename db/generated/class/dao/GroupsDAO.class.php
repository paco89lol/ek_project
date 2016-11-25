<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface GroupsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Groups 
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
 	 * @param group primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Groups group
 	 */
	public function insert($group);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Groups group
 	 */
	public function update($group);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAccountId($value);

	public function queryByGroupName($value);


	public function deleteByAccountId($value);

	public function deleteByGroupName($value);


}
?>