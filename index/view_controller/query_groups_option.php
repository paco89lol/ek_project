<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../../" . DB_API . "include_dao.php";
require_once "../../" . CODE . "include_code.php";

$string = "";

if(empty($_GET['accountId']))
{
    return;
}

$arrObj = DAOFactory::getGroupsDAO()->queryByAccountId($_GET['accountId']);
foreach($arrObj as $group)
{
    $string .= '<option value="'.$group->id.'"> '.$group->groupName.' </option>';
}

echo $string;
