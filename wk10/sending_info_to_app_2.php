<form method="get">
    <input name="q" placeholder="Enter Text">
    <br/>
    <input type="submit" value="Go">
</form>

<?php
if (isset($_GET['q'])) {
    echo htmlspecialchars($_GET['q']);
}
?>
