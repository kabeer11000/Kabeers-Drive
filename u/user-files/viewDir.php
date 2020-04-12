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

function Encrypt($str=''){
$cipher = "AES-128-CTR"; 
// Get the cipher iv length
$iv_length = openssl_cipher_iv_length($cipher); 
$options = 0;  

$iv = '8565825542115032'; 
// Store the decryption key 
$enc_key = "CodeSpeedyKeybj54HH";
// Encrypt the data using openssl_encrypt function 

$str = str_replace("/","SLASH",$str);
$str = str_replace(" ","SPACE",$str);
$str = str_replace("+","PLUS",$str);
//echo $str;
$encrypted_string = openssl_encrypt($str, $cipher, $enc_key, $options, $iv);
return $encrypted_string;
}
echo '
<link rel="stylesheet" type="text/css" href="materialDesign.css">
<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="container-fluid text-center">

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
        $("#preloader").fadeOut("fast");

}
</script>

<div class="bmd-layout-canvas fixed-top"><div class="bmd-layout-container fixed-top bmd-drawer-f-l bmd-drawer-overlay">
  <header class="bmd-layout-header" >
    <div id="navbar-search-flood" class="main_search_nav_wrapper navbar-search-flood navbar navbar-light bg-faded" style="background-color:#D6D7D9;box-shadow:none">
      <a data-toggle="drawer" data-target="#dw-p1" aria-expanded="false">
        <i class="material-icons">menu</i>
      </a>
      
      <ul class="nav navbar-nav mr-auto ml-2 text-left" style="width:35%">
        <li data-toggle="drawer" data-target="#dw-p1" aria-expanded="false" class="navbar-brand text-dark ">'.substr($_GET['viewDir'], strpos($_GET['viewDir'], "/") + 1).'</li>

      </ul>      
      <button onclick="goBack()" class="mdc-icon-button text-dark material-icons mdc-top-app-bar__action-item--unbounded" aria-label="Download" >arrow_back</button>
      <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onclick="window.location.reload();" aria-label="Download" >refresh</button>
      <button class="mdc-icon-button material-icons search_icon_button mdc-top-app-bar__action-item--unbounded" aria-label="Download" >search</button>
      
         </div>
  </header >
  <div id="dw-p1" class="bmd-layout-drawer bg-faded" aria-expanded="false" aria-hidden="true">
    <header style="background-color:#E6E6E6">
      <a class="navbar-brand"><img src="account_icon.png" style="margin-top:-3px;margin-right:0.25em; width:1.5em;height:auto;opacity:80%;">'.$_SESSION['username'].'</a>
    </header>
    <ul class="list-group">
      <a class="list-group-item" href="../index.php" ><i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>Home</a>
      <a class="list-group-item" href="../upload-remote.php?dirName='.$_GET['viewDir'].'"><i class="material-icons mdc-list-item__graphic" aria-hidden="true">backup</i> Upload</a>
  <a class="list-group-item" href="../text-editor-remote.php?dirName='.$_GET['viewDir'].'"><i class="material-icons mdc-list-item__graphic" aria-hidden="true">code</i> Text Editor</a>
        <hr>
       <a class="list-group-item" href="settings.php" ><i class="material-icons mdc-list-item__graphic" aria-hidden="true">settings</i>Settings</a>
     
      <div class="a list-group-item fixed-bottom TotalFilesCount"></div>
    </ul>
  </div>
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
if(empty($b)){echo '<main class="bmd-layout-content" style="opacity:50%;background-color:#FAFAFA"><div style="background-color:#FAFAFA" class="text-center container mt-4 mb-4"><div class="row"><div class="col-md-12"><img src="https://cdn1.iconfinder.com/data/icons/basic-42/614/Empty_Box_Box_dropbox_empty_package_package-512.png" style="width:100%;height:auto;background-color:#FAFAFA;"><div class="display-4"><b>No Files Here!</b></div><br><small>Upload a file</small></div></div></div></main>';}
$count = 0;
$random_number_array = range(0, 10);
shuffle($random_number_array );
$random_number_array = array_slice($random_number_array ,0,3);

$adsRandom = $random_number_array;

