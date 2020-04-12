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
       //$filename = substr($filename,0,24);
    
    
    
       //$filename = str_replace("_", '', $filename);
       //$filename = str_replace("-", '', $filename);
       //$filename = str_replace("-", '', $filename);
    //$filename = preg_replace("/[^a-zA-Z]+/", "", $filename);

       move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/' . $_SESSION['id'] . '/' . $filename);
       echo '<a target="_blank" href="0/'.$_SESSION['id'].'/'.$filename.'">0/'.$_SESSION['id'].'/'.$filename.'</a><br>';
       echo'<script>window.top.location.href = "?msg=Upload Complete"; </script>';

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
    //$filename = substr($filename,0,24);
       //$filename = str_replace("_", '', $filename);
       //$filename = str_replace("-", '', $filename);
       //$filename = str_replace("-", '', $filename);
       //$filename = preg_replace("/[^a-zA-Z]+/", "", $filename);
       move_uploaded_file($_FILES['file']['tmp_name'][$i], 'user-files/' . $_SESSION['id'] . '/' . $filename);
       echo '<a target="_blank" href="0/'.$_SESSION['id'].'/'.$filename.'">0/'.$_SESSION['id'].'/'.$filename.'</a><br>';
        echo'<script>window.top.location.href = "u.php?msg=Upload Complete"; </script>';
}
}
}
// connect and login to FTP server

}
?>
