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
                    <div class="">
                        <!-- Category Start -->
                        <div class="boxed">
                            <div class="title-bar white">
                                <h4>Category</h4>
                                <ul class="actions">
                                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                                    <!--<li><a href="#" class="remove-box"><i class="fa  fa-times"></i></a></li>-->
                                </ul>
                            </div>
                            <div class="inner no-radius">
                                <div class="row">
                                    <!-- File List Start -->
                                    <div id="tab_view" class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <?php include "view_controller/handle_tab_view.php"; ?>
                                        <!--<div class="nav-tabs-custom">
                                            
                                            <ul class="navs nav-tabs panel-info">
                                                <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                                                <li><a href="#categories" data-toggle="tab">Categories 1</a></li>

                                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                            </ul>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="all">
                                                    <p>All</p>
                                                </div>
                                                <div class="tab-pane" id="categories">
                                                    
                                                    <div class="tiles">
                                                        <div class="tile themed-background-muted" data-original-title="file name xxxx.pdf" data-toggle="tooltip">                         
                                                            <p>
                                                                <span class=" pull-right">
                                                                    <a data-original-title="Edit" onclick="shareFiletoGroup()" style="overflow: hidden; position: relative;" href="" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-share-alt"></i></a>
                                                                    <a data-original-title="Delete" onclick="deleteFile()" style="overflow: hidden; position: relative;" href="" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                                </span>
                                                            </p>
                                                            <div class="widget-content text-center" onclick="getFileInfo()" ondblclick="newPdfPage()">
                                                                <div class="widget-icon center-block push">
                                                                    <i class="fa  fa-file-pdf-o   text-file"></i>
                                                                </div>
                                                                <p style="color:#261D1D;"><strong>Security Book</strong></p>
                                                                <p style="color:#261D1D;"><strong>Size :</strong>5.00 KB</p>
                                                            </div>
                                                        </div>
                                                        <div class="tile themed-background-muted" data-original-title="file name xxxx.pdf" data-toggle="tooltip">                         
                                                            <p>
                                                                <span class=" pull-right">
                                                                    <a data-original-title="Edit" onclick="shareFiletoGroup()" style="overflow: hidden; position: relative;" href="" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-share-alt"></i></a>
                                                                    <a data-original-title="Delete" onclick="deleteFile()" style="overflow: hidden; position: relative;" href="" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                                </span>
                                                            </p>
                                                            <div class="widget-content text-center" onclick="getFileInfo()" ondblclick="newPdfPage()">
                                                                <div class="widget-icon center-block push">
                                                                    <i class="fa  fa-file-pdf-o   text-file"></i>
                                                                </div>
                                                                <p style="color:#261D1D;"><strong>Security Book</strong></p>
                                                                <p style="color:#261D1D;"><strong>Size :</strong>5.00 KB</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            
                                        </div>-->
                                    </div>
                                    <!-- File List End -->
                                    <!-- File Info Start -->
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                                        <section class="panel panel-default">
                                            <header class="panel-heading bg-lovender lt no-border">
                                                <div class="clearfix"> 
                                                    <span id="file_info_title">Title:</span>
                                                </div>
                                            </header>
                                            <div class="list-group no-radius alt">
                                                <div class="list-group-item" href="#"> 
                                                    <span id="file_info_last_update">Last update:</span>
                                                </div>
                                                <div class="list-group-item" href="#"> 
                                                    <span id="file_info_year">Year:</span>
                                                </div>   
                                                <div class="list-group-item" href="#"> 
                                                    <span id="file_info_abstract">Abstract:</span>
                                                </div>
                                            </div> 
                                             
                                        </section>

                                    </div>
                                    <!-- File Info End -->
                                </div>
                            </div>
                        </div> 
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

        <div id="pop_up_share" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Share File</h4>
                    </div>
                    <form name="share_file" action="view_controller/handle_share_file.php" method="GET" role="form">
                        <div class="modal-body">
                            <p id="share_file_name"></p> 
                            <input name="accountId" value="" type="hidden">
                            <input name="documentId" value="" type="hidden">
                            <div class="form-group">
                                <label>Choose a group:</label>
                                <select id="share_file_group" name="groupsId" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_share_file" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="pop_up_delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete File</h4>
                    </div>
                    <form name="delete_file" action="view_controller/handle_delete_file.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Are you sure?</p>                   
                            <input name="accountId" value="" type="hidden">
                            <input name="documentId" value="" type="hidden">    
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_delete_file" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_add_category" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Category</h4>
                    </div>
                    <form name="add_category" action="view_controller/handle_add_category.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Category Name</p>                   
                            <input name="accountId" value="" type="hidden">  
                            <input name="name" value="" type="text">
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_add_category" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_delete_category" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Category</h4>
                    </div>
                    <form name="delete_category" action="view_controller/handle_delete_category.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Choose a Category</p>                   
                            <input name="accountId" value="" type="hidden">
                            <select id="delete_category_option" name="categoryId" class="form-control">
                           
                            </select>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_delete_category" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_change_category" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Change Category</h4>
                    </div>
                    <form name="change_category" action="view_controller/handle_change_category.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Choose a Category</p>                   
                            <input name="accountId" value="" type="hidden">
                            <input name="documentId" value="" type="hidden">
                            <select id="change_category_option" name="categoryId" class="form-control">
                           
                            </select>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_change_category" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Javascript -->
        <?php include "../include_js.php" ?>

        <script src="js/local_js.js"></script>
    </body>  
</html>