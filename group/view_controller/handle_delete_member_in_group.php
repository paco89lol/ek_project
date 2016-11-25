<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();
try{
    if(empty($_GET['accountId'])|| empty($_GET['groupsId']) || empty($_GET['memberId']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $accountId = trim($_GET['accountId']);
    $groupsId = trim($_GET['groupsId']);
    $memberId = trim($_GET['memberId']);
    $arrGroupMemberObj = DAOFactory::getGroupMemberDAO()->queryByGroupsIdAccountId($groupsId, $memberId);
    if(!count($arrGroupMemberObj))
    {
        throw new Exception("Database has no record.");
    }
    $tran = new Transaction();
    DAOFactory::getGroupMemberDAO()->delete($arrGroupMemberObj[0]->id);
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