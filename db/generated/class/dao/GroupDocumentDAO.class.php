<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface GroupDocumentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GroupDocument 
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
 	 * @param groupDocument primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GroupDocument groupDocument
 	 */
	public function insert($groupDocument);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GroupDocument groupDocument
 	 */
	public function update($groupDocument);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGroupsId($value);

	public function queryByDocumentId($value);


	public function deleteByGroupsId($value);

	public function deleteByDocumentId($value);


}
?>