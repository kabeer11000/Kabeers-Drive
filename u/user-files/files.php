<?php
session_start();
$id = $_SESSION['id'];


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
echo '
<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
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
function makeDir($name=''){
    if ( !file_exists($_SESSION['id'].'/'.$name) && !is_dir($_SESSION['id'].'/'.$name) ) {
    mkdir($_SESSION['id'].'/'.$name);       
echo '<script>window.location.href="files.php";</script>';
} /*
    mkdir($_SESSION['id'].'/'.$name);
    */
}
if (isset($_GET['makeDir'])){
    makeDir($_GET['makeDir']);
}
function removeDirectory($path) {
	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	rmdir($path);
echo '<script>window.location.href="files.php";</script>';
}
function deleteDir($url = ''){
removeDirectory($url);/*
$url = '/'.$url.'/';
if(rmdir($url)) 
{ 
echo '<script>window.location.href="files.php";</script>';
//  echo ("$dirname successfully removed"); 
} 
else
{ 
 echo ($url . "couldn't be removed");  
} */
/*$path = $url;
if(!rmdir($path)) {
  echo ("Could not remove $path");
}
echo '<script>window.location.href="files.php";</script>';
*/
}
if(isset($_GET['deleteAllD'])){
    removeDirectory($_SESSION['id']);
    mkdir($_SESSION['id']);
    echo '<script>window.location.href="files.php";</script>';
}
//if(isset($_GET['deleteDir'])){
  //  deleteDir($_GET['deleteDir']);
//}
//$it = new RecursiveTreeIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS));

//$dir = "user-files/".$_SESSION['id'];

/*$allFiles = scandir($dir); // Or any other directory
$files = array_diff($allFiles, array('.', '..'));
*/
//$files = array_slice(scandir($dir), 2);
// Sort in descending order
$b = scandir($_SESSION['id'].'/',1);
$path = $_SESSION['id'].'/';
$b = array_diff($b, array('.', '..'));
echo "<hr style='border-color: transparent'><hr style='border-color: transparent'>";
echo '<div class="container mt-4"><div class="row">';
foreach ($b as $b)
{
    $file = $path.$b;
$filesize = filesize($file); // bytes
$filesize = round($filesize / 1024 / 1024, 1); // megabytes with 1 digit

 $myfile = $file; 
  
// checking whether a file is directory or not 
if(isset($_GET['viewDir'])){
   header("viewDir.php?".$_SESSION['id'].$_GET['viewDir']); 
}
if (is_dir($myfile)){
     echo '

<div class="col-md-12 mt-2 mb-2 d-flex justify-content-center"><div class="card rounded border " style="border-radius: 10px; width: 100%;background-color:#FAFAFA;border-style:solid;border-color:#FAFAFA;border-width:1px"> <div class="card-body"><h5 class="card-title"><img src="https://cdn1.iconfinder.com/data/icons/modern-universal/32/icon-32-512.png" style="margin-top:-3px; width:1em;opacity:40%; height:auto"> <a href="viewDir.php?viewDir='.$path.$b.'/">'.$b.'</a></h5><small class="text-muted mr-1">'.$filesize.'mb </small>  <p class="card-text"><a class="card-link" href="?deleteDir='.$path.$b.'" style="margin-right: 1em;">Delete</a></p></div></div></div>';
}else
echo '

<div class="col-md-12 mt-2 mb-2 d-flex justify-content-center"><div class="card rounded border " style="border-radius: 10px; width: 100%;background-color:#FAFAFA;border-style:solid;border-color:#FAFAFA;border-width:1px"> <div class="card-body"> <h5 class="card-title"><a href="?file='.$path.$b.'">'.$b.'</a></h5><small class="text-muted mr-1">'.$filesize.'mb </small>  <p class="card-text"><a class="card-link" href="?delete='.$path.$b.'" style="margin-right: 1em;">Delete</a><a class="card-link"  target="_blank" href="'.$path.$b.'" style="margin-right: 1em;">Raw</a><a class="card-link"  download href="'.$path.$b.'" style="float:right;margin-right: 1em;">Download</a></p></div></div></div>';          
 
 
}
echo '</div></div></div>';
function delete($url=''){
    // Use unlink() function to delete a file

    $file_pointer = $url;
    if (!unlink($file_pointer)) {
        echo ($file_pointer." cannot be deleted due to an error");

        echo '<script>window.location.href="files.php";</script>';
    }
    else {
        echo ($file_pointer." has been deleted");
        echo '<script>window.location.href="files.php";</script>';
    }
}
function deleteAll()
{
    $file_pointer = '/'.$_SESSION['id'];
    if (!unlink($file_pointer)) {
        echo ($file_pointer." cannot be deleted due to an error");

        echo '<script>window.location.href="files.php";</script>';
    }
    else {
        echo ($file_pointer." has been deleted");
        mkdir($_SESSION['id'], 0777, true);

        echo '<script>window.location.href="files.php";</script>';
    }
}echo '<div class="main">
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
      <a class="nav-link" href="../index.php"><img src=".././images/back_icon.png" style="width: 1.5em;height: auto;background-color: #e9ecef;border-radius: 40px"></a>
    
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../index.php">Home</a>
   
      </li>
      
      <li class="nav-item">
    <a class="nav-link" href="../upload.php">Upload</a>
      </li>
      
      <li class="nav-item">
    <a class="nav-link" href="../text-editor.php">Text Editor</a>
      </li>
      
      <li class="nav-item">
    <a class="nav-link" href="../download.php">Url Download</a>
      </li>
      
      <li class="nav-item newFolderListItem" style="margin-top:0;padding-top:0">
      
    <div class="nav-link" style="margin-top:0;padding-top:0">
    <div class="form-inline ml-auto" style="margin-top:0;">
      <div class="md-form my-0">
        <input id="newFolder" style="font-size:15px; opacity:70%" class=" form-control" type="text" placeholder="Enter Folder Name" aria-label="Search">
      </div>
      <button id="newFolderBtn" onclick="makeDirJ()" style="font-size:15px; opacity:70%" class="btn btn-outline-white btn-md my-0 ml-sm-2">Enter</button>
    </div>
    <script>
    function makeDirJ(){
        var query = document.getElementById("newFolder").value;
        if(query != ""){
            window.location.href="?makeDir="+query;
        }
    }
    </script>
