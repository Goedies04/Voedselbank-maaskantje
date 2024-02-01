<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<div style="align-items: center">
    <form style="align-items: center" action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="Gebruikersnaam" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="Wachtwoord" required>
        <br>
        <input name="submit27" type="submit" value="login">
        </form>
</div>
</body>
</html>

<?php
// Connect to the database (replace these details with your own)
include_once "Databaseconnectie.php";

$classDatabase = new Database();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'voedselbankmaaskantje';
$conn = mysqli_connect($host, $username, $password, $database);
function myFunction()
{
    $alert = alert("I am an alert box!"); // this is the message in ""
}
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['Gebruikersnaam'];
    $password = $_POST['Wachtwoord'];


    // Query to check if the user exists
    $query = "SELECT * FROM login WHERE Gebruikersnaam='$username' AND Wachtwoord='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // User exists, redirect to a success page
        header("Location: Test.php");
    }

    if (isset($_POST['submit27'])) {
        // Invalid login,give an error message
        echo '<script>alert("Error: username or password not found")</script>';


    }
    exit();
}

// Close the database connection
mysqli_close($conn);
?>