<?php
session_start();
set_time_limit(0);
ini_set('upload_max_filesize', '9000000M');
ini_set('post_max_size', '9000000M');
ini_set('max_input_time', 90000);
//ini_set('max_execution_time', 90000);
ini_set('max_execution_time', 300);
if(isset($_GET['dirName'])){
    $dirName = $_GET['dirName'];
    $result = substr($_GET['dirName'], 0, 13);
    if ($result != $_SESSION['id']){
    header("Location:0/files.php?msg=Invalid%20Directory");
    }
}
else{
    header("Location:0/viewDir.php");
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
header("Location:folderUpload.php?dirName=".$_GET['dirName']);
echo '

<title>Upload '. str_replace("/","",substr($_GET['dirName'], strpos($_GET['dirName'], "/") + 1)).' | Kabeer\'s Drive</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="materialDesign.css">
<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">
  <!--<p class="p" style="width: 50%;height: auto;margin-top: 70%">Kabeers Drive</p>
  <img src="ic_launcher.png" style="width: 50%;height: auto;margin-top: 70%">-->
</div>
<script src="jquery.SLIDE.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Uploading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12 text-center d-flex justify-items-center justify-content-center"><img src="uploading_gif.gif" style="width:7em;height:auto"></div>
      </div>
    </div>
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
      <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" aria-label="Download">menu</button>
      </a>
      
      <ul class="nav navbar-nav mr-auto ml-2 text-center">
        <li data-toggle="drawer" data-target="#dw-p1" aria-expanded="false" class="navbar-brand text-dark ">'. str_replace("/","",substr($_GET['dirName'], strpos($_GET['dirName'], "/") + 1)).'</li>

      </ul>
      <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onclick="goBack();" aria-label="Download">arrow_back</button>
      <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onclick="window.location.reload();" aria-label="Download">refresh</button>
         </div>
  </header >
  <div id="dw-p1" class="bmd-layout-drawer bg-faded" aria-expanded="false" aria-hidden="true">
    <header style="background-color:#E6E6E6">
      <a class="navbar-brand"><img src="0/account_icon.png" style="margin-top:-3px;margin-right:0.25em; width:1.5em;height:auto;opacity:60%;">'.$_SESSION['username'].'</a>
    </header><ul class="mdc-list list-group">
      <a class="list-group-item" href="index.php"><i style="color:#9E9E9E" class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>Home</a>
      <a class="list-group-item" href="text-editor-remote.php?dirName='.$_GET['dirName'].'"><i style="color:#9E9E9E"  class="material-icons mdc-list-item__graphic" aria-hidden="true">code</i>Text Editor</a>
      <hr>
      <a class="list-group-item" href="0/settings.php" ><i style="color:#9E9E9E"  class="material-icons mdc-list-item__graphic" aria-hidden="true">settings</i>Settings</a>

    </ul>


  </div>';
if(isset($_POST['submit'])){
// $Version = $_POST['version'];
// $name = $_POST['name'];
    // Count total files
    $countfiles = count($_FILES['file']['name']);
// connect and login to FTP server

    // Looping all files
    for($i=0;$i<$countfiles;$i++){

        $filename = $_FILES['file']['name'][$i];

        $dirName = $_GET['dirName'];
/*       move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/' . $_SESSION['id'] . '/' . $filename);
       echo '<a target="_blank" href="user-files/'.$_SESSION['id'].'/'.$filename.'">user-files/'.$_SESSION['id'].'/'.$filename.'</a><br>';
       header("Location:user-files/files.php");
*/
        
    $filename = str_replace(' ', '', $filename);
       $filename = str_replace("'", '', $filename);
        move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/'.$_GET['dirName'].$filename);
       
    //   move_uploaded_file($filename, 'user-files/'.$dirName.$filename);
       //echo '<a target="_blank" href="user-files/'.$dirName.$filename.'">user-files/'.$dirName.$filename.'</a><br>';
       header("Location: 0/viewDir.php?viewDir=".$dirName);

    }
}
?>

<html>
<head>
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
<div class="container" style="margin-top:1em;">
    <div class="row">
        <div class="col-md-12">
            <form method='post' action='' enctype='multipart/form-data'  target="hidden-upload">
                <div class="custom-file mb-3" style="height: 60vh; background-color: #F5F5F5;box-shadow: 0px 2px 2px #A8A8A8; border-radius:5px;color: #181818">
                    <input type="file" style="height: 60vh; " class="custom-file-input" placeholder="" required name="file[]" id="file" multiple>
                    <label class="custom-file-label"  for="validatedCustomFile"><div class="container text-center"><div class="row"><div class="col-md-12">
                                    <img src="images/upload_icon.png" style="margin-top:5em;width:10vh;%;height:auto"><hr><p>Drop files here! or Tap to Select Files</p>
                                </div></div></div></label>
                </div>

                <input type='submit' class="btn bg-primary text-light w-100" name='submit' value='Upload'>
            </form>
        </div>
    </div>
</div>
<iframe style="display:none" id="i_frame" name="hidden-upload"></iframe>

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