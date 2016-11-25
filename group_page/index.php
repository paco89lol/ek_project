<?php
session_start();
include '../session.php';
?>

<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EK project</title>

        <!-- START STYLESHEET -->
        <?php include "../include_css.php" ?>

    </head>
    <body class="full">
        <section class="content">

            <div class="content-liquid-full">
                <div class="container">

                    <!-- Header Bar Start -->
                    <div class="row header-bar">
                        <!-- Logo Start -->
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">                           
                            <ul class="right-icons" >
                                <li class="dropdown dropdown-notification dropdown-inbox r-s">
                                    <a href="../index/" class="dropdown-toggle email m-t-0">
                                        <i class="fa fa-mortar-board"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Logo End -->
                        <form name="search" action="#" method="GET" role="form">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align: right;">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input name="options" id="1" type="radio" value="group"> Group
                                    </label>
                                    <label class="btn btn-default active">
                                        <input name="options" id="2" type="radio" value="document" checked="true"> Document
                                    </label>                            
                                </div>
                            </div>
                            <!-- Search Start -->
                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                <div class="input-group m-t-0">
                                    <input name="text" class="form-control input-white" placeholder="Enter keywords here..." type="text">
                                    <div class="input-group-btn">
                                        <button id="btn_search" type="submit" class="btn btn-info"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Search End -->
                        <!-- User Icon Start -->
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

                            <ul class="right-icons" >
                                <li class="dropdown dropdown-notification dropdown-user r-s">
                                    <a href="#" class="dropdown-toggle user m-t-0" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" >
                                        <i class="fa fa-user"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?></a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="../logout/">
                                                <i class="fa fa-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- User Icon End -->
                    </div>
                    <!-- Header Bar End -->


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><p></p></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="border-top-right-radius:6px;border-bottom-right-radius:6px;background-color:#252f40;min-height:40px;padding-top: 10px;font-weight: 800;">
                            <ul style="text-align: center;">
                                <li style="float: left;">
                                    <a style="text-align: center;padding-left:10px;padding-right:30px" href="../index/"><span style="color: whitesmoke">My Document</span></a>
                                </li>
                                <li style="float: left;">
                                    <a style="text-align: center;padding-left:10px;padding-right:30px" href="../group/"><span style="color: whitesmoke">My Group</span></a>
                                </li>                      
                            </ul>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 btn-warning" onclick="javascript:window.location = '../add_file/';" style="float:right;border-top-left-radius:6px;border-bottom-left-radius:6px;min-height:40px;padding-top:10px;font-weight: 800;cursor:pointer;">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files</span>
                        </div>
                    </div>


                    <!-- Breadcrumbs Start -->
                    <!--<div class="row breadcrumbs m-b20">
                        <ul class="breadcrumbs">
                            <li><a href="#"><i class="fa fa-home"></i></a></li>
                            <li><a href="#">Blank Page</a></li>
                        </ul>
                    </div>-->
                    <!-- Breadcrumbs End -->


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><p></p></div>
                    </div>


                    <!-- Page Content Start -->
                    <form name="data">
                        <input name="accountId" value="<?php echo $_SESSION['id']; ?>" type="hidden"/>
                        <input name="groupId" value="<?php echo $_GET['groupId']; ?>" type="hidden"/>
                    </form>

                    <div class="full">
                        <!-- Books Start -->
                        <div id="books">
                            <?php include "view_controller/handle_books_view.php"; ?>
                        </div>                        
                        <!-- Books End -->
                        <!-- Category End -->
                    </div>
                    <!-- Page Content End -->


                    <!-- Footer Start -->
                    <div class="footer">
                        © 2016 Documentation Manager by <a href="" target="_blank">EK</a>
                    </div>
                    <!-- Footer End -->

                </div>
            </div>


        </section>

        <!--Floating Button-->
        <div id="totopscroller"> </div>

        <div id="pop_up_add_new_comment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Post New Comment</h4>
                    </div>
                    <form name="add_new_comment" action="view_controller/handle_add_new_comment.php" method="GET" role="form">
                        <div class="modal-body">
                            <!--<p>Add Member</p>-->                   
                            <input name="accountId" value="" type="hidden"> 
                            <input name="groupDocumentId" value="" type="hidden">
                            <input name="refreshId" value="" type="hidden">
                            <div class="form-group">
                                <label>page:</label>
                                <input name="page" value="" class="form-control" placeholder="Page" type="text">     
                            </div>
                            <div class="form-group">
                                <label>Comment:</label>
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_add_new_comment" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_add_inner_comment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Reply The Comment</h4>
                    </div>
                    <form name="add_inner_comment" action="view_controller/handle_add_inner_comment.php" method="GET" role="form">
                        <div class="modal-body">
                            <!--<p>Add Member</p>-->                   
                            <input name="accountId" value="" type="hidden"> 
                            <input name="groupDocumentId" value="" type="hidden">
                            <input name="commentId" value="" type="hidden">
                            <input name="refreshId" value="" type="hidden">
                            
                            <div class="form-group">
                                <label>Reply:</label>
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_add_inner_comment" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_delete_inner_comment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Are you sure?</h4>
                    </div>
                    <form name="delete_inner_comment" action="view_controller/handle_delete_inner_comment.php" method="GET" role="form">
                        <div class="modal-body">
                            <!--<p>Add Member</p>-->                   
                            <input name="accountId" value="" type="hidden"> 
                            <input name="groupDocumentId" value="" type="hidden">
                            <input name="commentId" value="" type="hidden">
                            <input name="innerCommentId" value="" type="hidden">
                            <input name="refreshId" value="" type="hidden">
     
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_delete_inner_comment" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_delete_comment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Are you sure?</h4>
                    </div>
                    <form name="delete_comment" action="view_controller/handle_delete_comment.php" method="GET" role="form">
                        <div class="modal-body">
                            <!--<p>Add Member</p>-->                   
                            <input name="accountId" value="" type="hidden"> 
                            <input name="groupDocumentId" value="" type="hidden">
                            <input name="commentId" value="" type="hidden">
                            <input name="refreshId" value="" type="hidden">
     
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_delete_comment" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Javascript -->
        <?php include "../include_js.php" ?>

        <!--<script type="text/javascript" src="js/jquery.media.js"></script>--> <!-- PDF Viewer JS-->
        <!--<script type="text/javascript" src="http://github.com/malsup/media/raw/master/jquery.media.js?v0.92"></script>--><!-- PDF Viewer JS(Internet)-->

        <script src="js/pdfobject.min.js"></script> <!-- PDF Viewer JS (better) -->

        <script src="js/local_js.js"></script>
    </body>  
</html>