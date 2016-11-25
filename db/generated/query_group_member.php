<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/"); 

//include phpdao
require_once 'include_dao.php';
require_once "../../../".CODE."include_code.php";

try{
    if(!empty($_POST))
    {
        throw new Exception("query_group_member.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_group_member.php".'$_GET'." is empty.");
    }

    $tran = new Transaction();
    //***************************************************
    //call function by string using $_GET['method']
    //add()
    //edit()
    //delete()
    //query()
    //queryAll()
    //***************************************************
    try {
        call_user_func($_GET['method'], null);
    } catch (Exception $exc) {
        throw $exc;

    }
    $tran->commit();

}catch(Exception $exc)
{
    // send error with json format
    echo $exc->getMessage();
    exit();
}

function add()
{
    $groupMember = new GroupMember();
    $groupMember->groupsId = trim($_GET['groupsId']);
    $groupMember->accountId = trim($_GET['accountId']);
       
    if($groupMember->groupsId == null && $groupMember->groupsId != (integer)$groupMember->groupsId)
    {
        throw new Exception("query_group_member.php - add(): groupsId can not be null or float");
    }
    if($groupMember->accountId == null && $groupMember->accountId != (integer)$groupMember->accountId)
    {
        throw new Exception("query_group_member.php - add(): accountId can not be null or float");
    }
    DAOFactory::getGroupMemberDAO()->insert($groupMember);
}

function edit()
{
    $id = trim($_GET['id']);
    $groupMember = DAOFactory::getGroupMemberDAO()->load($id);
    if(empty($groupMember))
    {
        throw new Exception("query_group_member.php - edit(): There is no record id = $id in GroupMember table.");
    }
    $groupMember->groupsId = trim($_GET['groupsId']);
    $groupMember->accountId = trim($_GET['accountId']);
    
    if($groupMember->groupsId == null && $groupMember->groupsId != (integer)$groupMember->groupsId)
    {
        throw new Exception("query_group_member.php - add(): groupsId can not be null or float");
    }
    if($groupMember->accountId == null && $groupMember->accountId != (integer)$groupMember->accountId)
    {
        throw new Exception("query_group_member.php - add(): accountId can not be null or float");
    }
    DAOFactory::getGroupMemberDAO()->update($groupMember);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getGroupMemberDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $groupMember = DAOFactory::getGroupMemberDAO()->load($id);
    array_push($arrObj, $groupMember);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getGroupMemberDAO()->queryAll();
    echo json_encode($arrObj);
}



