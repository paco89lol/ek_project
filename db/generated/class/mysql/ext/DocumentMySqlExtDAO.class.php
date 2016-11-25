<?php
/**
 * Class that operate on table 'document'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class DocumentMySqlExtDAO extends DocumentMySqlDAO{

    public function queryByAccountIdLikeTitleOrLikeAbstract($value, $text){
            $sql = 'SELECT * FROM document WHERE account_id = ? AND ( title LIKE ? OR abstract LIKE ?)';
            $sqlQuery = new SqlQuery($sql);
            $sqlQuery->setNumber($value);
            $sqlQuery->set("%" . $text . "%");
            $sqlQuery->set("%" . $text . "%");
            return $this->getList($sqlQuery);
    }
}
?>