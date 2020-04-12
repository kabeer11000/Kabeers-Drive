<?php
session_start();

  /*if (isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }*/
?>
    <title>Kabeer's Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="materialDesign.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="ic_launcher.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    

    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script>
$(document).ready(function(){
    var data = JSON.parse(localStorage.getItem("login1"));
    console.log(data);
    for(var i = 0; i < data.length; i++){
        console.log(data[i].password);
        $('.main').append('<div class="col-md-6"><input name="username" value="'+data[i].username+'" class="w-0"><input name="password" value="'+data[i].password+'" class="w-0"><div class="mdc-card demo-card demo-ui-control" style="width: 100%;margin-top: 0.5em;padding-top: 0;margin-bottom:0"><div class="mdc-card__primary-action demo-card__primary-action" tabindex="0"> <div class="demo-card__primary"><h2 class="demo-card__title mdc-typography mdc-typography--headline6" style="color: black">'+data[i].username+'</h2> </div> </div> <div class="mdc-card__actions"> <div class="mdc-card__action-buttons"> <input type="submit" name="login_user" class="text-primary mdc-button mdc-card__action mdc-card__action--button" value="Login"> </div> </div></div></div>');
}
});</script>
<div class="container mt-3 text-center"><div class="row"><div class="col-md-12 d-flex justify-content-center"><div class="display-4" style="font-size:30px; opacity:60%">Choose an Account</div></div><div class="col-md-12 d-flex justify-content-center">
<br><small class="text-muted">Continue to Kabeer's Drive</small></div>
<div class="col-md-12 d-flex justify-content-center mt-4">
<a href="register.php" class="btn bg-primary text-light w-100 text-center">Add Account</a></div>
</div></div>
 <style>*{margin:0;padding:0;box-sizing:border-box;}.w-0{width:0!important;display:none}</style>
<form action="login.php" method="post"><div class="container mt-4"><div class="row main">

</div></div></form>