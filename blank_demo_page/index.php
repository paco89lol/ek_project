<!--

some session code here handling the user data.

-->

<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EK project</title>

        <!-- START STYLESHEET -->
        <link href="../css/styles.css" rel="stylesheet" type="text/css"><!-- Theme Skeleton CSS -->
        <link href="../css/page/index.css" rel="stylesheet" type="text/css"><!-- Index page CSS -->
        <!--<link href="../assets/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css">--><!-- fullCalendar -->
        <!--<link href="../assets/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">--><!-- VECTOR MAP CSS -->
        <!--<link href="../assets/morris/morris.css" rel="stylesheet">--><!-- MORRIS CHART CSS -->
        
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="assets/flotcharts/excanvas.min.js"></script><![endif]-->

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
                                    <a href="#" class="dropdown-toggle email m-t-0" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" >
                                        <i class="fa fa-mortar-board"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Logo End -->
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align: right;">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                    <input name="options" id="1" type="radio"> Group
                                </label>
                                <label class="btn btn-default active">
                                    <input name="options" id="2" type="radio"> Document
                                </label>                            
                            </div>
                        </div>
                        <!-- Search Start -->
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div class="input-group m-t-0">
                                <input class="form-control input-white" placeholder="Enter keywords here..." type="text">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
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
                                            <a href="profile.html">
                                                <i class="fa fa-user"></i> My Profile </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-envelope"></i> My Inbox 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-rocket"></i> My Tasks 
                                            </a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="lockscreen.html">
                                                <i class="fa fa-lock"></i> Lock Screen </a>
                                        </li>
                                        <li>
                                            <a href="login.html">
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
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border-top-right-radius:6px;border-bottom-right-radius:6px;background-color:#252f40;min-height:40px;padding-top: 10px;font-weight: 800;">
                            <ul style="text-align: center;">
                                <li style="float: left;">
                                    <a style="text-align: center;padding-left:10px;padding-right:30px" href="index.html"><span style="color: whitesmoke">Home</span></a>
                                </li>
                                <li style="float: left;">
                                    <a style="text-align: center;padding-left:10px;padding-right:30px" href="#"><span style="color: whitesmoke">Group</span></a>
                                </li>
                                <li style="float: left;">
                                    <a style="text-align: center;padding-left:10px;" href="#"><span style="color: whitesmoke">Document</span></a>
                                </li>                       
                            </ul>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 btn-warning" style="float:right;border-top-left-radius:6px;border-bottom-left-radius:6px;min-height:40px;padding-top:10px;font-weight: 800;">
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
                        <div class="row">
                            
                        </div>
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
        <script src="../js/jquery.min.js"></script><!-- jQuery LIB. JS -->
        <script src="../js/jquery-ui-1.10.3.js" type="text/javascript"></script><!-- jQuery UI 1.10.3 -->
        <script src="../js/bootstrap.min.js"></script><!-- BOOTSTRAP JS-->
        <script src="../js/bootstrap-hover-dropdown.min.js"></script><!-- HOVER DROPDOWN JS-->
        <script src="../js/jquery.slimscroll.js"></script><!-- SLIMSCROLL JS-->
        <script src="../js/jquery.totop.js"></script><!-- TO TOP JS -->
        <!--<script src="../assets/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--><!-- VECTORMAP JS -->
        <!--<script src="../assets/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--><!-- VECTORMAP JS -->
        <!--<script src="../assets/fullcalendar/js/fullcalendar.min.js" type="text/javascript"></script>--><!-- fullCalendar -->
        <script src="../js/raphael-min.js"></script><!-- Morris.js charts -->
        <!--<script src="../assets/morris/morris.min.js" type="text/javascript"></script>--><!-- Morris.js charts -->
        <script src="../assets/knob/js/jquery.knob.js" type="text/javascript"></script><!-- KNOB JS -->
        <script src="../js/main.js"></script><!-- THEME MAIN JS -->
        <!--<script src="../js/page/index.js"></script>--><!-- INDEX PAGE JS -->
        
    </body>  
</html>