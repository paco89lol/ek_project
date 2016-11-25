<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/"); 

//include phpdao
require_once "include_dao.php";
require_once "../../../".CODE."include_code.php";

try{
    if(!empty($_POST))
    {
        throw new Exception("query_groups.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_groups.php".'$_GET'." is empty.");
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
    $group = new Group();
    $group->accountId = trim($_GET['acountId']);
    $group->groupName = trim($_GET['groupName']);
       
    if($group->accountId == null && $group->accountId != (integer)$group->accountId)
    {
        throw new Exception("query_groups.php - add(): accountId can not be null or float");
    }      
    DAOFactory::getGroupsDAO()->insert($group);
}

function edit()
{
    $id = trim($_GET['id']);
    $group = DAOFactory::getGroupsDAO()->load($id);
    if(empty($group))
    {
        throw new Exception("query_groups.php - edit(): There is no record id = $id in Groups table.");
    }
    $group->accountId = trim($_GET['accountId']);
    $group->groupName = trim($_GET['groupName']);
    
    DAOFactory::getGroupsDAO()->update($group);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getGroupsDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $group = DAOFactory::getGroupsDAO()->load($id);
    array_push($arrObj, $group);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getGroupsDAO()->queryAll();
    echo json_encode($arrObj);
}