<?php
/**
 * Class that operate on table 'good_bad'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
class GoodBadMySqlDAO implements GoodBadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GoodBadMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM good_bad WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM good_bad';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM good_bad ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param goodBad primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM good_bad WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GoodBadMySql goodBad
 	 */
	public function insert($goodBad){
		$sql = 'INSERT INTO good_bad (comment_id, account_id, good) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($goodBad->commentId);
		$sqlQuery->setNumber($goodBad->accountId);
		$sqlQuery->setNumber($goodBad->good);

		$id = $this->executeInsert($sqlQuery);	
		$goodBad->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GoodBadMySql goodBad
 	 */
	public function update($goodBad){
		$sql = 'UPDATE good_bad SET comment_id = ?, account_id = ?, good = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($goodBad->commentId);
		$sqlQuery->setNumber($goodBad->accountId);
		$sqlQuery->setNumber($goodBad->good);

		$sqlQuery->setNumber($goodBad->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM good_bad';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCommentId($value){
		$sql = 'SELECT * FROM good_bad WHERE comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountId($value){
		$sql = 'SELECT * FROM good_bad WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGood($value){
		$sql = 'SELECT * FROM good_bad WHERE good = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCommentId($value){
		$sql = 'DELETE FROM good_bad WHERE comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountId($value){
		$sql = 'DELETE FROM good_bad WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGood($value){
		$sql = 'DELETE FROM good_bad WHERE good = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GoodBadMySql 
	 */
	protected function readRow($row){
		$goodBad = new GoodBad();
		
		$goodBad->id = $row['id'];
		$goodBad->commentId = $row['comment_id'];
		$goodBad->accountId = $row['account_id'];
		$goodBad->good = $row['good'];

		return $goodBad;
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
	 * @return GoodBadMySql 
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