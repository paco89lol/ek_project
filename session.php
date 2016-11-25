<?php
require_once '../db/generated/include_dao.php';

//bypass
//$_SESSION['name']="paco";$_SESSION['password']="paco";$_SESSION['LAST_ACTIVITY'] = time();

if(is_numeric($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    header('location: ../login/index.php');
}

if(empty($_SESSION['name']) || empty($_SESSION['password']) || empty($_SESSION['password'])) {
    header('location: ../login/index.php');
}else {	
    $arrObj = DAOFactory::getAccountDAO()->queryByNamePassword($_SESSION['name'], $_SESSION['password']);
    if(count($arrObj)) {
        $_SESSION['name'] = $arrObj[0]->name;
        $_SESSION['password'] = $arrObj[0]->password;
        $_SESSION['id'] = $arrObj[0]->id;
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}

?>