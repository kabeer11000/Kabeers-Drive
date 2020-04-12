<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<?php
session_start();

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: login.php");
  }
  
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
<div id="preloader" class="px-0 mx-0" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;margin-top:0!important;padding-top:0!important;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">

<div role="progressbar" style="z-index:999999" class="progress-bar mdc-linear-progress mdc-linear-progress--indeterminate"><div class="mdc-linear-progress__buffering-dots"></div><div class="mdc-linear-progress__buffer"></div><div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar"><span class="mdc-linear-progress__bar-inner"></span></div><div class="mdc-linear-progress__bar mdc-linear-progress__secondary-bar"><span class="mdc-linear-progress__bar-inner"></span></div></div>  <!--<p class="p" style="width: 50%;height: auto;margin-top: 70%">Kabeers Drive</p>
  <img src="ic_launcher.png" style="width: 50%;height: auto;margin-top: 70%">-->
</div>
  <script>
  /*
$(document).ready(function () {
  
    $("#preloader").fadeOut(1000);
    
});*/
function preload_remover()
{
        $("#preloader").hide();

}
</script>
<title>Text Editor | Kabeer\'s Drive</title>
<body onload="preload_remover()">
<meta name="propeller" content="c72573a9f5512275f39f5a345c667d7e">
<link rel="stylesheet" type="text/css" href="materialDesign.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
<!--<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">
  <!--<p class="p" style="width: 50%;height: auto;margin-top: 70%">Kabeers Drive</p>
  <img src="ic_launcher.png" style="width: 50%;height: auto;margin-top: 70%">-->
</div>
  <script>
  
function preload_remover()
{
        $("#preloader").hide();

}
</script>
--><div class="main" style="z-index:3">

<div class="bmd-layout-canvas fixed-top"><div class="bmd-layout-container fixed-top bmd-drawer-f-l bmd-drawer-overlay">
  
  <header class="bmd-layout-header">
    <div id="navbar-search-flood" class="main_search_nav_wrapper navbar-search-flood navbar navbar-light bg-faded" style="background-color:#D6D7D9;box-shadow:none">
      <a data-toggle="drawer" data-target="#dw-p1" aria-expanded="false">
        <i class="material-icons">menu</i>
      <div class="ripple-container"></div></a>
      
      <ul class="nav navbar-nav mr-auto ml-2 text-left" style="width:35%">
        <li data-toggle="drawer" data-target="#dw-p1" aria-expanded="false" class="navbar-brand text-dark ">'.substr($_GET['dirName'], strpos($_GET['dirName'], "/") + 1).'</li>

      </ul>      
      <button onclick="goBack()" class="mdc-icon-button text-dark material-icons mdc-top-app-bar__action-item--unbounded" aria-label="Download">arrow_back</button>
      <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onclick="window.location.reload();" aria-label="Download">refresh</button>
         </div>
  </header>

  <div id="dw-p1" class="bmd-layout-drawer bg-faded" aria-expanded="false" aria-hidden="true">
    <header style="background-color:#E6E6E6">
      <a class="navbar-brand"><img src="0/account_icon.png" style="margin-top:-3px;margin-right:0.25em; width:1.5em;height:auto;opacity:60%;">'.$_SESSION['username'].'</a>
    </header>
    <ul class="list-group">
    <a class="list-group-item" href="0/viewDir.php?viewDir='.$_GET['dirName'].'"><i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>Home</a>

    <a class="list-group-item" href="upload-remote.php?dirName='.$_GET['dirName'].'"><i class="material-icons mdc-list-item__graphic" aria-hidden="true">backup</i>Upload</a>
    <hr>
    <a class="list-group-item" href="0/settings.php"><i class="material-icons mdc-list-item__graphic" aria-hidden="true">settings</i>Settings</a>
   
      </ul>

  </div>
';
  
if (isset($_POST['submit'])){
$unId = uniqid();

$filename = str_replace(' ', '', $_POST['name']);
$filename = str_replace("'", '', $filename);
$myfile = fopen("user-files/".$_GET['dirName'].$filename, "w") or die("Unable to open file!");
$txt = $_POST['text'];
fwrite($myfile, $txt);
fclose($myfile);
echo '<script>window.location.href="0/viewDir.php?viewDir='.$_GET['dirName'].'";</script>';
//header("Location:0/files.php");
echo'
<style>*{margin:0;padding:0;box-sizing:border-box}</style>
<!--<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">
  <!--<p class="p" style="width: 50%;height: auto;margin-top: 70%">Kabeers Drive</p>
  <img src="ic_launcher.png" style="width: 50%;height: auto;margin-top: 70%">-->
</div>
  <script>
  /*
$(document).ready(function () {
  
    $("#preloader").fadeOut(1000);
    
});*/
function preload_remover()
{
        $("#preloader").hide();

}
</script>-->';
 }?>
 <div onload="preload_remover()">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, ">
<!--Bootstrap Core Scripts-->


    <link rel="manifest" href="https://raw.githubusercontent.com/kabeer11000/message/master/drive.hosted-kabeersnetwork.unaux.com-manifest.json
">
<script src="serviceworker.js"></script>
<div style="margin-top:2em;"></div>
 <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
--><style>.nav-item{font-family: 'Open Sans Condensed', sans-serif;}
textarea{
    background: url(http://i.imgur.com/2cOaJ.png);
background-attachment: local;
background-repeat: no-repeat;
padding-left: 35px;
padding-top: 10px;
    border-color:#ccc;
}

</style>
<div class="container" style="margin-top:-1.5em;" onload="preload_remover()">
    <div class="row">
        <div class="col-md-12">
            
<div class="input-group" style="width:100%">
  <div style="width:100%" class="input-group-prepend">
<form action="" method="post" style="width:100%">
<span class="input-group-text"><FileName:></FileName:></span><br> 
<input type="text" name="name"  placeholder="Example.txt" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"><br>
<span class="input-group-text">Enter Text:</span><br>
<textarea rows="10"style="border-radius:5px;width:100%;" value="<?php echo $_POST['text']; ?>" placeholder="//write your code here..."  name="text"></textarea>
<br><br>
<input style="float:right" class="btn bg-primary text-light w-100" id="upload" type="submit" name="submit" value="Upload"></form>
  </div>
</div>

        </div>
    </div>
</div>
