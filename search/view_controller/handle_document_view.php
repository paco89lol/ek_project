<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../../" . DB_API . "include_dao.php";
require_once "../../" . CODE . "include_code.php";

if (empty($_GET['accountId'])) {
    exit();
}
$accountId = trim($_GET['accountId']);
$text = trim($_GET['text']);

$string = "";
$string .= '<div class="nav-tabs-custom">'."\n";
$string .= allDocument();
$string .= '</div>'."\n";
echo $string;

function allDocument()
{
    global $accountId;
    global $text;
    $string = "";
    $string .= '<div class="tiles">'."\n";
    $arrDocumentObj = DAOFactory::getDocumentDAO()->queryByAccountIdLikeTitleOrLikeAbstract($accountId, $text);
    foreach($arrDocumentObj as $document)
    {
        if(!empty($document->path))
        {
            $string .= tile($document);
        }
    }
    $string .= ''."\n";
    return $string;
}

function tile($document)
{
    global $accountId;
    $tile = "";
    $ss = new ShorterString();
    $fh = new FileHandler();
 
    $tile .= '<div class="tile themed-background-muted" >'."\n";
    $tile .= '<div class="widget-content text-center" onclick="getFileInfo(\''.$document->title.'\',\''.$document->date.'\',\''.$document->year.'\',\''.$document->abstract.'\')" ondblclick="newPdfPage(\''.$document->path.'\')" >'."\n";
    $tile .= '<div class="widget-icon center-block push">'."\n";
    $tile .= '<i class="fa fa-file-pdf-o text-file"></i>'."\n";
    $tile .= '</div>'."\n";
    $tile .= '<p style="color:#261D1D;"><strong>'.$ss->getShorter($document->title).'</strong></p>'."\n";
    $tile .= '<p style="color:#261D1D;"><strong></strong>'.$fh->getFileSize("../../", $document->path).'</p>'."\n";
    $tile .= '</div>'."\n";
    $tile .= '</div>'."\n";
    $tile .= '</div>'."\n";
    return $tile;
}
