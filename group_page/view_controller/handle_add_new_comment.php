<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();

try{
    if(empty($_GET['accountId'])|| empty($_GET['groupDocumentId']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $comment = new Comment();
    $comment->accountId = trim($_GET['accountId']);
    $comment->groupDocumentId = trim($_GET['groupDocumentId']);
    $comment->page = trim($_GET['page']);
    $comment->comment = trim($_GET['comment']);
    $curTimeInfo = new CurTimeInfo();
    $comment->lastUpdate = $curTimeInfo->dateTime;
    
    if($comment->page == null && $comment->page != (integer)$comment->page && $comment->page < 0)
    {
        throw new Exception("Page can not be NULL, negative or String.");
    }
    
    $tran = new Transaction();
    DAOFactory::getCommentDAO()->insert($comment);
    $tran->commit();
    
    $reponseMessage->error = 0;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = NULL;
    echo $reponseMessage->getJsonFormat();
    
} catch (Exception $exc) {
    $reponseMessage->error = 1;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = $exc->getMessage();
    echo $reponseMessage->getJsonFormat();
}