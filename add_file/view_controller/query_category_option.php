<?php

defined ("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined ("DB_API") or define("DB_API","db/generated/");
defined ("CODE") or define("CODE", "code/");  

require_once FILE_PATH_ROOT.DB_API."include_dao.php";
require_once FILE_PATH_ROOT.CODE."include_code.php";

$string = "";

if(empty($_GET['accountId']))
{
    return;
}

$arrObj = DAOFactory::getCategoryDAO()->queryByAccountId($_GET['accountId']);
foreach($arrObj as $category)
{
    $string .= '<option value="'.$category->id.'"> '.$category->name.' </option>';
}

echo $string;








