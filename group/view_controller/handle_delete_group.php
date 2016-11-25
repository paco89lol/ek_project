<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();


try{
    global $groupId;
    
    if(empty($_GET['accountId'])|| empty($_GET['groupsId']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $groupId = trim($_GET['groupsId']);
    
    $tran = new Transaction();
    $arrGroupDocumentObj = DAOFactory::getGroupDocumentDAO()->queryByGroupsId($groupId);
    foreach ($arrGroupDocumentObj as $groupDocument) {
        $arrCommentObj = DAOFactory::getCommentDAO()->queryByGroupDocumentId($groupDocument->id);
        foreach ($arrCommentObj as $comment) {
            deleteGoodBad($comment->id);
            deleteInnerComment($comment->id);
        }
        deleteComment($groupDocument->id);
    }
    deleteGroupDocument($groupId);
    deleteGroupMember($groupId);
    DAOFactory::getGroupsDAO()->delete($groupId);
    $tran->commit();
    
    $reponseMessage->error = 0;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = NULL;
    echo $reponseMessage->getJsonFormat();
    
} catch (Exception $exc) {
    $reponseMessage->error = 1;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = $exc->getMessage();
    echo $reponseMessage->getJsonFormat();
}

function deleteGroupDocument($groupId)
{
    DAOFactory::getGroupDocumentDAO()->deleteByGroupsId($groupId);
}

function deleteGroupMember($groupId)
{
    DAOFactory::getGroupMemberDAO()->deleteByGroupsId($groupId);
}

function deleteComment($groupDocumentId)
{
    DAOFactory::getCommentDAO()->deleteByGroupDocumentId($groupDocumentId);
}

function deleteInnerComment($commentId)
{
    DAOFactory::getInnerCommentDAO()->deleteByCommentId($commentId);
}

function deleteGoodBad($commentId)
{
    DAOFactory::getGoodBadDAO()->deleteByCommentId($commentId);
}