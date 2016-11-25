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
    $commentId = trim($_GET['commentId']);
    
    $tran = new Transaction();
    DAOFactory::getGoodBadDAO()->deleteByCommentId($commentId);
    DAOFactory::getInnerCommentDAO()->deleteByCommentId($commentId);
    DAOFactory::getCommentDAO()->delete($commentId);
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