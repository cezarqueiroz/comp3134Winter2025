<?php
session_start();

$message = "";

if (isset($_POST['btnSubmit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $form_token = $_POST['confirmation'];
    $session_token = $_SESSION['confirmation'];

    if ($form_token !== $session_token) {
        $message = "<div style='height: 30px; background-color: red; color: white;'>CSRF validation failed!</div>";
    } else {
        if ($username === "host" && $password === "pass") {
            $message = "<div style='height: 30px; background-color: lightgreen; color: white;'>You have successfully logged in</div>";
        } else {
            $message = "<div style='height: 30px; background-color: rgba(255,0,0,0.5); color: white;'>Incorrect username and/or password</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>CSRF Action</title>
</head>
<body>
  <h1>CSRF Protected Action</h1>
  <?=$message;?>
</body>
</html>
