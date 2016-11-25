<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../" . DB_API . "include_dao.php";
require_once "../" . CODE . "include_code.php";

if (empty($_SESSION['id'])) {
    exit();
}
$accountId = trim($_SESSION['id']);

$string = "";
$string .= '<div class="tiles">' . "\n";
$string .= addButton();
$string .= allGroup();
$string .= '</div>' . "\n";
echo $string;

function addButton() {
    global $accountId;
    $addButton = "";
    $addButton .= '<div class="row">' . "\n";
    $addButton .= '<div class="col-md-12" style="margin: 0 10px 10px 0;">' . "\n";
    $addButton .= '<a class="btn btn-warning" onclick="initAddGroup(\'' . $accountId . '\');" href="#pop_up_add_group" data-toggle="modal"><span class="fa fa-plus"></span>Add Group</a>' . "\n";
    $addButton .= '</div>' . "\n";
    $addButton .= '</div>' . "\n";
    return $addButton;
}

function allGroup() {
    global $accountId;
    $addGroup = "";
    $arrObj = DAOFactory::getGroupsDAO()->queryByAccountId($accountId);
    foreach ($arrObj as $group) {
        $addGroup .= '<div class="tile double bg-blue-madison" style="height: 140px;" ondblclick="javascript:window.location = \'../group_page/index.php?groupId=' . $group->id . '\';">' . "\n";
        
        $addGroup .= '<p>'."\n";
        $addGroup .= '<span class=" pull-right">
      <a onclick="initDeleteMemberToGroup(\''.$accountId.'\',\''.$group->id.'\')" style="overflow: hidden; position: relative;" href="#pop_up_delete_member_in_group" data-toggle="modal" class="btn btn-effect-ripple btn-xs bg-danger"><i class="fa fa-minus"></i></a>
      <a onclick="initAddMemberToGroup(\''.$accountId.'\',\''.$group->id.'\')" style="overflow: hidden; position: relative;" href="#pop_up_add_member_to_group" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-plus"></i></a>
      <a onclick="initDeleteGroup(\''.$accountId.'\',\''.$group->id.'\')" style="overflow: hidden; position: relative;" href="#pop_up_delete_group" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
      </span>';
        $addGroup .= '</p>'."\n";  
        
        $addGroup .= '<div class="tile-body">' . "\n";
        $addGroup .= '<img src="../images/icon_group.png" class="size-65" alt="">' . "\n";
        $addGroup .= '<h5 style="color: white">' . $group->groupName . '</h5>' . "\n";
        $addGroup .= '</div>' . "\n";

        $arrGroupDocumentObj = DAOFactory::getGroupDocumentDAO()->queryByGroupsId($group->id);
        $numberOfBook = count($arrGroupDocumentObj);
        $arrGroupMemberObj = DAOFactory::getGroupMemberDAO()->queryByGroupsId($group->id);
        $numberOfMember = count($arrGroupMemberObj);
        $addGroup .= '<div class="tile-object">' . "\n";
        $addGroup .= '<div class="name"><span>Book: ' . $numberOfBook . '</span></div>' . "\n";
        $addGroup .= '<div class="number"><span>Member: ' . $numberOfMember . '</span></div>' . "\n";
        $addGroup .= '</div>' . "\n";

        $addGroup .= '</div>' . "\n";
    }
    return $addGroup;
}
