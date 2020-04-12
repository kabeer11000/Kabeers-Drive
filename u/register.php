
<?php include('server.php');
session_start();
if (isset($_SESSION['username'])) {
    //$_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign Up to Kabeer's Drive free unlimited storage</title>

    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
    <style type="text/css">*{margin: 0;padding: 0;box-sizing: border-box;}</style>
<!-- Default form login -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="text-center border border-light p-5" action="register.php" method="post">

    <p class="h4 mb-2"><img style="width: 2em;height: auto;" src="kslogo.png"></p>
    <p class="h4 mb-2">Sign Up</p>
<p class="small text-muted mb-4 pb-4">Continue to Kabeer's Drive</p>
    <p class="small text-danger" style="color: red"><?php include('errors.php'); ?></p>
    
    <button type="button" class="btn btn-secondary float-right" onmousedown="ShowPassword()" onmouseleave="HidePassword()"><img src="https://cdn3.iconfinder.com/data/icons/glypho-design/64/eye-512.png" style="width:1em;height:auto;"></button>
    <!-- Email -->
    <input type="text" id="defaultLoginFormEmail" name="username" value="<?php echo $username; ?>" class="username form-control mb-4" placeholder="Username">

    <input type="email" id="defaultLoginFormEmail" name="email" value="<?php echo $email; ?>" class="form-control mb-4" placeholder="Email">

<!-- Password -->
    <input type="password" id="defaultLoginFormPassword" name="password_1" class="password P1  form-control mb-4" placeholder="Password">

<!-- Password -->
    <input type="password" id="defaultLoginFormPassword" name="password_2"class="form-control P2 mb-4" placeholder="Confirm Password">

<script>
function HidePassword(){
    $('.P1').attr("type","password");
    $('.P2').attr("type","password");
}
function ShowPassword() {
    $('.P1').attr("type","text");
    $('.P2').attr("type","text");
}
</script>
<div class="form-group float-left text-left">
    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
    <label for="agree-term" class="label-agree-term"><a href="http://drive.hosted-kabeersnetwork.unaux.com/terms.html" class="term-service">End User Agreement</a></label>
</div>
    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4 signup_btn" type="submit" name="reg_user">Sign up</button>

    <!-- Register -->
    <p>Already a member?<br>
        <a href="login.php">Sign in</a>
    </p>

</form>
  
   <!--<hr><a href="fastlogin.php" class="w-100 bg-primary text-light btn mx-1">Fast Login</a>
   --></div>
   </div>
</div>