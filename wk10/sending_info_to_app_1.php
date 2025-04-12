<form method="get">
    <input name="q" placeholder="Enter Text">
    <br/>
    <input type="submit" value="Go">
</form>

<?php
// Output the content of the 'q' parameter without any filtering
if (isset($_GET['q'])) {
    echo $_GET['q'];
}
?>
