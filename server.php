<?php
	session_start();
	$username = "";
	$email= "";
	$errors= array();

//connect to the database
$db = mysqli_connect('localhost' , 'root', '', 'hop');

//if the signup button is clicked
if(isset($_POST['signup'])){
   $username = ($_POST['username']);
   $email =($_POST['email']);
   $password_1 = ($_POST['password_1']);
   $password_2 = ($_POST['password_2']);

   //ensure that form fields are properly
   if(empty($username)) {
   	array_push($errors,"Username is required");
   }
   if(empty($email)){
   	array_push($errors,"Email is required");
   }
   if(empty($password_1)) {
   	array_push($errors,"Password is required");
   }
  
   if($password_1 !=$password_2) {
   	array_push($errors,"The tow passwords do not match");
   }
   // if there is no errors ,save user to database
   if(count($errors) == 0) {
   	$password = md5($password_1);
   	$sql = "INSERT INTO users (username , email, password)
   	        VALUES('$username', '$email','$password')";
   	    mysqli_query($db, $sql); 
   	    

   }
}
//log in user from log in page
if(isset($_POST['login'])){
   $username = ($_POST['username']);
   $password = ($_POST['password']);

   //ensure that form fields are properly
   if(empty($username)) {
   	array_push($errors,"Username is required");
   }
   if(empty($password)){
   	array_push($errors,"Password is required");
   } 

   if(count($errors) == 0) {
   	$password =md5($password);
   	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
   	$result = mysqli_query($db, $query);
   	if(mysqli_num_rows($result) == 1){
   		//log user in 
   		$_SESSION['username'] = $username;
   	    $_SESSION['success'] = "you are now logged in";
   	    header("location: profile.php");
   	}else{
   		array_push($errors, "wrong username/password combination");
   	}
   }
}


//logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}

 ?>
