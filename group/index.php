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
                    <div class="full">
                        <!-- Group List(own) Start -->
                        <div class="boxed">
                            <div class="title-bar white">
                                <h4>Group Owned</h4>
                                <ul class="actions">
                                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                            </div>
                            <div id="own_group_list" class="inner no-radius">
                                <?php include "view_controller/handle_own_group_list_view.php"; ?>
                                <!--<div class="tiles">
                                    <div class="row">
                                        <div class="col-md-12" style="margin: 0 10px 10px 0;">
                                            <a class="btn btn-warning" onclick="initAddGroup();" href="#pop_up_add_group" data-toggle="modal"><span class="fa fa-plus"></span>Add Group</a>
                                        </div>
                                    </div>
                                    <div class="tile double bg-blue-madison" style="height: 140px;" onclick="javascript:window.location = '../group_page/index.php?id=1';">
                                        <div class="tile-body">
                                            <img src="../images/icon_group.png" class="size-65" alt="">                     
                                            <h5 style="color: white">Security Group</h5>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                <span>Book: 4</span>
                                            </div>
                                            <div class="number">
                                                <span>Member: 10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile double bg-blue-madison" style="height: 140px;" onclick="javascript:window.location = '../group_page/index.php?id=2';">
                                        <div class="tile-body">
                                            <img src="../images/icon_group.png" class="size-65" alt="">
                                            <h4 style="color: white;">Security Group</h4>

                                            <p></p>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Book: 4
                                            </div>
                                            <div class="number">
                                                Member: 10
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--> 
                            </div>
                            <!-- Group List(own) End -->

                        </div>
                        <!-- Group List Start -->
                        <div class="boxed">
                            <div class="title-bar white">
                                <h4>Group Joined</h4>
                                <ul class="actions">
                                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                            </div>
                            <div id="group_list" class="inner no-radius">
                                <?php include "view_controller/handle_group_list_view.php"; ?>
                                <!--<div class="tiles">          
                                    <div class="tile double bg-blue-madison" style="height: 140px;" onclick="javascript:window.location = '../group_page/index.php?id=1';">
                                        <div class="tile-body">
                                            <img src="../images/icon_group.png" class="size-65" alt="">                     
                                            <h5 style="color: white">Security Group</h5>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                <span>Book: 4</span>
                                            </div>
                                            <div class="number">
                                                <span>Member: 10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile double bg-blue-madison" style="height: 140px;" onclick="javascript:window.location = '../group_page/index.php?id=2';">
                                        <div class="tile-body">
                                            <img src="../images/icon_group.png" class="size-65" alt="">
                                            <h4 style="color: white;">Security Group</h4>

                                            <p></p>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Book: 4
                                            </div>
                                            <div class="number">
                                                Member: 10
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <!-- Group List End -->
                        <!-- Page Content End -->


                        <!-- Footer Start -->
                        <div class="footer">
                            © 2016 Documentation Manager by <a href="" target="_blank">EK</a>
                        </div>
                        <!-- Footer End -->

                    </div>
                </div>

            </div>
        </section>

        <!--Floating Button-->
        <div id="totopscroller"> </div>

        <div id="pop_up_add_group" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Group</h4>
                    </div>
                    <form name="add_group" action="view_controller/handle_add_group.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Group Name</p>                   
                            <input name="accountId" value="" type="hidden">
                            <input name="groupName" value="" type="text">
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_add_group" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_delete_group" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Group</h4>
                    </div>
                    <form name="delete_group" action="view_controller/handle_delete_group.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Are you sure?</p>                   
                            <input name="accountId" value="" type="hidden">  
                            <input name="groupsId" value="" type="hidden">
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_delete_group" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="pop_up_leave_group" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Leave Group</h4>
                    </div>
                    <form name="leave_group" action="view_controller/handle_leave_group.php" method="GET" role="form">
                        <div class="modal-body">
                            <p>Are you sure?</p>                   
                            <input name="accountId" value="" type="hidden">  
                            <input name="groupsId" value="" type="hidden">
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_leave_group" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_add_member_to_group" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Member</h4>
                    </div>
                    <form name="add_member_to_group" action="view_controller/handle_add_member_to_group.php" method="GET" role="form">
                        <div class="modal-body">
                            <!--<p>Add Member</p>-->                   
                            <input name="accountId" value="" type="hidden"> 
                            <input name="groupsId" value="" type="hidden">
                            <input name="verified" value="0" type="hidden">
                            <input name="memberId" value="0" type="hidden">
                            <input id="txt_member_email" name="memberEmail" value="" type="text">
                            <button id="btn_search_account" type="button" class="btn btn-default"><i class="fa fa-search"></i></button>                            
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_add_member_to_group" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="pop_up_delete_member_in_group" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Member</h4>
                    </div>
                    <form name="delete_member_in_group" action="view_controller/handle_delete_member_in_group.php" method="GET" role="form">
                        <div class="modal-body">
                            <!--<p>Add Member</p>-->                   
                            <input name="accountId" value="" type="hidden"> 
                            <input name="groupsId" value="" type="hidden">
                            <div class="form-group">
                                <label>Choose a member:</label>
                                <select id="delete_group_member_option" name="memberId" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-actions">
                                <button id="btn_delete_member_in_group" type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
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