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
        throw new Exception("query_group_document.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_group_document.php".'$_GET'." is empty.");
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
    $groupDocument = new GroupDocument();
    $groupDocument->groupsId = trim($_GET['groupsId']);
    $groupDocument->documentId = trim($_GET['documentId']);
    
    if($groupDocument->groupsId == null && $groupDocument->groupsId != (integer)$groupDocument->groupsId)
    {
        throw new Exception("query_group_document.php - add(): groupsId can not be null or float");
    }
    if($groupDocument->documentId == null && $groupDocument->documentId != (integer)$groupDocument->documentId)
    {
        throw new Exception("query_group_document.php - add(): documentId can not be null or float");
    }     
    DAOFactory::getGroupDocumentDAO()->insert($groupDocument);
}

function edit()
{
    $id = trim($_GET['id']);
    $groupDocument = DAOFactory::getGroupDocumentDAO()->load($id);
    if(empty($groupDocument))
    {
        throw new Exception("query_group_document.php - edit(): There is no record id = $id in Groups table.");
    }
    $groupDocument->groupsId = trim($_GET['groupsId']);
    $groupDocument->documentId = trim($_GET['documentId']);
    
    DAOFactory::getGroupDocumentDAO()->update($groupDocument);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getGroupDocumentDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $groupDocument = DAOFactory::getGroupDocumentDAO()->load($id);
    array_push($arrObj, $groupDocument);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getGroupDocumentDAO()->queryAll();
    echo json_encode($arrObj);
}