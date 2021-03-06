<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
}
$userModel = new UserModel();
if (!empty($_POST['username']) && !empty($_POST['password']) && $userModel->checkUser($_POST['username'], $_POST['password'])) {
    $_SESSION['userId'] = $userModel->getUserId($_POST['username']);
    $_SESSION['username'] = $_POST['username'];
    header('location: http://localhost:81/do_an_be1/home/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .panel-info {
            border-color: transparent;
        }

        .panel-info>.panel-heading {
            border-color: transparent;
            background-color: transparent;
        }

        body {
            background-image: url("/<?php echo BASE_URL ?>/public/img/b2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            text-align: center;
        }

        .mainbox .panel {
            background: rgba(0, 0, 0, 0.5);
        }

        label {
            color: #fff;
        }

        .form-group .control a {
            color: #5cb85c;
        }

        .form-group .control a:hover {
            color: #5cb85c;
        }

        #loginbox .panel {
            border: none;
        }

        #loginbox .panel .panel-heading {
            background: none;
            border: none;
            color: #428bca;
        }

        #loginbox .panel .panel-heading a {
            color: #5cb85c;
        }

        #signupbox .panel {
            border: none;
        }

        #signupbox .panel .panel-heading {
            background: none;
            border: none;
            color: #428bca;
        }

        #signupbox .panel .panel-heading a {
            color: #5cb85c;
        }

        #btn-signup {
            margin-top: 20px;
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }

        #btn-signup:hover {
            color: #fff;
            background-color: #47a447;
            border-color: #398439;
        }
    </style>
</head>

<body>
    <!-- container -->
    <div class="container">
        <!-- login -->
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">SIGN IN</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body">
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form action="index.php" method="POST" id="loginform" class="form-horizontal" role="form">
                        <label style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" placeholder="username or email">
                        </label>

                        <label style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                        </label>

                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-login" class="btn btn-success" type="submit">Login </button>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%; color: #fff">
                                    Don't have an account!
                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- sign up -->
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">SIGN UP</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                </div>
                <div class="panel-body">
                    <form id="signupform" class="form-horizontal" role="form" action="./" method="POST">
                        <!-- style="display:none" -->
                        <div id="signupalert" style="display: none;" class="alert alert-danger">
                            <span></span>
                        </div>

                        <div class="form-group">
                            <label for="username-signup" class="col-md-3 control-label">Username</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="username-signup" id="username-signup" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passwd-signup" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="passwd-signup" id="passwd-signup" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passwd-confirm" class="col-md-3 control-label">Confirm</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="passwd-confirm-signup" id="passwd-confirm" placeholder="Confirm">
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12">
                                <button id="btn-signup" type="submit" class="btn btn-info">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="../public/js/login.js"></script>
    <?php
    if (isset($_POST['signup']) && $_POST['signup'] == 'Sign up') {
        echo '<script>$("#loginbox").hide(); $("#signupbox").show()</script>';
    }
    ?>
</body>

</html>