//if(is_dir($viewDir)){}
echo '<main class="bmd-layout-content"><div class="container mt-4 mb-4"><div class="row">';
foreach ($b as $b)
{
$file = $path.$b;
$filesize = filesize($file); // bytes
$filesize = round($filesize / 1024 / 1024, 1); // megabytes with 1 digit
$myfile = $file; 
$count = $count+1;
if(isset($_GET['viewDir'])){
   //header("viewDir.php?".$_SESSION['id'].$_GET['viewDir']);
   $dirname = $_SESSION['id'].$_GET['viewDir']; 
}

echo '<div class="col-md-6 mt-0 mb-0 d-flex justify-content-center">
<div class="mdc-card mdc-card--outlined demo-card" style="width: 100%;margin-top: 0.75em;padding-top: 0;padding-bottom: 0;margin-bottom: 0">
 
 <a href="files.php?file='.$path.$b.'" style="text-decoration:none">    <div class="mdc-card__primary-action demo-card__primary-action" tabindex="0">
<div class="demo-card__primary">
      <h2 class="demo-card__title mdc-typography mdc-typography--headline6">'.$b.'</h2>
      <h3 class="demo-card__subtitle mdc-typography mdc-typography--subtitle2"><small class="text-muted mr-1">'.$filesize.'mb </small></h3>
    
    </div>
  </div>
  </a>
  <div class="mdc-card__actions" style="background-color:#F2F2F2">
    <div class="mdc-card__action-buttons">
      <a class="text-primary mdc-button mdc-card__action " data-toggle="tooltip" data-placement="bottom" title="Delete This File" href="files.php?delete='.$path.$b.'" ><span class="mdc-button__ripple"></span> Delete</a>
      
      <a class="text-primary mdc-button mdc-card__action " data-toggle="tooltip" data-placement="bottom" title="View This File Raw" target="_blank" href="'.$path.$b.'?i='.uniqId().'"><span class="mdc-button__ripple"></span> Raw</a>


      <a class="text-primary mdc-button mdc-card__action " data-toggle="tooltip" data-placement="bottom" title="View This File Raw" target="_blank" href="'.$path.$b.'" download><span class="mdc-button__ripple"></span> Download</a>
      

<div class="float-right px-0 mx-0">      <div class="dropdown">
  <button class="btn w-1  px-0 mx-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="https://cdn1.iconfinder.com/data/icons/jumpicon-basic-ui-glyph-1/32/-_Dot-More-Vertical-Menu-512.png" style="width:1em;height:auto">
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" target="_blank" href="http://drive.hosted-kabeersnetwork.unaux.com/view.php?id='.Encrypt($path.$b).'&i='.uniqId().'">Share</a>
    </div>
</div>
</div>
    </div>

  </div>
</div></div>';     
if(in_array($count, $adsRandom)&& $_SESSION['plus'] != 1){

     echo '<div class="col-md-6 '.$count.' mt-0 mb-0 d-flex justify-content-center">
<div class="mdc-card mdc-card--outlined demo-card" style="width: 100%;margin-top: 0.75em;padding-top: 0;padding-bottom: 0;margin-bottom: 0">

<div class="mdc-card__primary-action demo-card__primary-action" tabindex="0">
<div class="demo-card__primary">
<iframe data-aa="1352640" src="//acceptable.a-ads.com/1352640" scrolling="no" style="border:0px; padding:0; width:100%; height:3.9em; overflow:hidden" allowtransparency="true"></iframe>
</div>
  </div>
  <div class="mdc-card__actions" style="background-color:#8ACDC7;color:white">
    <div class="mdc-card__action-buttons">
      <a class="text-muted mdc-button mdc-card__action "><span class="mdc-button__ripple"></span> Ad By Kabeer\'s Network</a>

      <button onclick="hideAd(\''.$count.'\')" class="text-muted mdc-button mdc-card__action "><span class="mdc-button__ripple"></span> Hide Ad</button>

    </div>

  </div>
</div></div>
';}

}
echo '</div></div></div></main>';




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
<script>
    $(document).ready(function(){
    $(".search_icon_button").click(function(){
        $('.main_search_nav_wrapper').html('<div class="container"><div class="row"><div class="col-md-12"><div class="input-group mb-1"><div class="input-group-prepend" style="margin-left:-2em;"><button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onclick="window.location.reload();" aria-label="Download">arrow_back</button><input id="myInput" type="search" class="pl-2 form-control display-4" aria-label="Default" aria-describedby="inputGroup-sizing-default" style="width:80vw;color:#212529" placeholder="Enter File Name"></div></div></div></div>');
    
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".bmd-layout-canvas .bmd-layout-content .demo-card__title").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    });

  $('.Search_Back_Button').click(function(){
      location.reload();
  })
    });
    });
