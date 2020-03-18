<?php 
  session_start();
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

// Initialize a file URL to the variable
/*if(isset($_GET['url'])){
    
$url = $_GET['url']; 
} */
//$remote_url = 
$url = $_GET['url']; 
  
// Use basename() function to return the base name of file  
$file_name = uniqId().basename($url); 
//$file_name = preg_replace("/[^a-zA-Z]/", "", $file_name).".html";

//if(strpos($file_name,".html")||strpos($file_name,".txt")==false){   
// Use file_get_contents() function to get the file 
// from url and use file_put_contents() function to 
// save the file by using base name 

if(file_put_contents("user-files/".$_SESSION['id'].'/'. $file_name,file_get_contents($url))) { 
    //echo "File downloaded successfully<br>"."http://hosted-kabeersnetwork.unaux.com/Private/uploads/".$file_name;
    //echo '<script>window.location.href="user-files/files.php";<script>'; 
    header("Location:index.php");
} 
else { 
    echo "File downloading failed."; 
} 
//}
?> 