
<?php include('server.php');
session_start();
if (isset($_SESSION['username'])) {
    //$_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
 ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login to Kabeer's Drive free unlimited storage</title>

    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
    <style type="text/css">*{margin: 0;padding: 0;box-sizing: border-box;}</style>
<!-- Default form login -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="text-center border border-light p-5" action="login.php" method="post">

    <p class="h4 mb-2"><img style="width: 2em;height: auto;" src="kslogo.png"></p>
    <p class="h4 mb-2">Sign in</p>
<p class="small text-muted mb-4 pb-4">Continue to Kabeer's Drive</p>
    <p class="small text-danger" style="color: red"><?php include('errors.php'); ?></p>
    <!-- Email -->
    <input type="text" id="defaultLoginFormEmail" name="username" class="form-control mb-4" placeholder="Username">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4 P1" placeholder="Password">

    <button type="button" class="btn btn-secondary float-right" onmousedown="ShowPassword()" onmouseleave="HidePassword()"><img src="https://cdn3.iconfinder.com/data/icons/glypho-design/64/eye-512.png" style="width:1em;height:auto;">Show Password</button>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit" name="login_user">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="register.php">Register</a>
    </p>

</form>

<script>
function HidePassword(){
    $('.P1').attr("type","password");
    //$('.P2').attr("type","password");
}
function ShowPassword() {
    $('.P1').attr("type","text");
    //$('.P2').attr("type","text");
}
</script>
  </div>

   <!--<hr><a href="fastlogin.php" class="w-100 bg-primary text-light btn mx-1">Fast Login</a>
   -->
   </div>
     </div>
</div><!--
<script>
$(document).ready(function(){
    var data = JSON.parse(localStorage.getItem("login"));
    console.log(data);
    for (var i = 0; i < data.length; i++){
        console.log(data[i]);
        document.getElementById("result").innerHTML += data[i].username+' | '+data[i].password; 
        
    }
});
</script>-->