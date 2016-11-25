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

        <link rel="stylesheet" href="../assets/file-upload/bootstrap-fileinput.css"><!-- bootstrap file upload CSS -->
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
                                <h4>Add File</h4>
                                <ul class="actions">
                                    <li><a href="#" class="close-box"><i class="fa fa-chevron-up"></i></a></li>
                                    <!--<li><a href="#" class="remove-box"><i class="fa  fa-times"></i></a></li>-->
                                </ul>
                            </div>
                            <div class="inner no-radius">
                                <div class="row">
                                    <!-- Add File Start -->
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <form name="add_file" class="form-bordered" action="view_controller/handle_add_file.php" method="POST" role="form" enctype="multipart/form-data">
                                            <input type="hidden" name="accountId" value="<?php echo $_SESSION['id']; ?>"/>
                                            <label>File</label>
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <!--<input value="" name="xxx" type="hidden">-->
                                                    <div class="input-group">
                                                        <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                                            <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename"></span>
                                                        </div>
                                                        <span class="input-group-addon btn btn-info btn-file">
                                                            <span class="fileinput-new">Select file </span>
                                                            <span class="fileinput-exists">Change </span>
                                                            <input name="file" type="file" accept="application/pdf">
                                                        </span>
                                                        <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>File Name</label>
                                                    <input name="new_file_name" class="form-control" placeholder="File Name" type="text">     
                                                </div>

                                                <div class="form-group">
                                                    <label>Year</label>
                                                    <input name="year" class="form-control" placeholder="Year" type="text">     
                                                </div>

                                                <div class="form-group">
                                                    <label>Abstract</label>
                                                    <textarea name="abstract" class="form-control" rows="3"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Categories(optional/add later)</label>
                                                    <select id="add_file_categoryId" name="categoryId" class="form-control">
                                                        <option value="">All</option>
                                                    </select>
                                                    <span id="add_file_message" class="help-inline" style="color:red;"></span>
                                                </div>

                                                <div class="form-actions">
                                                    <button id="btn_add_file" type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-default">Reset</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- Add File End -->

                                    <!-- File Preview Start -->
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">


                                    </div>
                                    <!-- File Preview End -->
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

        <!-- Javascript -->
        <?php include "../include_js.php" ?>
        <script src="../assets/file-upload/bootstrap-fileinput.js"></script><!--bootstrap file upload JS -->

        <script src="js/local_js.js"></script>
    </body>  
</html>