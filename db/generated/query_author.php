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
        throw new Exception("query_author.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_author.php".'$_GET'." is empty.");
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
    $author = new Author();
    $author->documentId = trim($_GET['documentId']);
    $author->author = trim($_GET['author']);
       
    if($author->documentId == null && $author->documentId != (integer)$author->documentId)
    {
        throw new Exception("query_author.php - add(): documentId can not be null or float");
    }      
    DAOFactory::getAuthorDAO()->insert($author);
}

function edit()
{
    $id = trim($_GET['id']);
    $author = DAOFactory::getAuthorDAO()->load($id);
    if(empty($author))
    {
        throw new Exception("query_author.php - edit(): There is no record id = $id in Author table.");
    }
    $author->documentId = trim($_GET['documentId']);
    $author->author = trim($_GET['author']);
    
    DAOFactory::getAuthorDAO()->update($author);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getAuthorDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $author = DAOFactory::getAuthorDAO()->load($id);
    array_push($arrObj, $author);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getAuthorDAO()->queryAll();
    echo json_encode($arrObj);
}

