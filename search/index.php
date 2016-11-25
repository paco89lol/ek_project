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
                        <input name="accountId" value="<?php echo $_SESSION['id']; ?>" type="hidden">
                        <input name="option" value="<?php echo $_GET['options']; ?>" type="hidden">
                        <input name="text" value="<?php echo $_GET['text']; ?>" type="hidden">
                    </form>
                    <div class="full">

                        <div id="document" class="boxed">
                            <div class="title-bar white">
                                <h4>Document Search For "<?php echo $_GET['text']; ?>"</h4>
                                <ul class="actions">
                                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                            </div>
                            
                            <div class="inner no-radius">
                                <div class="row">
                                    <div id="document_content" class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    </div>
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
                                                    <span id="file_info_year">Year:</span>
                                                </div>
                                                <div class="list-group-item" href="#"> 
                                                    <span id="file_info_last_update">Last update:</span>
                                                </div>
                                                <div class="list-group-item" href="#"> 
                                                    <span id="file_info_abstract">Abstract:</span>
                                                </div>
                                            </div> 
                                             
                                        </section>

                                    </div>
                                    <!-- File List End -->
                                    <!-- File Info End -->
                                </div>
                            </div>
                        </div>

                        <div id="group" class="boxed">
                            <div class="title-bar white">
                                <h4>Group Search For "<?php echo $_GET['text']; ?>"</h4>
                                <ul class="actions">
                                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                            </div>
                            <div id="group_content" class="inner no-radius">

                            </div>
                        </div>

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
        
        <!-- Javascript -->
        <?php include "../include_js.php" ?>

        <script src="js/local_js.js"></script>
    </body>  
</html>