<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-md-12">

            <div class="header" style="margin-left:0!important;margin-right:0!important;width:100%!important;">
                <h2>Login</h2>
            </div>

            <form method="post" action="login.php" style="margin-left:0!important;margin-right:0!important;width:100%!important;">
                <?php include('errors.php'); ?>
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" >
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn btn-secondary text-dark" name="login_user">Login</button>
                </div>
                <p>
                    Not yet a member? <a href="register.php">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</html>