</script>
   

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>

.round {
  border-radius: 50%;
}

.fab {
  -webkit-transition: all 300ms ease-in-out;
  transition: all 300ms ease-in-out;
  width: 56px;
  height: 56px;
  background-color: #0F9C8F;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-pack: center;
          justify-content: center;
  position: absolute;
  right: 12.5px;
  bottom: 15px;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  //cursor: pointer;
  color: #FFF;
  font-size: 2em;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.16), 0px 3px 10px rgba(0, 0, 0, 0.16);
}

.fab i {
  -webkit-transition: all 300ms ease-in-out;
  transition: all 300ms ease-in-out;
  will-change: transform;
}

.inner-fabs .fab {
  width: 40px;
  height: 40px;
  right: 20px;
  bottom: 23px;
  font-size: 1.5em;
  z-index:9999;
  will-change: bottom;
}

.inner-fabs.show .fab:nth-child(1) {
  bottom: 80px;
}

.inner-fabs.show .fab:nth-child(2) {
  bottom: 130px;
}

.inner-fabs.show .fab:nth-child(3) {
  bottom: 180px;
}

.inner-fabs.show .fab:nth-child(4) {
  bottom: 230px;
}

.inner-fabs.show .fab:nth-child(5) {
  bottom: 280px;
}

.inner-fabs.show .fab:nth-child(6) {
  bottom: 330px;
}

.inner-fabs.show + .fab i {
  -webkit-transform: rotate(135deg);
          transform: rotate(135deg);
}

.fab:before {
  content: attr(data-tooltip);
  -webkit-transition: opacity 150ms cubic-bezier(0.4, 0, 1, 1);
  transition: opacity 150ms cubic-bezier(0.4, 0, 1, 1);
  position: absolute;
  visibility: hidden;
  opacity: 0;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
  color: #ececec;
  right: 50px;
  top: 25%;
  background-color: rgba(70, 70, 70, 0.9);
  font-size: 0.5em;
  line-height: 1em;
  display: inline-block;
  text-align: center;
  white-space: nowrap;
  border-radius: 2px;
  padding: 6px 8px;
  max-width: 200px;
  font-weight: bold;
  text-overflow: ellipsis;
  vertical-align: middle;
}

.inner-fabs.show .fab:hover:before {
  content: attr(data-tooltip);
  visibility: visible;
  opacity: 1;
}
</style>

<div class="inner-fabs">
  <div class="fab round" id="fab4" data-tooltip="Create"><a href="../text-editor-remote.php?dirName=<?php echo $_GET['viewDir']; ?>" style="color:#FFF"><i class="material-icons">code</i></a></div>
  <div class="fab round" id="fab3" data-tooltip="Move to inbox"><i class="material-icons"><a style="color:#FFF" href="../upload-remote.php?dirName=<?php echo $_GET['viewDir']; ?>">backup</i></a></div>
  <!--<div class="fab round" id="fab2" data-tooltip="Send"><i class="material-icons">send</i></div>-->
</div>
<div style="z-index:99999" class="fab round" id="fab1"><i class="material-icons" id="fabIcon">add</i></div>
<script>
let fab1 = document.getElementById('fab1');
let innerFabs = document.getElementsByClassName('inner-fabs')[0];

fab1.addEventListener('click', function () {
  innerFabs.classList.toggle('show');
});

document.addEventListener('click', function (e) {
  switch (e.target.id) {
    case "fab1":
    case "fab2":
    case "fab3":
    case "fab4":
    case "fabIcon":
      break;
    default:
      innerFabs.classList.remove('show');
      break;}

});
var TotalFiles = $(".mdc-card").length;
$('.TotalFilesCount').html('<i class="material-icons mdc-list-item__graphic" aria-hidden="true">list</i> Total Files: '+TotalFiles);
function hideAd(Aclass = ""){
    $('.'+Aclass).addClass("hide");
}
</script>
<style>
.hide{
    //transition: display 0s 2s, opacity 2s linear;
    display:none!important;
}/*
.hiden {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s 2s, opacity 2s linear;
}*/
</style>

</body>
</html>