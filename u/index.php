<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }else{
      
      $ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
$FULLADDRESS = 'Username: '.$_SESSION['username'].' | UserID: '.$_SESSION['id'].' | IP: '.$ip.'<br>';

file_put_contents("ip.php", $FULLADDRESS, FILE_APPEND);

      
      /*

echo '
<script type="text/javascript" src="jquery.min.js"></script>
<script>
$(document).ready(function(){
        
        var username = "'.$_SESSION["username"].'";
        console.log(username);
        var password = "'.$_SESSION["password"].'";
        console.log(password);
        var data = {"username": username, "password": password};
        
        var realData = JSON.parse(localStorage.getItem("login1"));
           
        realData.push(data);
        console.log(realData);
        localStorage.setItem("login1", JSON.stringify(realData)); 
        
        //window.location.href="0/files.php";        
});</script>';
 */   //unset($_SESSION['password']);

        	header("location: 0/files.php");

  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: login.php");
  }

if (!file_exists('user-files/'.$_SESSION['id'])) {
    mkdir('user-files/'.$_SESSION['id'], 0777, true);
}

//print_r($a);
//print_r($b);
?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

    <link rel="manifest" href="https://raw.githubusercontent.com/kabeer11000/message/master/drive.hosted-kabeersnetwork.unaux.com-manifest.json
">
<script src="serviceworker.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="header" style="margin-left:0!important;margin-right:0!important;width:100%!important;">
	<h2>Home Page</h2>
</div>
<div class="content" style="margin-left:0!important;margin-right:0!important;width:100%!important;">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3 class="p text-center" style="font-size: 20px;padding-left: 0 !important;margin-left: 0!important;">
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <hr>
        <div class="container" style="margin: 0!important;padding: 0!important;">
            <div class="row">
                <div class="col-md-6"><p><a href="user-files/files.php">Go to Control Panel</a></p></div>
                <div class="col-md-6"><p><a href="index.php?logout='1'" style="color: red;">logout</a> </p></div>
            </div>
        </div>
    <?php endif ?>
</div>
        </div></div></div>
</body>
</html>-->