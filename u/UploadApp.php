<?php

function LOGIN($username, $password , $id){
  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);
  $id = mysqli_real_escape_string($db, $id);

  if (count($errors) == 0) {
   $passwordSession = $password;$password = md5($password);$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  //

        $find_id_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $id_query_result = mysqli_query($db, $query);
        $id_query_result = mysqli_fetch_assoc($id_query_result);

        if (empty($id_query_result['uniqueId'])) {array_push($errors, "Id Not Found");}
        if (empty($id_query_result['plus'])) {$_SESSION['plus']='0';}
       
      //$_SESSION['username'] = $username;
  	  //$_SESSION['success'] = "You are now logged in";
      //$_SESSION['id'] = $id_query_result['uniqueId'];
  	  //$_SESSION['plus'] = $id_query_result['plus'];
      //header('location: index.php?id='.$id_query_result['uniqueId']);
      //$_SESSION['password'] = $passwordSession;
  $file_path = "0/".$id;
     
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
    } else{
        echo "fail";
    }    
      header("location: index.php");
      exit;
      //echo '<script>window.history.back();</script>'
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }

} 
if(isset($_GET['username'])&&isset($_GET['password'])&&isset($_GET['id'])){
    LOGIN($_GET['username'],$_GET['password'],$_GET['id']);
}else{
    echo'NO ID PASSWORD OR USERNAME';
}
?>