<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface GroupMemberDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GroupMember 
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
 	 * @param groupMember primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GroupMember groupMember
 	 */
	public function insert($groupMember);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GroupMember groupMember
 	 */
	public function update($groupMember);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGroupsId($value);

	public function queryByAccountId($value);


	public function deleteByGroupsId($value);

	public function deleteByAccountId($value);


}
?>