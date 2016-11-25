<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface AccountDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Account 
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
 	 * @param account primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Account account
 	 */
	public function insert($account);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Account account
 	 */
	public function update($account);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByPassword($value);

	public function queryByEmail($value);


	public function deleteByName($value);

	public function deleteByPassword($value);

	public function deleteByEmail($value);


}
?>