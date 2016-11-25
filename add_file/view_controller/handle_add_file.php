<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$reponseMessage = new ReponseMessage();
try{
    $serverUploadDirectory = "";
    $dbFileTitle = "";
    $dbFilePath = "";
    $account = new Account();
    $account->id = trim($_POST['accountId']); // $_POST['accountId'] from $_SESSION['id']
    $newFileName = trim($_POST['new_file_name']);

    //check accountId is exist or not
    $account = DAOFactory::getAccountDAO()->load($account->id);
    if(empty($account))
    {
        throw new Exception("There is no accountId = ".$_POST['accountId']. "in Acount Table.");
    }

    //make a user file's directory if it does not exist.
    $string = $account->email;
    $string = preg_replace('/[^a-zA-Z0-9\-]/', '_', $string);
    $string = preg_replace('/^[\-]+/', '_', $string);
    $string = preg_replace('/[\-]+$/', '_', $string);
    $string = preg_replace('/[\-]{2,}/', '_', $string);
    $accountFilePath = $string; //paco@gmail.com -> paco_gmail_com
    $serverUploadDirectory = "document_save_here/".$accountFilePath ."/";
    $accountFilePath = "../../".$serverUploadDirectory;
    if(!is_dir($accountFilePath))
    {
        mkdir($accountFilePath);
    }

    handleFileData();
    handlePostData();
    
    $reponseMessage->error = 0;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = NULL;
    echo $reponseMessage->getJsonFormat();
}catch(Exception $exc)
{
    $reponseMessage->error = 1;
    $reponseMessage->data = NULL;
    $reponseMessage->errMsg = $exc->getMessage();
    echo $reponseMessage->getJsonFormat();
}




function handleFileData()
{
    global $newFileName;
    global $accountFilePath;
    global $dbFileTitle;
    global $dbFilePath;
    global $serverUploadDirectory;

    //check whether the upload file is a pdf file or not
    $info = pathinfo($_FILES['file']['name']);
    if(strcmp(strtolower($info['extension']), "pdf") != 0)
    {
        throw new Exception("File extension must be a pdf format.");
    }
    
    if(empty($newFileName))
    {
        $newFileName = $_FILES['file']['name'];
        if(empty($newFileName))
        {
            throw new Exception("File name must be filled.");
        }        
    }
    //check whether an expected file name is valid or not
    if(preg_match('/[^A-Za-z0-9.#\\-\s\_$]/', $newFileName))
    {
        throw new Exception("File name is invalid.");
    }

    //delete ".pdf" if user insert a file extension in a expected file name
    $newFileName = preg_replace('/.pdf$/', '', $newFileName);
    
//    $string = $newFileName;
//    $string = preg_replace('/[^a-zA-Z0-9\-]/', '_', $string);
//    $string = preg_replace('/^[\-]+/', '_', $string);
//    $string = preg_replace('/[\-]+$/', '_', $string);
//    $string = preg_replace('/[\-]{2,}/', '_', $string);
//    $newFileName = $string;
    
    $newFileName = $newFileName.".pdf";
    
    $dbFileTitle = $newFileName; //It is for database title
    $dbFilePath = $serverUploadDirectory . $newFileName; //It is for database path
    
    $newFileName = $accountFilePath . $newFileName;
    
    if(file_exists($newFileName))
    {
        throw new Exception("File name is existed.");
    }
    
    move_uploaded_file( $_FILES['file']['tmp_name'], $newFileName);
}

function handlePostData()
{
    global $dbFilePath;
    global $dbFileTitle;
    
    $document = new Document();
    $document->accountId = trim($_POST['accountId']);
    $document->categoryId = (empty(trim($_POST['categoryId'])))?NULL:$_POST['categoryId'];
    $curTimeInfo = new CurTimeInfo();
    $document->date = $curTimeInfo->dateTime;
    $document->path = $dbFilePath;
    $document->title = $dbFileTitle;
    $document->year = trim($_POST['year']);
    $document->abstract = trim($_POST['abstract']);
    
    if($document->accountId == NULL && $document->accountId != (integer)$document->accountId)
    {
        throw new Exception("handle_add_file.php - handlePostData(): accountId can not be null or float");
    }
    
    if(empty($document->path))
    {
        throw new Exception("handle_add_file.php - handlePostData(): path can not be null");
    }
    if(empty($document->title))
    {
        throw new Exception("handle_add_file.php - handlePostData(): title can not be null");
    }
    $tran = new Transaction();
    DAOFactory::getDocumentDAO()->insert($document);
    $tran->commit();
}




