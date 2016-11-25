<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EK project</title>

        <!-- START STYLESHEET -->
        <?php include "../include_css.php" ?>

    </head>
    <body class="lock-screen">
        <section id="content" class="m-t-lg wrapper-md ">
            <div class="nav-brand bounceInDown animated">
                <a class="name-tag" href="../index/"><i class="fa fa-fw fa-mortar-board"></i> Welcome to EK Document Management System</a>
            </div>
            <div class="row m-n animated wobble">
                <div class="col-md-4 col-md-offset-4 m-t-lg">
                    <section class="panel panels panel-primary"><header class="panel-heading text-center">Sign in/Sign up</header>

                            <form name="login" action="view_controller/handle_log_in.php" method="GET" class="panel-body" role="form">
                                <div class="form-body">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input name="name" class="form-control" placeholder="User name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input name="password" class="form-control" placeholder="Password" type="password">
                                        </div>
                                        <span id="signin_message" class="help-inline" style="color:red;">
                                            <?php
                                                if(!empty($_GET['error']))
                                                {
                                                    echo $_GET['error'];
                                                }
                                            ?>
                                        </span>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    <button type="button" class="btn btn-default btn-block" onclick="javascript:window.location = '../register';">Register</button>

                                </div>
                            </form>
                        
                    </section>
                </div>
            </div>
        </section>
    </div>


    <!--Floating Button-->
    <div id="totopscroller"> </div>

    <!-- Javascript -->
    <?php include "../include_js.php" ?>
    <script src="../js/jquery.backstretch.min.js"></script><!--backstretch JS -->
    <script>
        $.backstretch("../images/screen.jpg");
    </script>
    <script src="js/local_js.js"></script>
</body>  
</html>