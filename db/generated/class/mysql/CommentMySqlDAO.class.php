<?php
/**
 * Class that operate on table 'comment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
class CommentMySqlDAO implements CommentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CommentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM comment WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM comment';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM comment ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param comment primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM comment WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CommentMySql comment
 	 */
	public function insert($comment){
		$sql = 'INSERT INTO comment (group_document_id, account_id, page, comment, last_update) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comment->groupDocumentId);
		$sqlQuery->setNumber($comment->accountId);
		$sqlQuery->setNumber($comment->page);
		$sqlQuery->set($comment->comment);
		$sqlQuery->set($comment->lastUpdate);

		$id = $this->executeInsert($sqlQuery);	
		$comment->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CommentMySql comment
 	 */
	public function update($comment){
		$sql = 'UPDATE comment SET group_document_id = ?, account_id = ?, page = ?, comment = ?, last_update = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comment->groupDocumentId);
		$sqlQuery->setNumber($comment->accountId);
		$sqlQuery->setNumber($comment->page);
		$sqlQuery->set($comment->comment);
		$sqlQuery->set($comment->lastUpdate);

		$sqlQuery->setNumber($comment->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM comment';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGroupDocumentId($value){
		$sql = 'SELECT * FROM comment WHERE group_document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAccountId($value){
		$sql = 'SELECT * FROM comment WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPage($value){
		$sql = 'SELECT * FROM comment WHERE page = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComment($value){
		$sql = 'SELECT * FROM comment WHERE comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastUpdate($value){
		$sql = 'SELECT * FROM comment WHERE last_update = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGroupDocumentId($value){
		$sql = 'DELETE FROM comment WHERE group_document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAccountId($value){
		$sql = 'DELETE FROM comment WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPage($value){
		$sql = 'DELETE FROM comment WHERE page = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComment($value){
		$sql = 'DELETE FROM comment WHERE comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastUpdate($value){
		$sql = 'DELETE FROM comment WHERE last_update = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CommentMySql 
	 */
	protected function readRow($row){
		$comment = new Comment();
		
		$comment->id = $row['id'];
		$comment->groupDocumentId = $row['group_document_id'];
		$comment->accountId = $row['account_id'];
		$comment->page = $row['page'];
		$comment->comment = $row['comment'];
		$comment->lastUpdate = $row['last_update'];

		return $comment;
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
	 * @return CommentMySql 
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