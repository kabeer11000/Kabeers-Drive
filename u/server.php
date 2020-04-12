<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
//$db = mysqli_connect('sql302.unaux.com', 'unaux_25335858', 'vmidgc7', 'unaux_25335858_drive');
$db = mysqli_connect('remotemysql.com', 'XjfZNQPlxP', 'H2jQT9NOKp', 'XjfZNQPlxP', '3306');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $id = uniqid();
  //
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  //
  $uniqueId = mysqli_real_escape_string($db, $id);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (strlen($username) > 10){ array_push($errors, "Username is too long!"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($uniqueId)) { array_push($errors, "Somthing went wrong"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (!isset($_POST['agree-term'])) { array_push($errors, "Please Agree to Our Terms & Condition"); }
  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $_SESSION['password'] = $password_1;
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, uniqueId) 
  			  VALUES('$username', '$email', '$password', '$uniqueId')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['id'] = $uniqueId;
    $_SESSION['plus']='0';
    if (!file_exists('user-files/'.$_SESSION['id'])) {
        mkdir('user-files/'.$_SESSION['id'], 0777, true);
    }
    echo ' <script>Android.SaveId("'.$_SESSION['id'].'","'.$_SESSION['username'].'","'.$password_1.'")</script>';
    //$_SESSION['email'] = $email;
      //header('location: index.php?id='.$uniqueId);
    //header('location: emailSender.php');
   
    header("Location:index.php");
  }
}

// ... 
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $passwordSession = $password;
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  //

        $find_id_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $id_query_result = mysqli_query($db, $query);
        $id_query_result = mysqli_fetch_assoc($id_query_result);

        if (empty($id_query_result['uniqueId'])) {array_push($errors, "Id Not Found");}
         if (empty($id_query_result['plus'])) {$_SESSION['plus']='0';}
       
        //
      $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['id'] = $id_query_result['uniqueId'];
  	  $_SESSION['plus'] = $id_query_result['plus'];
        //header('location: index.php?id='.$id_query_result['uniqueId']);
      //$_SESSION['password'] = $passwordSession;
      
    echo ' <script>Android.SaveId("'.$_SESSION['id'].'","'.$_SESSION['username'].'","'.$password_1.'")</script>';
      header("location: index.php");
      exit;
      //echo '<script>window.history.back();</script>'
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if(isset($_POST['coupon'])){
$coupons = ["KDrive500","IHadSexWithUrMomLN"];

    if(in_array($_POST['coupon'],$coupons)){
    $query = "UPDATE users SET plus = 1 WHERE uniqueId  = '".$_SESSION['id']."' AND username = '".$_SESSION['username']."';";
  	$id_query_result = mysqli_query($db, $query);
    $id_query_result = mysqli_fetch_assoc($id_query_result);
    $_SESSION['plus'] = '1';
    header("Location:Ads.php?msg=Ads Have Been Removed For This Account");
    }
}

?>