<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('sql302.unaux.com', 'unaux_25335858', 'vmidgc7', 'unaux_25335858_drive');

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
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($uniqueId)) { array_push($errors, "Somthing went wrong"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
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
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, uniqueId) 
  			  VALUES('$username', '$email', '$password', '$uniqueId')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['id'] = $uniqueId;
    if (!file_exists('user-files/'.$_SESSION['id'])) {
        mkdir('user-files/'.$_SESSION['id'], 0777, true);
    }

      //header('location: index.php?id='.$uniqueId);
    header('location: index.php');
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
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  //

        $find_id_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $id_query_result = mysqli_query($db, $query);
        $id_query_result = mysqli_fetch_assoc($id_query_result);

        if (empty($id_query_result['uniqueId'])) {array_push($errors, "Id Not Found");}
        //
      $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['id'] = $id_query_result['uniqueId'];
  	  //header('location: index.php?id='.$id_query_result['uniqueId']);
      header("location: index.php");
      exit;
      //echo '<script>window.history.back();</script>'
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>