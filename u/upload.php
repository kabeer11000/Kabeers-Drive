<?php
session_start();
set_time_limit(0);
ini_set('upload_max_filesize', '9000000M');
ini_set('post_max_size', '9000000M');
ini_set('max_input_time', 90000);
//ini_set('max_execution_time', 90000);
ini_set('max_execution_time', 300);
if(!isset($_GET['iF'])){
    header("Location:u.php");
}
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: login.php");
  }
  if(!isset($_GET['iF'])){
      //header("Location:u.php");
  }
if(isset($_POST['submit'])){
// $Version = $_POST['version'];
// $name = $_POST['name'];
    // Count total files
    $countfiles = count($_FILES['file']['name']);
    //$compression = $_POST['comp'];
    
        
    // Looping all files
    for($i=0;$i<$countfiles;$i++){

        $filename = $_FILES['file']['name'][$i];
        $ext = end((explode(".", $filename))); # extra () to prevent notice
        if(!empty($ext)){
        $filename1 = 'user-files/' . $_SESSION['id'] . '/' . $filename;

if (file_exists($filename1)) {
    $filename = uniqid().$filename;
    $filename = str_replace(' ', '', $filename);
    $filename = str_replace("'", '', $filename);
    $filename = str_replace("?", '', $filename);
    $filename = str_replace("&", '', $filename);
    $filename = str_replace("=", '', $filename);
    $filename = str_replace("#", '', $filename);
    $filename = str_replace("+", '', $filename);
       $filename = str_replace("_", '', $filename);
       $filename = str_replace("-", '', $filename);
       $filename = str_replace("-", '', $filename);
       $filename = substr($filename,0,24);
    
    
    
       //$filename = str_replace("_", '', $filename);
       //$filename = str_replace("-", '', $filename);
       //$filename = str_replace("-", '', $filename);
    //$filename = preg_replace("/[^a-zA-Z]+/", "", $filename);

       move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/' . $_SESSION['id'] . '/' . $filename);
       echo '<a target="_blank" href="0/'.$_SESSION['id'].'/'.$filename.'">0/'.$_SESSION['id'].'/'.$filename.'</a><br>';
       header("Location:index.php");

} else {
       $filename = str_replace(' ', '', $filename);
       $filename = str_replace("'", '', $filename);
       $filename = str_replace("_", '', $filename);
       $filename = str_replace("-", '', $filename);
       $filename = str_replace("-", '', $filename);
    $filename = str_replace("?", '', $filename);
    $filename = str_replace("&", '', $filename);
    $filename = str_replace("=", '', $filename);
    $filename = str_replace("#", '', $filename);
    $filename = str_replace("+", '', $filename);
    $filename = substr($filename,0,24);
       //$filename = str_replace("_", '', $filename);
       //$filename = str_replace("-", '', $filename);
       //$filename = str_replace("-", '', $filename);
       //$filename = preg_replace("/[^a-zA-Z]+/", "", $filename);
       move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/' . $_SESSION['id'] . '/' . $filename);
       echo '<a target="_blank" href="0/'.$_SESSION['id'].'/'.$filename.'">0/'.$_SESSION['id'].'/'.$filename.'</a><br>';
       header("Location:index.php");

}
}
    
    
    }
// connect and login to FTP server

}
echo '
<title>Upload | Kabeer\'s Drive</title>
<link rel="stylesheet" type="text/css" href="materialDesign.css">
<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">
  <!--<p class="p" style="width: 50%;height: auto;margin-top: 70%">Kabeers Drive</p>
  <img src="ic_launcher.png" style="width: 50%;height: auto;margin-top: 70%">-->
</div>
  <script>
  
function preload_remover()
{
        $("#preloader").hide();

}
</script>
<div class="main" style="z-index:3">

