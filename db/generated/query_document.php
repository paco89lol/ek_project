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
        throw new Exception("query_document.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_document.php".'$_GET'." is empty.");
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
    $document = new Document();
    $document->accountId = trim($_GET['accountId']);
    $document->title = trim($_GET['title']);
    $document->path = tirm($_GET['path']);
    $curTimeInfo = new CurTimeInfo();
    $document->date = $curTimeInfo->dateTime;
    $document->rate1 = trim($_GET['rate1']);
    $document->rate2 = trim($_GET['rate2']);
    $document->year = trim($_GET['year']);
    $document->categoryId = trim($_GET['categoryId']);
    
    if($document->accountId == null && $document->accountId != (integer)$document->accountId)
    {
        throw new Exception("query_document.php - add(): accountId can not be null or float");
    }
    if($document->title == null)
    {
        throw new Exception("query_document.php - add(): title can not be null");
    }
    if($document->path == null)
    {
        throw new Exception("query_document.php - add(): path can not be null or float");
    }
    if($document->year == null && $document->year != (integer)$document->year)
    {
        throw new Exception("query_document.php - add(): page can not be null or float");
    }
    if($document->categoryId != null && $document->year != (integer)$document->year)
    {
        throw new Exception("query_document.php - add(): categoryId can not be float");
    }
    DAOFactory::getDocumentDAO()->insert($document);
}

function edit()
{
    $id = trim($_GET['id']);
    $document = DAOFactory::getDocumentDAO()->load($id);
    if(empty($document))
    {
        throw new Exception("query_document.php - edit(): There is no record id = $id in Document table.");
    }
    $document->accountId = trim($_GET['accountId']);
    $document->title = trim($_GET['title']);
    $document->path = trim($_GET['path']);
    $document->rate1 = trim($_GET['rate1']);
    $document->rate2 = trim($_GET['rate2']);
    $document->year = trim($_GET['year']);
    $document->categoryId = trim($_GET['categoryId']);
    
    if($document->accountId == null && $document->accountId != (integer)$document->accountId)
    {
        throw new Exception("query_document.php - edit(): accountId can not be null or float");
    }
    if($document->title == null)
    {
        throw new Exception("query_document.php - edit(): title can not be null");
    }
    if($document->path == null)
    {
        throw new Exception("query_document.php - edit(): path can not be null");
    }
    if($document->year == null && $document->year != (integer)$document->year)
    {
        throw new Exception("query_document.php - edit(): year can not be null or float");
    }
    if($document->categoryId != null && $document->year != (integer)$document->year)
    {
        throw new Exception("query_document.php - edit(): categoryId can not be float");
    }
    DAOFactory::getDocumentDAO()->update($document);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getDocumentDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $document = DAOFactory::getDocumentDAO()->load($id);
    array_push($arrObj, $document);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getDocumentDAO()->queryAll();
    echo json_encode($arrObj);
}


