<?php
/**
 * Class that operate on table 'document'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-17 19:47
 */
class DocumentMySqlDAO implements DocumentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DocumentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM document WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM document';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM document ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param document primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM document WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentMySql document
 	 */
	public function insert($document){
		$sql = 'INSERT INTO document (account_id, title, path, date, rate1, rate2, year, abstract, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($document->accountId);
		$sqlQuery->set($document->title);
		$sqlQuery->set($document->path);
		$sqlQuery->set($document->date);
		$sqlQuery->set($document->rate1);
		$sqlQuery->set($document->rate2);
		$sqlQuery->setNumber($document->year);
		$sqlQuery->set($document->abstract);
		$sqlQuery->setNumber($document->categoryId);

		$id = $this->executeInsert($sqlQuery);	
		$document->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentMySql document
 	 */
	public function update($document){
		$sql = 'UPDATE document SET account_id = ?, title = ?, path = ?, date = ?, rate1 = ?, rate2 = ?, year = ?, abstract = ?, category_id = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($document->accountId);
		$sqlQuery->set($document->title);
		$sqlQuery->set($document->path);
		$sqlQuery->set($document->date);
		$sqlQuery->set($document->rate1);
		$sqlQuery->set($document->rate2);
		$sqlQuery->setNumber($document->year);
		$sqlQuery->set($document->abstract);
		$sqlQuery->setNumber($document->categoryId);

		$sqlQuery->setNumber($document->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM document';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAccountId($value){
		$sql = 'SELECT * FROM document WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitle($value){
		$sql = 'SELECT * FROM document WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPath($value){
		$sql = 'SELECT * FROM document WHERE path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value){
		$sql = 'SELECT * FROM document WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRate1($value){
		$sql = 'SELECT * FROM document WHERE rate1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRate2($value){
		$sql = 'SELECT * FROM document WHERE rate2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByYear($value){
		$sql = 'SELECT * FROM document WHERE year = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbstract($value){
		$sql = 'SELECT * FROM document WHERE abstract = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoryId($value){
		$sql = 'SELECT * FROM document WHERE category_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAccountId($value){
		$sql = 'DELETE FROM document WHERE account_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitle($value){
		$sql = 'DELETE FROM document WHERE title = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPath($value){
		$sql = 'DELETE FROM document WHERE path = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM document WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRate1($value){
		$sql = 'DELETE FROM document WHERE rate1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRate2($value){
		$sql = 'DELETE FROM document WHERE rate2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByYear($value){
		$sql = 'DELETE FROM document WHERE year = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbstract($value){
		$sql = 'DELETE FROM document WHERE abstract = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoryId($value){
		$sql = 'DELETE FROM document WHERE category_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DocumentMySql 
	 */
	protected function readRow($row){
		$document = new Document();
		
		$document->id = $row['id'];
		$document->accountId = $row['account_id'];
		$document->title = $row['title'];
		$document->path = $row['path'];
		$document->date = $row['date'];
		$document->rate1 = $row['rate1'];
		$document->rate2 = $row['rate2'];
		$document->year = $row['year'];
		$document->abstract = $row['abstract'];
		$document->categoryId = $row['category_id'];

		return $document;
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
	 * @return DocumentMySql 
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