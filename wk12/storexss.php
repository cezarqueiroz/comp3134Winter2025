<?php
// storexss.php

$content = file_get_contents("storedxss.txt"); // Read file

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stored XSS Demo</title>
</head>
<body>
  <h1>Stored XSS Example</h1>
  <div>
    <?= $content ?> <!-- UNSAFE: directly outputs script from file -->
  </div>
</body>
</html>
