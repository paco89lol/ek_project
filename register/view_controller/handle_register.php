<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();
try{
    $account = new Account();
    $account->name = trim($_GET['name']);
    $account->password = trim($_GET['password']);
    $account->email = trim($_GET['email']);
    
    if(empty($account->name) || empty($account->password) || empty($account->email))
    {
        throw new Exception("All fields should be filled.");
    }
    
    $tran = new Transaction();
    DAOFactory::getAccountDAO()->insert($account);
    $tran->commit();
    
    $reponseMessage->error = 0;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = NULL;
    echo $reponseMessage->getJsonFormat();
}
catch(Exception $exc)
{
    $reponseMessage->error = 1;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = $exc->getMessage();
    echo $reponseMessage->getJsonFormat();
}
