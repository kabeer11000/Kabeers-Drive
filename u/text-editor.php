<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script><?php
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

  echo '<nav style="z-index: 3" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Welcome <span class="text-muted">'.$_SESSION['username'].'</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto"><!--
      <li class="nav-item active">
        <a class="nav-link" href="?deleteAll=true">Delete all</a>
      </li>-->
      <li class="nav-item">
       <a class="nav-link" href="index.php">Home</a>
   
      </li>
      
      <li class="nav-item">
       <a class="nav-link" href="user-files/files.php">Files</a>
   
      </li>
      <li class="nav-item">
    <a class="nav-link" href="upload.php">Upload</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
     <a class="nav-link" href="?logout=true">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
';
if (isset($_POST['submit'])){
    $unId = uniqid();
$myfile = fopen("user-files/".$_SESSION['id'].'/'.$_POST['name'], "w") or die("Unable to open file!");
$txt = $_POST['text'];
fwrite($myfile, $txt);
fclose($myfile);
header("Location:user-files/files.php");
echo'
<style>*{margin:0;padding:0;box-sizing:border-box}</style>
<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">
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
</script>';
echo'

<script>
    $(document).ready(function(){
        $("#myModal").modal("show");
    });
</script>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">File Uploaded</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
                <p>Your File has been uploaded <a target="_blank" href="'.$url_return.'" class="btn btn-info" >View</a></p>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
            
        </div>
    </div>
</div>';
 
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
<div class="container">
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
<input style="float:right" class="btn btn-outline-secondary" id="upload" type="submit" name="submit" value="Upload"></form>
  </div>
</div>

    <li>Add type of extention you want</li>
        </div>
    </div>
</div>

<nav aria-label="breadcrumb mt-0">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#">User Files</a></li>
    <li class="breadcrumb-item">Manager</li>
    
    <li class="breadcrumb-item active" aria-current="page">Text Editor</li>
  </ol>
</nav>