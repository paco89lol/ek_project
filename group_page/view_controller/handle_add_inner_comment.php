<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();

try{
    if(empty($_GET['accountId'])|| empty($_GET['groupDocumentId']) || empty($_GET['commentId']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $innerComment = new InnerComment();
    $innerComment->accountId = trim($_GET['accountId']);
    $innerComment->commentId = trim($_GET['commentId']);
    $innerComment->comment = trim($_GET['comment']);
    $curTimeInfo = new CurTimeInfo();
    $innerComment->date = $curTimeInfo->dateTime;
    
    $tran = new Transaction();
    DAOFactory::getInnerCommentDAO()->insert($innerComment);
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