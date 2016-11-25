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
        throw new Exception("query_account.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_account.php".'$_GET'." is empty.");
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
$account = new Account();
$account->name = trim($_GET['name']);
$account->password = trim($_GET['password']);
$account->email = trim($_GET['email']);
DAOFactory::getAccountDAO()->insert($account);
}

function edit()
{
    $id = trim($_GET['id']);
    $account = DAOFactory::getAccountDAO()->load($id);
    if(empty($account))
    {
        throw new Exception("query_account - edit(): There is no record id = $id in Acount table.");
    }
    $account->name = trim($_GET['name']);
    $account->password = trim($_GET['password']);
    $account->email = trim($_GET['email']);
    DAOFactory::getAccountDAO()->update($account);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getAccountDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $account = DAOFactory::getAccountDAO()->load($id);
    array_push($arrObj, $account);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getAccountDAO()->queryAll();
    echo json_encode($arrObj);
}