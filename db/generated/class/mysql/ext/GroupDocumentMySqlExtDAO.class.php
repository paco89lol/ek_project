<?php
/**
 * Class that operate on table 'group_document'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-11-03 11:03
 */
class GroupDocumentMySqlExtDAO extends GroupDocumentMySqlDAO{

    public function queryByGroupsIdDocumentId($groupsId, $documentId)
    {
        $sql = 'SELECT * FROM group_document WHERE groups_id = ? AND document_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($groupsId);
        $sqlQuery->setNumber($documentId);
        return $this->getList($sqlQuery);
    }
}
?>