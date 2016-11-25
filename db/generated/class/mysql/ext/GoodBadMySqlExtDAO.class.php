<?php
/**
 * Class that operate on table 'good_bad'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class GoodBadMySqlExtDAO extends GoodBadMySqlDAO{

    public function queryByCommentIdGood($value){
            $sql = 'SELECT * FROM good_bad WHERE comment_id = ? AND good = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($value);
            $sqlQuery->setNumber(1);
            return $this->getList($sqlQuery);
    }
    
    public function queryByCommentIdDislike($value){
            $sql = 'SELECT * FROM good_bad WHERE comment_id = ? AND good = ?';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($value);
            $sqlQuery->setNumber(0);
            return $this->getList($sqlQuery);
    }
    
    public function queryByAccountIdCommentId($accountId, $commentId){
		$sql = 'SELECT * FROM good_bad WHERE account_id = ? AND comment_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($accountId);
                $sqlQuery->setNumber($commentId);
		return $this->getList($sqlQuery);
	}
}
?>