<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#eee,#eee);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">
  
<div class="spinner-border text-secondary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
  <script>
  
$(document).ready(function () {
  // body...

    $('#preloader').fadeOut(1000);
    
});</script>
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
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php" style="margin-left:0!important;margin-right:0!important;width:100%!important;">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn btn-outline-dark" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
        </div></div></div>
</body>
</html>
