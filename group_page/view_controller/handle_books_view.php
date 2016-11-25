<?php

defined("FILE_PATH_ROOT") or define("FILE_PATH_ROOT", "../../");
defined("DB_API") or define("DB_API", "db/generated/");
defined("CODE") or define("CODE", "code/");

require_once "../" . DB_API . "include_dao.php";
require_once "../" . CODE . "include_code.php";

if (empty($_SESSION['id']) || empty($_GET['groupId'])) {
    exit();
}
$accountId = trim($_SESSION['id']);
$groupId = trim($_GET['groupId']);

$string = "";
$string .= allBooks();
echo $string;

function allBooks() {

    global $accountId;
    global $groupId;
    $allBooks = "";
    
    $arrGroupDocumentObj = DAOFactory::getGroupDocumentDAO()->queryByGroupsId($groupId);
    foreach ($arrGroupDocumentObj as $groupDocument) {
        $document = DAOFactory::getDocumentDAO()->load($groupDocument->documentId);
        if(empty(trim($document->path)))
        {
            continue;
        }

        $allBooks .= '<div class="boxed">' . "\n";

        $allBooks .= '<div class="title-bar white">' . "\n";
        $allBooks .= '<h4>' . $document->title . '</h4>';
        $allBooks .= '<ul class="actions">
                    <li><a onclick="showComment(\'#group_document_comment'.$groupDocument->id.'\')" style="cursor:pointer; background-color: #30a58e;color: #fff;padding: 6px;border-radius: 3px;">Show Comment</a></li>
                    <li><a onclick="hideComment(\'#group_document_comment'.$groupDocument->id.'\')" style="cursor:pointer; background-color: #30a58e;color: #fff;padding: 6px;border-radius: 3px;">Hide Comment</a></li>
                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>';
        $allBooks .= '</div>' . "\n";
        
        $allBooks .= '<div class="inner no-radius">';
        $allBooks .= '<div class="row">' . "\n";
        
        //PDF Start***********************************
        $allBooks .= '<div id="group_document_pdf'.$groupDocument->id.'" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">';        
        $allBooks .= '<div id="pdf">'.$document->path."\n";
        $allBooks .= '</div>' . "\n";
        $allBooks .= '</div>' . "\n";
        //PDF End***********************************
        
        //Comment Start***********************************
        $allBooks .= '<div id="group_document_comment'.$groupDocument->id.'" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">'."\n";
        $allBooks .= '<div class="Tratafloat-e-margins">';
        
        $allBooks .= '<div class="olive-title"><h5>User Comment</h5><a onclick="initAddComment(\''.$accountId.'\',\''.$groupDocument->id.'\',\'#group_document_comment'.$groupDocument->id.'\')" class="btn btn-success" style="float:right;padding:4px;" href="#pop_up_add_new_comment" data-toggle="modal">New Comment</a>';
        $allBooks .= '</div>' . "\n";
        $allBooks .= '<div class="olive-content">';
        $allBooks .= '<div class="feed-activity-list">';
        //Each Comment Start
        $arrCommentObj = DAOFactory::getCommentDAO()->queryByGroupDocumentId($groupDocument->id);
        foreach ($arrCommentObj as $comment) {
            $allBooks .= bookComment($comment, $document, $groupDocument);
        }
 
        //Each Comment End 
        $allBooks .= '</div>' . "\n";
        $allBooks .= '</div>' . "\n";
        
        $allBooks .= '</div>' . "\n";
        $allBooks .= '</div>' . "\n";
        //Comment End***********************************
        
        $allBooks .= '</div>' . "\n";
        $allBooks .= '</div>' . "\n";
        
        $allBooks .= '</div>' . "\n";
    }

    return $allBooks;
}

