<?php
session_start();
set_time_limit(0);
if(isset($_POST['submit'])){
// $Version = $_POST['version'];
// $name = $_POST['name'];
    // Count total files
    $countfiles = count($_FILES['file']['name']);

    // Looping all files
    for($i=0;$i<$countfiles;$i++){

        $filename = uniqid().$_FILES['file']['name'][$i];

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'][$i],'user-files/'.$_SESSION['id'].'/'.$filename);
        echo '<a target="_blank" href="user-files/'.$_SESSION['id'].'/'.$filename.'">user-files/'.$_SESSION['id'].'/'.$filename.'</a><br>';

    }
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>Drag and Drop File Uploading</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap_matrial_design.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="propper.js"></script>
    <script type="text/javascript" src="bootstrap_matrial_design.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
</head>
<body>
<div class="file-upload-wrapper">
    <input type="file" id="input-file-now" class="file-upload" />
</div>
<script>
    $('.file-upload').file_upload();
</script></html>