<div class="bmd-layout-canvas fixed-top"><div class="bmd-layout-container fixed-top bmd-drawer-f-l bmd-drawer-overlay">
  <header class="bmd-layout-header" >
    <div id="navbar-search-flood" class="main_search_nav_wrapper navbar-search-flood navbar navbar-light bg-faded" style="background-color:#D6D7D9;box-shadow:none">
      <a data-toggle="drawer" data-target="#dw-p1" aria-expanded="false">
        <img src="0/hamburger_icon.png" style="width:1.0em;height:auto;opacity:60%">
      </a>
      
      <ul class="nav navbar-nav mr-auto ml-2 text-center">
        <li data-toggle="drawer" data-target="#dw-p1" aria-expanded="false" class="navbar-brand text-dark ">My  Drive</li>

      </ul>
      <button onclick="goBack()" class="mdc-icon-button text-dark material-icons mdc-top-app-bar__action-item--unbounded" aria-label="Download">arrow_back</button>

        <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onclick="window.location.reload();" aria-label="Download">refresh</button></div>
  </header >
  <div id="dw-p1" class="bmd-layout-drawer bg-faded" aria-expanded="false" aria-hidden="true">
    <header style="background-color:#E6E6E6">
      <a class="navbar-brand"><img src="0/account_icon.png" style="margin-top:-3px;margin-right:0.25em; width:1.5em;height:auto;opacity:60%;">'.$_SESSION['username'].'</a>
    </header>
    <ul class="mdc-list list-group">
      <a class="list-group-item" href="index.php"><i style="color:#9E9E9E" class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>Home</a>
      <a class="list-group-item" href="upload.php"><i style="color:#9E9E9E"  class="material-icons mdc-list-item__graphic" aria-hidden="true">backup</i>Upload</a>
      <a class="list-group-item" href="text-editor.php"><i style="color:#9E9E9E"  class="material-icons mdc-list-item__graphic" aria-hidden="true">code</i>Text Editor</a>
      <a class="list-group-item" href="download.php"><i style="color:#9E9E9E"  class="material-icons mdc-list-item__graphic" aria-hidden="true">get_app</i>Download URL</a>
      <hr>
      <a class="list-group-item" href="0/settings.php" ><i style="color:#9E9E9E"  class="material-icons mdc-list-item__graphic" aria-hidden="true">settings</i>Settings</a>

    </ul>

  </div>
';
?>

<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="propeller" content="c72573a9f5512275f39f5a345c667d7e">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script type="text/javascript">
        var qs = (function(a) {
            if (a == "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i)
            {
                var p=a[i].split('=', 2);
                if (p.length == 1)
                    b[p[0]] = "";
                else
                    b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(window.location.search.substr(1).split('&'));
        $(document).ready(function () {
            $('#exampleModal').modal("show");
            /*            if($("#textArea").length){
                            alert("The element you're testing is present.");
                        }*/
            $("#exampleModal").on('hidden.bs.modal', function(){
                //alert("FUCK");
                window.location.href= "files.php";

            });

        })

    </script>
</head>
<body onload="preload_remover()">
  <!--<div class="sidenav">
    <a href="user-files/files.php">Files</a>
    <a href="index.php" class="nav-link">Home</a>
    <a href="upload.php" class="nav-link"><img src="images/upload_icon.png" style="width: 1.5em;height: auto;background-color: #e9ecef;border-radius: 40px"></a>

</div>-->
<div class="container" style="margin-top:1em">
    <div class="row">
        <div class="col-md-12">
            <form method='post' action='' enctype='multipart/form-data'>
                <div class="custom-file mb-3" style="height: 60vh; background-color: #F5F5F5;box-shadow: 0px 2px 2px #A8A8A8; border-radius:5px;color: #181818">
                    <input type="file" style="height: 60vh; " class="custom-file-input" placeholder="" required name="file[]" id="file" multiple>
                    <label class="custom-file-label"  for="validatedCustomFile"><div class="container text-center"><div class="row"><div class="col-md-12">
                                    <img src="images/upload_icon.png" style="margin-top:5em;width:10vh;%;height:auto"><hr><p>Drop files here! or Tap to Select Files</p>
                                </div></div></div></label>
                </div>
                <!--
                    <div class="checkbox">
                        <label>
                        <input name="comp" type="checkbox"> Compress Big Image
                        </label>
                    </div>
                -->
                <input type='submit' class="btn text-light bg-primary w-100" name='submit' value='Upload'>
            </form>
        </div>
    </div>
</div>
<style>
    body {
        font-family: "Lato", sans-serif;

    }
    .container{
        margin-top: 5em;
    }
</style>
<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>