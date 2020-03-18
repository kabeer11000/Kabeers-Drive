<?php
session_start();
$id = $_SESSION['id'];
if(!isset($_GET['viewDir'])){
   header("Location: files.php");
   exit; 
}

$viewDir = $_GET['viewDir'];

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
if (isset($_GET['logout'])) {
 	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: ../login.php");
}
echo '<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
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
</script>
';
//$it = new RecursiveTreeIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS));

//$dir = "user-files/".$_SESSION['id'];

/*$allFiles = scandir($dir); // Or any other directory
$files = array_diff($allFiles, array('.', '..'));
*/
//$files = array_slice(scandir($dir), 2);
// Sort in descending order
$b = scandir($viewDir,1);
$path = $viewDir;
$b = array_diff($b, array('.', '..'));
echo "<hr style='border-color: transparent'><hr style='border-color: transparent'>";
echo '<div class="container mt-4"><div class="row">';
foreach ($b as $b)
{
$file = $path.$b;
$filesize = filesize($file); // bytes
$filesize = round($filesize / 1024 / 1024, 1); // megabytes with 1 digit
$myfile = $file; 
  
if(isset($_GET['viewDir'])){
   //header("viewDir.php?".$_SESSION['id'].$_GET['viewDir']);
   $dirname = $_SESSION['id'].$_GET['viewDir']; 
}
echo '

<div class="col-md-12 mt-2 mb-2 d-flex justify-content-center"><div class="card rounded border " style="border-radius: 10px; width: 100%;background-color:#FAFAFA;border-style:solid;border-color:#FAFAFA;border-width:1px"> <div class="card-body"> <h5 class="card-title"><a href="http://drive.hosted-kabeersnetwork.unaux.com/u/user-files/files.php?file='.$path.$b.'">'.$b.'</a></h5><small class="text-muted mr-1">'.$filesize.'mb </small>  <p class="card-text"><a class="card-link" href="http://drive.hosted-kabeersnetwork.unaux.com/u/user-files/files.php?delete='.$path.$b.'" style="margin-right: 1em;">Delete</a><a class="card-link"  target="_blank" href="'.$path.$b.'" style="margin-right: 1em;">Raw</a><a class="card-link"  download href="'.$path.$b.'" style="float:right;margin-right: 1em;">Download</a></p></div></div></div>';          
 
}
echo '</div></div></div>';

echo '<div class="main">
<nav style="z-index: 3" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
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
      <a class="nav-link" href="files.php"><img src=".././images/back_icon.png" style="width: 1.5em;height: auto;background-color: #e9ecef;border-radius: 40px"></a>
    
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../index.php">Home</a>
   
      </li>
      
      <li class="nav-item">
    <a class="nav-link" href="../upload-remote.php?dirName='.$viewDir.'">Upload</a>
      </li>
      <!--
      <li class="nav-item">
    <a class="nav-link" href="../text-editor-remote.php">Text Editor</a>
      </li>
      -->
    </ul>
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
     <a class="nav-link" href="&logout=true">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

</div>

<nav aria-label="breadcrumb mt-0">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#">User Files</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manager</li>
  </ol>
</nav>';





/*
 * $files = glob($_SESSION['id'].'/');
foreach ($files as $a){
    //echo '<h1>'.$a.'</h1>';
    //$first = substr($a, strpos($a, '/') + 1 );
    echo  '<div class="main"><h3><a href="?file='.$a.'">'.$a.'</a></h3>'; // home
}

 */
?>

<html>
<head>
    <!-- Required meta tags -->
    

    <link rel="manifest" href="https://raw.githubusercontent.com/kabeer11000/message/master/drive.hosted-kabeersnetwork.unaux.com-manifest.json
">

<script src="serviceworker.js"></script>
    <meta charset="utf-8">
    <title>Kabeer's Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
<link rel="shortcut icon" type="image/png" href="ic_launcher.png"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap_matrial_design.css">
    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="../propper.js"></script>
    <script type="text/javascript" src="../bootstrap_matrial_design.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script>
function goBack() {
  window.history.back();
}
</script>
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
                window.location.href= "viewDir.php";

            });

        })

    </script>
</head>
<body onload="preload_remover()">

<style>
    body {
        font-family: "Lato", sans-serif;
    }
    .main{
        margin-left: 1em;
        /*margin-top: 5em;*/
        background-color: #E6E6E6
    }
    p{
        background-color: #E6E6E6
    }

</style><!--
'<div class="col-md-6 mt-2 mb-2 d-flex justify-content-center"><div class="card rounded border " style="width: 16rem;background-color:#FAFAFA;border-style:solid;border-color:#FAFAFA;border-width:1px"> <div class="card-body"> <h5 class="card-title"><a href="?file='.$path.$b.'">'.$b.'</a></h5> <p class="card-text"><a class="card-link" href="?delete='.$path.$b.'" style="margin-right: 1em;">Delete</a><a class="card-link"  target="_blank" href="'.$path.$b.'" style="margin-right: 1em;">Raw</a><a class="card-link"  download href="'.$path.$b.'" style="float:right;margin-right: 1em;">Download</a></p></div></div></div>';
-->

</body>
</html>