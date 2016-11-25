<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();

try{
    if(empty($_GET['accountId'])|| empty($_GET['groupsId']) || empty($_GET['memberId']) || empty($_GET['verified']) || $_GET['verified'] == 0)
    {
        throw new Exception("Some illegal action detected.");
    }
    $accountId = trim($_GET['memberId']);
    $groupsId = trim($_GET['groupsId']);
    $arrGroupMemberObj = DAOFactory::getGroupMemberDAO()->queryByGroupsIdAccountId($groupsId, $accountId);
    if(count($arrGroupMemberObj))
    {
        throw new Exception("Account has already been a group member.");
    }
    
    $groupMember = new GroupMember();
    $groupMember->groupsId = trim($_GET['groupsId']);
    $groupMember->accountId = $accountId;
    
    $tran = new Transaction();
    DAOFactory::getGroupMemberDAO()->insert($groupMember);
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