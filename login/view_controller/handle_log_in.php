<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

session_start(); //It is important;

$account = new Account();
$account->name = trim($_GET['name']);
$account->password = trim($_GET['password']);

$arrObj = DAOFactory::getAccountDAO()->queryByNamePassword($account->name, $account->password);
if(count($arrObj))
{
    $_SESSION['name'] = $arrObj[0]->name;
    $_SESSION['password'] = $arrObj[0]->password;
    $_SESSION['id'] = $arrObj[0]->id;
    $_SESSION['LAST_ACTIVITY'] = time();
    header('location: ../../index/');
}else
{
    header("location: ../../login/index.php?error=User%20Name%20or%20Password%20is%20incorrect.");
}


?>