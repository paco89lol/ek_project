<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../../" . DB_API . "include_dao.php";
require_once "../../" . CODE . "include_code.php";

$string = "";

if(empty($_GET['accountId'])|| empty($_GET['groupsId']))
{
    return;
}
$accountId = trim($_GET['accountId']);
$groupsId = trim($_GET['groupsId']);

$arrGroupMemberObj = DAOFactory::getGroupMemberDAO()->queryByGroupsId($groupsId);
foreach($arrGroupMemberObj as $groupMember)
{
    $account = DAOFactory::getAccountDAO()->load($groupMember->accountId);
    $string .= '<option value="'.$account->id.'"> '.$account->name.' ('.$account->email.')</option>';
}

echo $string;
