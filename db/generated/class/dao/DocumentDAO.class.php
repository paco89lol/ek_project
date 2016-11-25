<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
interface DocumentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Document 
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
 	 * @param document primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Document document
 	 */
	public function insert($document);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Document document
 	 */
	public function update($document);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAccountId($value);

	public function queryByTitle($value);

	public function queryByPath($value);

	public function queryByDate($value);

	public function queryByRate1($value);

	public function queryByRate2($value);

	public function queryByYear($value);

	public function queryByAbstract($value);

	public function queryByCategoryId($value);


	public function deleteByAccountId($value);

	public function deleteByTitle($value);

	public function deleteByPath($value);

	public function deleteByDate($value);

	public function deleteByRate1($value);

	public function deleteByRate2($value);

	public function deleteByYear($value);

	public function deleteByAbstract($value);

	public function deleteByCategoryId($value);


}
?>