<?php
/**
 * Class that operate on table 'groups'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class GroupsMySqlExtDAO extends GroupsMySqlDAO{

    public function queryByAccountIdGroupName($accountId, $groupName)
    {
        $sql = 'SELECT * FROM groups WHERE account_id = ? AND group_name = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($accountId);
        $sqlQuery->set($groupName);
        return $this->getList($sqlQuery);
    }
    
    public function queryByAccountIdLikeGroupName($accountId, $groupName)
    {
        $sql = 'SELECT * FROM groups WHERE account_id = ? AND group_name LIKE ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($accountId);
        $sqlQuery->set("%" . $groupName. "%");
        return $this->getList($sqlQuery);
    }
    
    public function loadIdLikeGroupName($id, $groupName){
		$sql = 'SELECT * FROM groups WHERE id = ? AND group_name LIKE ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
                $sqlQuery->set("%" . $groupName. "%");
		return $this->getRow($sqlQuery);
	}
}
?>