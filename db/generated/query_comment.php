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
        throw new Exception("query_comment.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_comment.php".'$_GET'." is empty.");
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
    $comment = new Comment();
    $comment->accountId = trim($_GET['accountId']);
    $comment->groupDocumentId = trim($_GET['groupDocumentId']);
    $comment->page = tirm($_GET['page']);
    $comment->comment = trim($_GET['comment']);
    $curTimeInfo = new CurTimeInfo();
    $comment->lastUpdate = $curTimeInfo->dateTime;
    
    if($comment->accountId == null && $comment->accountId != (integer)$comment->accountId)
    {
        throw new Exception("query_comment.php - add(): accountId can not be null or float");
    }
    if($comment->groupDocumentId == null && $comment->groupDocumentId != (integer)$comment->groupDocumentId)
    {
        throw new Exception("query_comment.php - add(): groupDocumentId can not be null or float");
    }
    if($comment->page == null && $comment->page != (integer)$comment->page)
    {
        throw new Exception("query_comment.php - add(): page can not be null or float");
    }
    DAOFactory::getCommentDAO()->insert($comment);
}

function edit()
{
    $id = trim($_GET['id']);
    $comment = DAOFactory::getCommentDAO()->load($id);
    if(empty($comment))
    {
        throw new Exception("query_comment.php - edit(): There is no record id = $id in InnerComment table.");
    }
    $comment->accountId = trim($_GET['accountId']);
    $comment->groupDocumentId = trim($_GET['groupDocumentId']);
    $comment->page = trim($_GET['page']);
    $comment->comment = trim($_GET['comment']);
    $curTimeInfo = new CurTimeInfo();
    $comment->lastUpdate = $curTimeInfo->dateTime;
    
    if($comment->accountId == null && $comment->accountId != (integer)$comment->accountId)
    {
        throw new Exception("query_comment.php - edit(): accountId can not be null or float");
    }
    if($comment->groupDocumentId == null && $comment->groupDocumentId != (integer)$comment->groupDocumentId)
    {
        throw new Exception("query_comment.php - edit(): groupDocumentId can not be null or float");
    }
    if($comment->page == null && $comment->page != (integer)$comment->page)
    {
        throw new Exception("query_comment.php - edit(): page can not be null or float");
    }
    DAOFactory::getCommentDAO()->update($comment);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getCommentDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $comment = DAOFactory::getCommentDAO()->load($id);
    array_push($arrObj, $comment);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getCommentDAO()->queryAll();
    echo json_encode($arrObj);
}



