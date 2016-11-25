<?php
/**
 * Class that operate on table 'inner_comment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
class InnerCommentMySqlDAO implements InnerCommentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return InnerCommentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM inner_comment WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM inner_comment';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM inner_comment ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param innerComment primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM inner_comment WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param InnerCommentMySql innerComment
 	 */
	public function insert($innerComment){
		$sql = 'INSERT INTO inner_comment (comment_id, account_id, comment, date) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($innerComment->commentId);
		$sqlQuery->setNumber($innerComment->accountId);
		$sqlQuery->set($innerComment->comment);
		$sqlQuery->set($innerComment->date);

		$id = $this->executeInsert($sqlQuery);	
		$innerComment->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param InnerCommentMySql innerComment
 	 */
	public function update($innerComment){
		$sql = 'UPDATE inner_comment SET comment_id = ?, account_id = ?, comment = ?, date = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($innerComment->commentId);
		$sqlQuery->setNumber($innerComment->accountId);
		$sqlQuery->set($innerComment->comment);
		$sqlQuery->set($innerComment->date);

		$sqlQuery->setNumber($innerComment->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM inner_comment';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCommentId($value){
		$sql = 'SELECT * FROM inner_comment WHERE comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountId($value){
		$sql = 'SELECT * FROM inner_comment WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComment($value){
		$sql = 'SELECT * FROM inner_comment WHERE comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM inner_comment WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCommentId($value){
		$sql = 'DELETE FROM inner_comment WHERE comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountId($value){
		$sql = 'DELETE FROM inner_comment WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComment($value){
		$sql = 'DELETE FROM inner_comment WHERE comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM inner_comment WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return InnerCommentMySql 
	 */
	protected function readRow($row){
		$innerComment = new InnerComment();
		
		$innerComment->id = $row['id'];
		$innerComment->commentId = $row['comment_id'];
		$innerComment->accountId = $row['account_id'];
		$innerComment->comment = $row['comment'];
		$innerComment->date = $row['date'];

		return $innerComment;
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
	 * @return InnerCommentMySql 
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