<?php
/**
 * Class that operate on table 'group_document'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
class GroupDocumentMySqlDAO implements GroupDocumentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GroupDocumentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM group_document WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM group_document';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM group_document ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param groupDocument primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM group_document WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GroupDocumentMySql groupDocument
 	 */
	public function insert($groupDocument){
		$sql = 'INSERT INTO group_document (groups_id, document_id) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($groupDocument->groupsId);
		$sqlQuery->setNumber($groupDocument->documentId);

		$id = $this->executeInsert($sqlQuery);	
		$groupDocument->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GroupDocumentMySql groupDocument
 	 */
	public function update($groupDocument){
		$sql = 'UPDATE group_document SET groups_id = ?, document_id = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($groupDocument->groupsId);
		$sqlQuery->setNumber($groupDocument->documentId);

		$sqlQuery->setNumber($groupDocument->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM group_document';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGroupsId($value){
		$sql = 'SELECT * FROM group_document WHERE groups_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDocumentId($value){
		$sql = 'SELECT * FROM group_document WHERE document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGroupsId($value){
		$sql = 'DELETE FROM group_document WHERE groups_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDocumentId($value){
		$sql = 'DELETE FROM group_document WHERE document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GroupDocumentMySql 
	 */
	protected function readRow($row){
		$groupDocument = new GroupDocument();
		
		$groupDocument->id = $row['id'];
		$groupDocument->groupsId = $row['groups_id'];
		$groupDocument->documentId = $row['document_id'];

		return $groupDocument;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return GroupDocumentMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>