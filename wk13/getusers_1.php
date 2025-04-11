<?php
// Database connection details
$host = "localhost";         // or your actual host (e.g., DigitalOcean DB host)
$dbname = "my_schema";   // replace with your database name
$user = "cezar";     // replace with your DB user
$pass = "password";     // replace with your DB password

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$query = isset($_GET['firstname']) ? $_GET['firstname'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Users</title>
</head>
<body>
    <h2>Search Active Users by First Name</h2>
    <form method="GET" action="">
        <input type="text" name="firstname" placeholder="Enter first name" value="<?php echo htmlspecialchars($query); ?>">
        <button type="submit">Search</button>
    </form>

    <?php
    if ($query !== '') {
        // Raw SQL without sanitization (as per your request)
        $sql = "SELECT id, username, email, firstname, lastname, active 
                FROM users 
                WHERE firstname = '$query' AND active = 1";

        try {
            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() > 0) {
                echo "<h3>Results:</h3>";
                echo "<table border='1' cellpadding='5'>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Active</th>
                        </tr>";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['firstname']}</td>
                            <td>{$row['lastname']}</td>
                            <td>{$row['active']}</td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No active users found with that first name.</p>";
            }
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    // Optional: close connection (not required, but clean)
    $pdo = null;
    ?>
</body>
</html>
