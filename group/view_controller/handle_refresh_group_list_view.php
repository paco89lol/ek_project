<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../../" . DB_API . "include_dao.php";
require_once "../../" . CODE . "include_code.php";

if (empty($_GET['accountId'])) {
    exit();
}
$accountId = trim($_GET['accountId']);

$string = "";
$string .= '<div class="tiles">' . "\n";
$string .= allMemberGroup();
$string .= '</div>' . "\n";
echo $string;


function allMemberGroup() {
    global $accountId;
    $addGroup = "";
    $arrObj = DAOFactory::getGroupMemberDAO()->queryByAccountId($accountId);
    foreach ($arrObj as $groupMember) {
        $group = DAOFactory::getGroupsDAO()->load($groupMember->groupsId);
        $addGroup .= '<div class="tile double bg-blue-madison" style="height: 140px;" ondblclick="javascript:window.location = \'../group_page/index.php?groupId=' . $group->id . '\';">' . "\n";
 
        $addGroup .= '<p>'."\n";
        $addGroup .= '<span class=" pull-right">
      <a data-original-title="Delete" onclick="initLeaveGroup(\''.$accountId.'\',\''.$group->id.'\')" style="overflow: hidden; position: relative;" href="#pop_up_leave_group" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