</div>
      </li>
      <li class="nav-item">
      <a href="?deleteAllD=true" class="nav-link">Delete All</a></li>
    </ul>
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
     <a class="nav-link" href="?logout=true">Log Out</a>
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
function runMyFunction($url='') {
    //echo 'I just ran a php function';

    $html = file_get_contents($url);
    if(mime_content_type($url)== "image/jpeg" || mime_content_type($url)== "image/png" || mime_content_type($url)== "image/gif" || mime_content_type($url)== "image/svg")
    {
echo '
    <div class="main">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$url.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="'.$url.'" style="width:100%;height:auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>';

    }if(mime_content_type($url)== "video/mov" || mime_content_type($url)== "video/wmv" || mime_content_type($url)== "video/mp4")
    {
        echo '
    <div class="main">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$url.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <video style="height:auto;width:100%" controls>
  <source src="'.$url.'" type="'.mime_content_type($url).'">
Your browser does not support the video tag.
</video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>';
    }if(mime_content_type($url)== "application/pdf")
    {
        echo '
    <div class="main">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$url.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <object style="width:100%;height:100vh" type="application/pdf" data="'.$url.'?#zoom=85&scrollbar=0&toolbar=0&navpanes=0">
    <p>Insert your error message here, if the PDF cannot be displayed.</p>
</object><!--
      <iframe  style="width:100%;height:auto" src="http://docs.google.com/gview?url='.$url.'&embedded=true"></iframe><embed src="https://drive.google.com/viewerng/
viewer?embedded=true&url='.$url.'" style="width:100%;height:auto">-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>';
    }
    else{
        echo '

    <div class="main">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$url.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span class="bmd-form-group"><textarea readonly id="textArea" rows="10" style="border-radius:5px;width:100%;font-size: 15px" placeholder=" Nothing..." name="text"  value=""><pre>'.$html.'</pre></textarea></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>';
    }
    /*if (mime_content_type($url) === imagejpeg($url)){
        echo "fuck";
    }*/

}

if (isset($_GET['file'])) {
    runMyFunction($_GET['file']);
}

if (isset($_GET['done'])) {

    file_put_contents($path.$_GET['file'],$_GET['done']);
    if (isset($_GET['file'])) {

        file_put_contents($path.$_GET['file'],$_GET['done']);
    }
}
function done($url)
{
    if (isset($_GET['text']))
    {

        $b = scandir($_SESSION['id'].'/',1);
        $path = $_SESSION['id'].'/';
        file_put_contents($path.$url, $_GET['text']);
    }
}

if (isset($_GET['delete'])) {
    delete($_GET['delete']);
}

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
    <link rel="shortcut icon" type="image/png" href="../favicon.png"/>
<link rel="shortcut icon" type="image/png" href="../ic_launcher.png"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap_matrial_design.css">
    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="../propper.js"></script>
    <script type="text/javascript" src="../bootstrap_matrial_design.js"></script>
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