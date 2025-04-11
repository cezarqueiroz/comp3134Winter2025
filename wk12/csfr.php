<?php

$message = "";

if(isset($_POST['btnSubmit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username === "host" && $password === "pass"){
		$message = "<div style='height: 30px; background-color: lightgreen; color: white'> You have successfully logged in</div>";
	}
	else{
		$message = "<div style='height: 30px; background-color: rgba(255,0,0,0.5); color: white'>Incorrect username and/or password</div>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Hello, world!</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
</head>
<body>
  <h1>CSFR Example</h1>
 <?=$message;?> 
 <form method='post'>
    <label for="username">Username:</label><br>
    <input type="text" name="username" placeholder='Enter Username'>
    <br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder='Enter password'>
    <br>
    <input type="submit" name="btnSubmit" value="Submit">
  </form>
</body>
</html>
