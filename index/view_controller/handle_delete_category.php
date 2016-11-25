<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();

try{
    if(empty($_GET['accountId']) || empty($_GET['categoryId']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $accountId = $_GET['accountId'];
    $categoryId = $_GET['categoryId'];
    $tran = new Transaction();
    $arrObj = DAOFactory::getDocumentDAO()->queryByCategoryId($categoryId);
    foreach ($arrObj as $document) 
    {
        $document->categoryId = NULL;
        DAOFactory::getDocumentDAO()->update($document);
    }
    DAOFactory::getCategoryDAO()->delete($categoryId);
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