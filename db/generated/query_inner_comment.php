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
        throw new Exception("query_inner_comment.php".'$_POST'." is not being support.");
    }

    if(empty($_GET))
    {
        throw new Exception("query_inner_comment.php".'$_GET'." is empty.");
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
    $innerComment = new InnerComment();
    $innerComment->commentId = trim($_GET['commentId']);
    $innerComment->accountId = trim($_GET['accountId']);
    $innerComment->comment = trim($_GET['comment']);
    $curTimeInfo = new CurTimeInfo();
    $innerComment->date = $curTimeInfo->dateTime;
       
    if($innerComment->commentId == null && $innerComment->commentId != (integer)$innerComment->commentId)
    {
        throw new Exception("query_inner_comment.php - add(): commentId can not be null or float");
    }
    if($innerComment->accountId == null && $innerComment->accountId != (integer)$innerComment->accountId)
    {
        throw new Exception("query_inner_comment.php - add(): accountId can not be null or float");
    }
    DAOFactory::getInnerCommentDAO()->insert($innerComment);
}

function edit()
{
    $id = trim($_GET['id']);
    $innerComment = DAOFactory::getInnerCommentDAO()->load($id);
    if(empty($innerComment))
    {
        throw new Exception("query_inner_comment.php - edit(): There is no record id = $id in InnerComment table.");
    }
    $innerComment->commentId = trim($_GET['commentId']);
    $innerComment->accountId = trim($_GET['accountId']);
    $innerComment->comment = trim($_GET['comment']);
    //$curTimeInfo = new CurTimeInfo();
    //$innerComment->date = $curTimeInfo->dateTime;
    
    if($innerComment->commentId == null && $innerComment->commentId != (integer)$innerComment->commentId)
    {
        throw new Exception("query_inner_comment.php - edit(): commentId can not be null or float");
    }
    if($innerComment->accountId == null && $innerComment->accountId != (integer)$innerComment->accountId)
    {
        throw new Exception("query_inner_comment.php - edit(): accountId can not be null or float");
    }
    DAOFactory::getInnerCommentDAO()->update($innerComment);
}

function delete()
{
    $id = trim($_GET['id']);
    DAOFactory::getInnerCommentDAO()->delete($id);
}

function query()
{
    $arrObj = array();
    $id = trim($_GET['id']);
    $innerComment = DAOFactory::getInnerCommentDAO()->load($id);
    array_push($arrObj, $innerComment);
    echo json_encode($arrObj);
}

function queryAll()
{
    $arrObj = DAOFactory::getInnerCommentDAO()->queryAll();
    echo json_encode($arrObj);
}

