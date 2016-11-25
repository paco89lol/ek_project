<?php
/**
 * Class that operate on table 'inner_comment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class InnerCommentMySqlExtDAO extends InnerCommentMySqlDAO{

    public function queryByCommentIdOrderByDate($value){
		$sql = 'SELECT * FROM inner_comment WHERE comment_id = ? ORDER BY date';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
    }
    
}
?>