function bookComment($comment, $document, $groupDocument)
{
    global $accountId;
    $bookComment = "";
    $like = 0;
    $dislike = 0;
    //account info
    $account = DAOFactory::getAccountDAO()->load($comment->accountId);
    //like
    $arrGoodBadObj = DAOFactory::getGoodBadDAO()->queryByCommentIdGood($comment->id);
    $like = count($arrGoodBadObj);
    //dislike
    $arrGoodBadObj = DAOFactory::getGoodBadDAO()->queryByCommentIdDislike($comment->id);
    $dislike = count($arrGoodBadObj);
    
    $bookComment .= '<div class="feed-element" style="margin-bottom: 0px;padding-bottom: 7px;margin-top: 5px;">';
    $bookComment .= '<a href="#" class="pull-left">
                     <img alt="image" class="img-crl" src="../images/avatar/chat-avatar2.jpg">
                     </a>';
    
    $bookComment .= '<div class="media-body ">';
    
    //user can delete his inner comment
    if($account->id == $accountId)
    {
        $bookComment .= '<span class="pull-right" style="margin-top:30px;margin-right:10px">';
        $bookComment .= '<ul><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="caret"></span></a>';
        $bookComment .= '<ul class="dropdown-menu"><li role="presentation">
        <a role="menuitem" tabindex="-1" onclick="initDeleteComment(\''.$account->id.'\',\''.$comment->id.'\',\''.$groupDocument->id.'\',\'#group_document_comment'.$groupDocument->id.'\')" href="#pop_up_delete_comment" data-toggle="modal">Delete</a></li></ul>
        </li></ul>';
        $bookComment .= '</span>';
    }
    
    
    $bookComment .= '<small class="pull-right"><span class="label label-inverse" style="color:#696969;">'.$comment->lastUpdate.'</span></small>';
    $bookComment .= '<span class="label label-info">'.$account->name.'</span>';
    $bookComment .= '<div class="well">';
    $bookComment .= '<span style="cursor:pointer;font-size:10px;" onclick="updatePdfView(\''.$document->path.'\',\'#group_document_pdf'.$groupDocument->id.'\',\''.$comment->page.'\')" class="label label-primary">P. '.$comment->page.'</span>';
    $bookComment .= '<p>'.$comment->comment.'</p>';
    $bookComment .= '</div>' . "\n";
    $bookComment .= '<div class="pull-right">';
    $bookComment .= '<a class="btn btn-xs btn-info" style="margin-left:3px;" onclick="clickLike(\''.$accountId.'\',\''.$comment->id.'\',\''.$groupDocument->id.'\',\'#group_document_comment'.$groupDocument->id.'\')"><i class="fa fa-thumbs-up"></i>like '.$like.'</a>';
    $bookComment .= '<a class="btn btn-xs btn-danger" style="margin-left:3px;" onclick="clickDislike(\''.$accountId.'\',\''.$comment->id.'\',\''.$groupDocument->id.'\',\'#group_document_comment'.$groupDocument->id.'\')"><i class="fa fa-thumbs-down"></i>Dislike '.$dislike.'</a>';
    $bookComment .= '<a class="btn btn-xs btn-success" style="margin-left:3px;" onclick="initInnerComment(\''.$accountId.'\',\''.$comment->id.'\',\''.$groupDocument->id.'\',\'#group_document_comment'.$groupDocument->id.'\')" href="#pop_up_add_inner_comment" data-toggle="modal"><i class="fa fa-comments"></i> Comments</a>';
    $bookComment .= '</div>' . "\n";
    
    $bookComment .= '</div>' . "\n";
    
    $bookComment .= '</div>' . "\n";
    
    $bookComment .= innerComment($comment, $groupDocument);
    
    return $bookComment;
}

function innerComment($comment, $groupDocument)
{
    global $accountId;
    $innerCommentString = "";
    $len = 0;
    
    $arrInnerCommentObj = DAOFactory::getInnerCommentDAO()->queryByCommentIdOrderByDate($comment->id);
    $len = count($arrInnerCommentObj);
    foreach ($arrInnerCommentObj as $index => $innerComment) {
        $account = DAOFactory::getAccountDAO()->load($innerComment->accountId);
        if($index == $len-1)
        {
            $innerCommentString .= '<div class="feed-element" style="margin-bottom: 0px;padding-bottom: 7px;margin-top: 5px;">'."\n";
        }else
        {
            $innerCommentString .= '<div class="feed-element" style="margin-bottom: 0px;padding-bottom: 7px;margin-top: 5px; border-width:0px;">'."\n";
        }   
        $innerCommentString .= '<div class="media-body ">'."\n";
        
        //user can delete his inner comment
        if($innerComment->accountId == $accountId)
        {
            $innerCommentString .= '<span class="pull-right" style="margin-top:10px;margin-right:10px">';
            $innerCommentString .= '<ul><li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="caret"></span></a>';
            $innerCommentString .= '<ul class="dropdown-menu"><li role="presentation">
            <a role="menuitem" tabindex="-1" onclick="initDeleteInnerComment(\''.$account->id.'\',\''.$innerComment->commentId.'\',\''.$groupDocument->id.'\',\''.$innerComment->id.'\',\'#group_document_comment'.$groupDocument->id.'\')" href="#pop_up_delete_inner_comment" data-toggle="modal">Delete</a></li></ul>
            </li></ul>';
            $innerCommentString .= '</span>';
        }
        
        $innerCommentString .= '<div class="well">';
        
        $innerCommentString .= $innerComment->comment;
        $innerCommentString .= '<div class="row">';
        $innerCommentString .= '<span class="label label-info pull-right" style="font-size:11px;">'.$account->name.'</span>';
        $innerCommentString .= '</div>'."\n";
        
        $innerCommentString .= '</div>'."\n";
        $innerCommentString .= '</div>'."\n";
        $innerCommentString .= '</div>'."\n";
        
    }
    
    return $innerCommentString;
}
