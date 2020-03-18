<?php
session_start();
set_time_limit(0);
ini_set('upload_max_filesize', '9000000M');
ini_set('post_max_size', '9000000M');
ini_set('max_input_time', 90000);
//ini_set('max_execution_time', 90000);
ini_set('max_execution_time', 300);
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
if(isset($_POST['submit'])){
// $Version = $_POST['version'];
// $name = $_POST['name'];
    // Count total files
    $countfiles = count($_FILES['file']['name']);
// connect and login to FTP server

    // Looping all files
    for($i=0;$i<$countfiles;$i++){

        $filename = uniqid().$_FILES['file']['name'][$i];

 
$zip = new ZipArchive();
$zip->open('user-files/'.$_SESSION['id'].$filename.'.zip', ZipArchive::CREATE);
  
$zip->addFile($filename, $filename);
$zip->close();


//       move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/' . $_SESSION['id'] . '/' . $filename);
       echo '<a target="_blank" href="user-files/'.$_SESSION['id'].'/'.$filename.'.zip">user-files/'.$_SESSION['id'].'/'.$filename.'.zip</a><br>';
       header("Location:user-files/files.php");

    }
}
?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
<body>
<div class="main">
    <nav style="z-index: 3" class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Upload Files</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="user-files/files.php" class="nav-link">Files</a>
                </li>
                <li class="nav-item">
                    <a href="upload.php" class="nav-link">Upload</a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>

                </li>
                
                <li class="nav-item">
                    <a href="text-editor.php" class="nav-link">Text Editor</a>
                </li>
            </ul>
             <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="?logout=true" class="nav-link">Log Out</a>
                </li>
             </ul>
        </div>
    </nav></div>
<!--<div class="sidenav">
    <a href="user-files/files.php">Files</a>
    <a href="index.php" class="nav-link">Home</a>
    <a href="upload.php" class="nav-link"><img src="images/upload_icon.png" style="width: 1.5em;height: auto;background-color: #e9ecef;border-radius: 40px"></a>

</div>-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method='post' action='' enctype='multipart/form-data'>
                <div class="custom-file mb-3" style="height: 60vh; background-color: #F5F5F5;box-shadow: 0px 2px 2px #A8A8A8; border-radius:5px;color: #181818">
                    <input type="file" style="height: 60vh; " class="custom-file-input" placeholder="" required name="file[]" id="file" multiple>
                    <label class="custom-file-label"  for="validatedCustomFile"><div class="container text-center"><div class="row"><div class="col-md-12">
                                    <img src="images/upload_icon.png" style="margin-top:5em;width:10vh;%;height:auto"><hr><p>Drop files here!</p>
                                </div></div></div></label>
                </div>

                <input type='submit' class="btn btn-outline-secondary float-right" name='submit' value='Upload'>
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

<nav aria-label="breadcrumb mt-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">User Files</a></li>
        <li class="breadcrumb-item"><a href="user-files/files.php">Manager</a></li>
        <li class="breadcrumb-item active"aria-current="page">Upload</li>
    </ol>
</nav>
</body>
</html>