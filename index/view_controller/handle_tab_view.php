<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../" . DB_API . "include_dao.php";
require_once "../" . CODE . "include_code.php";

if (empty($_SESSION['id'])) {
    exit();
}
$accountId = trim($_SESSION['id']);

$string = "";
$string .= '<div class="nav-tabs-custom">'."\n";
$string .= tabBar();
$string .= tabContent();
$string .= '</div>'."\n";
echo $string;


function tabBar()
{
    global $accountId;
    $tabBar = "";
    $tabBar .= '<ul class = "navs nav-tabs panel-info">'."\n";
    $tabBar .= '<li class = "active"><a href = "#all" data-toggle = "tab">All</a></li>'."\n";
    $arrObj = DAOFactory::getCategoryDAO()->queryByAccountId($accountId);
    foreach($arrObj as $category)
    {
        $tabBar .= '<li><a href = "#' . $category->name . '" data-toggle = "tab">' . $category->name . '</a></li>'."\n";
    }  
    $tabBar .= addTabBarSettingButton();
    $tabBar .= '</ul>'."\n";
    return $tabBar;
}

function tabContent()
{
    global $accountId;
    $tabContent = "";
    
    $tabContent .= '<div class="tab-content">'."\n";
    
    $tabContent .= '<div class="tab-pane active" id="all">'."\n";
    $tabContent .= '<div class="tiles">'."\n";
    $arrDocumentObj = DAOFactory::getDocumentDAO()->queryByAccountId($accountId);
    foreach ($arrDocumentObj as $document)
    {
        if(!empty($document->path))
        {
            $tabContent .= tile($document);
        }
    }
    $tabContent .= '</div>'."\n";
    $tabContent .= '</div>'."\n";
    $arrCategoryObj = DAOFactory::getCategoryDAO()->queryByAccountId($accountId);
    foreach($arrCategoryObj as $category)
    {
        $tabContent .= '<div class="tab-pane" id="'.$category->name.'">'."\n";
        $tabContent .= '<div class="tiles">'."\n";
        
        $arrDocumentObj = DAOFactory::getDocumentDAO()->queryByCategoryId($category->id);
        foreach($arrDocumentObj as $document)
        {
            if(!empty($document->path))
            {
                $tabContent .= tile($document);
            }
        }
        
        $tabContent .= '</div>'."\n";
        $tabContent .= '</div>'."\n";
    }
    $tabContent .= '</div>'."\n";
    return $tabContent;
}

function tile($document)
{
    global $accountId;
    $tile = "";
    $ss = new ShorterString();
    $fh = new FileHandler();
 
    $tile .= '<div class="tile themed-background-muted" data-original-title="'.$document->title.'" data-toggle="tooltip">';
    $tile .= '<p>'."\n";
    $tile .= '<span class=" pull-right">
      <a data-original-title="Edit" onclick="initChangeCategory('.$accountId.','.$document->id.',\''.$document->title.'\',\''.$document->categoryId.'\')" style="overflow: hidden; position: relative;" href="#pop_up_change_category" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-warning"><i class="fa fa-eraser"></i></a>
      <a data-original-title="Edit" onclick="shareFiletoGroup('.$accountId.','.$document->id.',\''.$document->title.'\')" style="overflow: hidden; position: relative;" href="#pop_up_share" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-share-alt"></i></a>
      <a data-original-title="Delete" onclick="deleteFile('.$document->accountId.','.$document->id.',\''.$document->title.'\')" style="overflow: hidden; position: relative;" href="#pop_up_delete" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
      </span>';
    $tile .= '</p>'."\n";
    $tile .= '<div class="widget-content text-center" onclick="getFileInfo(\''.$document->title.'\',\''.$document->date.'\',\''.$document->year.'\',\''.$document->abstract.'\')" ondblclick="newPdfPage(\''.$document->path.'\')">'."\n";
    $tile .= '<div class="widget-icon center-block push">'."\n";
    $tile .= '<i class="fa fa-file-pdf-o text-file"></i>'."\n";
    $tile .= '</div>'."\n";
    $tile .= '<p style="color:#261D1D;"><strong>'.$ss->getShorter($document->title).'</strong></p>'."\n";
    $tile .= '<p style="color:#261D1D;"><strong></strong>'.$fh->getFileSize("../", $document->path).'</p>'."\n";
    $tile .= '</div>'."\n";
    $tile .= '</div>'."\n";
    return $tile;
}

function addTabBarSettingButton()
{
    global $accountId;
    $tabBarSettingButton = "";
    
    $tabBarSettingButton .= '<li class="pull-right dropdown">';
    $tabBarSettingButton .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><i class="fa fa-gear"></i></a>';
    $tabBarSettingButton .= '<ul class="dropdown-menu">';
    $tabBarSettingButton .= '<li role="presentation"><a role="menuitem" tabindex="-1" onclick="initAddCategory('.$accountId.')" href="#pop_up_add_category" data-toggle="modal">Add Category</a></li>';
    $tabBarSettingButton .= '<li role="presentation"><a role="menuitem" tabindex="-1" onclick="initDeleteCategory('.$accountId.')" href="#pop_up_delete_category" data-toggle="modal">Delete Category</a></li>';
    $tabBarSettingButton .= '</ul>';
    $tabBarSettingButton .= '</li>';
    
    return $tabBarSettingButton;
}