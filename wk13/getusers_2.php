<?php
$host = "localhost";
$dbname = "my_schema";      
$user = "cezar";        
$pass = "password";   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$results = [];

if (isset($_GET['firstname'])) {
    $query = $_GET['firstname'];

    $sql = "SELECT id, username, email, firstname, lastname, active 
            FROM users 
            WHERE firstname = :firstname AND active = 1";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':firstname', $query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get Users (Safe)</title>
</head>
<body>
    <h2>Search for Active Users by First Name</h2>
    <form method="get" action="">
        <input type="text" name="firstname" placeholder="Enter first name" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($results)) : ?>
        <h3>Results:</h3>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Active</th>
            </tr>
            <?php foreach ($results as $row) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['firstname']) ?></td>
                    <td><?= htmlspecialchars($row['lastname']) ?></td>
                    <td><?= htmlspecialchars($row['active']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($_GET['firstname'])) : ?>
        <p>No active users found with that first name.</p>
    <?php endif; ?>
</body>
</html>
