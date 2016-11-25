<?php
/**
 * Class that operate on table 'group_member'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class GroupMemberMySqlExtDAO extends GroupMemberMySqlDAO{

    public function queryByGroupsIdAccountId($groupsId, $accountId){
        $sql = 'SELECT * FROM group_member WHERE groups_id = ? AND account_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($groupsId);
        $sqlQuery->setNumber($accountId);
        return $this->getList($sqlQuery);
    }

}
?>