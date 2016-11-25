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
        throw new Exception("query_category.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_category.php".'$_GET'." is empty.");
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
    $category = new Category();
    $category->accountId = trim($_GET['acountId']);
    $category->name = trim($_GET['name']);
       
    if($category->accountId == null && $category->accountId != (integer)$category->accountId)
    {
        throw new Exception("query_category.php - add(): accountId can not be null or float");
    }      
    DAOFactory::getCategoryDAO()->insert($category);
}

function edit()
{
    $id = trim($_GET['id']);
    $category = DAOFactory::getCategoryDAO()->load($id);
    if(empty($category))
    {
        throw new Exception("query_category.php - edit(): There is no record id = $id in Category table.");
    }
    $category->accountId = trim($_GET['accountId']);
    $category->name = trim($_GET['name']);
    
    DAOFactory::getCategoryDAO()->update($group);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getCategoryDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $category = DAOFactory::getCategoryDAO()->load($id);
    array_push($arrObj, $category);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getCategoryDAO()->queryAll();
    echo json_encode($arrObj);
}

