<?php
session_start();

$_SESSION['confirmation'] = bin2hex(random_bytes(16));
$token = $_SESSION['confirmation'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>CSRF Form</title>
</head>
<body>
  <h1>CSRF Protected Form</h1>
  <form method="post" action="csfr_action.php">
    <label for="username">Username:</label><br>
    <input type="text" name="username" placeholder="Enter Username">
    <br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="Enter password">
    <br>
    <input type="hidden" name="confirmation" value="<?=$token?>">
    <input type="submit" name="btnSubmit" value="Submit">
  </form>
</body>
</html>
