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
        throw new Exception("query_good_bad.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_good_bad.php".'$_GET'." is empty.");
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
    $goodBad = new GoodBad();
    $goodBad->commentId = trim($_GET['commentId']);
    $goodBad->accountId = trim($_GET['accountId']);
    $goodBad->good = trim($_GET['good']);
    
    if($goodBad->accountId == null && $goodBad->accountId != (integer)$goodBad->accountId)
    {
        throw new Exception("query_good_bad.php - add(): accountId can not be null or float");
    }
    if($goodBad->commentId == null && $goodBad->commentId != (integer)$goodBad->commentId)
    {
        throw new Exception("query_good_bad.php - add(): commentId can not be null or float");
    }     
    DAOFactory::getGoodBadDAO()->insert($goodBad);
}

function edit()
{
    $id = trim($_GET['id']);
    $goodBad = DAOFactory::getGoodBadDAO()->load($id);
    if(empty($goodBad))
    {
        throw new Exception("query_good_bad.php - edit(): There is no record id = $id in Groups table.");
    }
    $goodBad->accountId = trim($_GET['accountId']);
    $goodBad->accountId = trim($_GET['accountId']);
    $goodBad->good = trim($_GET['good']);
    
    DAOFactory::getGoodBadDAO()->update($goodBad);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getGoodBadDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $goodBad = DAOFactory::getGoodBadDAO()->load($id);
    array_push($arrObj, $goodBad);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getGoodBadDAO()->queryAll();
    echo json_encode($arrObj);
}