<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();

try{
    if(empty($_GET['accountId'])|| empty($_GET['groupsId'])|| empty($_GET['memberEmail']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $memberEmail = trim($_GET['memberEmail']);
    $accountId = trim($_GET['accountId']);
    $groupsId = trim($_GET['groupsId']);
    $arrAccountObj = DAOFactory::getAccountDAO()->queryByEmail($memberEmail);
    if(!count($arrAccountObj))
    {
        throw new Exception("Account not found.");
    }
    $account = $arrAccountObj[0];
    if($account->id == $accountId)
    {
        throw new Exception("Group owner can not be a member.");
    }
    $arrGroupMemberObj = DAOFactory::getGroupMemberDAO()->queryByGroupsIdAccountId($groupsId, $account->id);
    if(count($arrGroupMemberObj))
    {
        throw new Exception("Account has already been a group member.");
    }

    $reponseMessage->error = 0;
    $reponseMessage->data = $account->id;
    $reponseMessage->errMsg = NULL;
    echo $reponseMessage->getJsonFormat();
    
} catch (Exception $exc) {
    $reponseMessage->error = 1;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = $exc->getMessage();
    echo $reponseMessage->getJsonFormat();
}
