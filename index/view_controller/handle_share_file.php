<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();

try{
    if(empty($_GET['groupsId']) || empty($_GET['documentId']))
    {
        throw new Exception("Some illegal action detected.");
    }
    $groupDocument = new GroupDocument();
    $groupDocument->groupsId = trim($_GET['groupsId']);
    $groupDocument->documentId = trim($_GET['documentId']);
    
    $arrObj = DAOFactory::getGroupDocumentDAO()->queryByGroupsIdDocumentId($groupDocument->groupsId, $groupDocument->documentId);
    if(count($arrObj))
    {
        throw new Exception("Duplicated document was detected.");
    }
    $tran = new Transaction();
    DAOFactory::getGroupDocumentDAO()->insert($groupDocument);
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