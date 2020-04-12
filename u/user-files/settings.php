
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

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

<link rel="stylesheet" type="text/css" href="materialDesign.css">

<style>*{margin:0;padding:0;box-sizing:border-box}body{margin:0;padding:0;box-sizing:border-box}</style>
<div id="preloader" style="position: fixed;display:block;z-index: 200002; width: 100%;height: 100%;background-image: linear-gradient(#F6F6F6,#F6F6F6);background-repeat: no-repeat;background-size: cover;" class="text-center">

<div role="progressbar" style="margin:0;padding:0; z-index:999999" class="mdc-linear-progress mdc-linear-progress--indeterminate"><div class="mdc-linear-progress__buffering-dots"></div><div class="mdc-linear-progress__buffer"></div><div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar"><span class="mdc-linear-progress__bar-inner"></span></div><div class="mdc-linear-progress__bar mdc-linear-progress__secondary-bar"><span class="mdc-linear-progress__bar-inner"></span></div></div>  <!--<p class="p" style="width: 50%;height: auto;margin-top: 70%">Kabeers Drive</p>
  <img src="ic_launcher.png" style="width: 50%;height: auto;margin-top: 70%">-->
</div>
  <script>
  /*
$(document).ready(function () {
  
    $("#preloader").fadeOut(1000);
    
});*/
function preload_remover()
{
        $("#preloader").fadeOut();

}
</script>
';
?>
<title>Settings Kabeer's Drive</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<style>
a{text-decoratin:none;}</style>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<body onload="preload_remover()">
<header class=" mdc-top-app-bar" style="background-color: #FAFAFA">
  <div class="mdc-top-app-bar__row">
    <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start" style="background-color: #D6D7D9;color: #2E2E2E;">
      <a class="mdc-icon-button material-icons" href="#" onclick="goBack()">arrow_back</a><span class="mdc-top-app-bar__title">Settings</span> </section>
  <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end"  style="background-color: #D6D7D9;color: #2E2E2E;">
      <button class="mdc-icon-button material-icons mdc-top-app-bar__action-item--unbounded" onClick="window.location.reload();"aria-label="Download">refresh</button>
    </section>
 </div>
  
<script>
function goBack() {
  window.history.back();
}
</script>
  </div>

</header>
  <div class="container">
  	<div class="row">
  		<div class="col-md-12" style="padding-top: 3.5em;padding-bottom: 0;margin-bottom: 0;position:static;">
  <div class="mdc-card__actions mdc-card__actions--full-bleed">
  <a class="mdc-button mdc-card__action mdc-card__action--button" href="https://www.who.int/news-room/q-a-detail/q-a-coronaviruses#:~:text=symptoms">
    <div class="mdc-button__ripple"></div>
    <span class="mdc-button__label">Get info About COVID(19)</span>
    <i class="material-icons mdc-button__icon" aria-hidden="true">arrow_forward</i>
  </a>
</div>
<div class="mdc-card mdc-card--outlined demo-card" style="width: 100%;margin-top: 0;padding-top: 0;padding-bottom: 0;margin-bottom: 1em">
  <div class="mdc-card__primary-action demo-card__primary-action" tabindex="0">
    <div class="demo-card__primary">
      <h2 class="demo-card__title mdc-typography mdc-typography--headline6" style="color: black">Delete All Files</h2>
      <h3 class="demo-card__subtitle mdc-typography mdc-typography--subtitle2">Delete's All your files. This action cannot be reverted!</h3>
    </div>
  </div>
  <div class="mdc-card__actions">
    <div class="mdc-card__action-buttons">
      <a class="text-primary mdc-button mdc-card__action mdc-card__action--button" href="files.php?deleteAllD=true">  <span class="mdc-button__ripple"></span> Delete</a>
      <a class="text-primary mdc-button mdc-card__action mdc-card__action--button">  <span class="mdc-button__ripple"></span> Learn More</a>
    </div>
  </div>
</div>
		
<div class="mdc-card mdc-card--outlined demo-card" style="width: 100%;margin-top: 0;padding-top: 0;margin-bottom:1em">
  <div class="mdc-card__primary-action demo-card__primary-action" tabindex="0">
    <div class="demo-card__primary">
      <h2 class="demo-card__title mdc-typography mdc-typography--headline6" style="color: black">Log Out</h2>
      <h3 class="demo-card__subtitle mdc-typography mdc-typography--subtitle2">Log out of Kabeer's Drive on this Device</h3>
    </div>
  </div>
  <div class="mdc-card__actions">
    <div class="mdc-card__action-buttons">
      <a class="text-primary mdc-button mdc-card__action mdc-card__action--button" href="files.php?logout=true">  <span class="mdc-button__ripple"></span> Logout</a>
    </div>
  </div>
</div>

<div class="mdc-card mdc-card--outlined demo-card" style="width: 100%;margin-top: 0;padding-top: 0;padding-bottom: 0;margin-bottom: 1em">
  <div class="mdc-card__primary-action demo-card__primary-action" tabindex="0">
    <div class="demo-card__primary">
      <h2 class="demo-card__title mdc-typography mdc-typography--headline6" style="color: black">Download your Files</h2>
      <h3 class="demo-card__subtitle mdc-typography mdc-typography--subtitle2">Download All your files. Stored on Kabeer's Drive</h3>
    </div>
  </div>
  <div class="mdc-card__actions">
    <div class="mdc-card__action-buttons">
      <a class="text-primary mdc-button mdc-card__action mdc-card__action--button" href="userFilesDownloader.php">  <span class="mdc-button__ripple"></span> Download</a>
      <a class="text-primary mdc-button mdc-card__action mdc-card__action--button">  <span class="mdc-button__ripple"></span> Learn More</a>
    </div>
  </div>
</div>
  		</div>
</div>
</body>