<?php
/**
 * Class that operate on table 'account'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class AccountMySqlExtDAO extends AccountMySqlDAO{

    public function queryByNamePassword($name, $password){
        $sql = 'SELECT * FROM account WHERE name = ? AND password = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($name);
        $sqlQuery->set($password);
        return $this->getList($sqlQuery);
    }
          
}
?>