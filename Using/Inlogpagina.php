<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="    display: flex;flex-direction: column;align-items: center;">
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
include_once "Databaseconnectie.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();
// verbind met de database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['Gebruikersnaam'];
    $password = $_POST['Wachtwoord'];



    $query = "SELECT * FROM login WHERE Gebruikersnaam='$username' AND Wachtwoord='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        header("Location: dashboard.php");
    }

    if (isset($_POST['submit27'])) {

        echo '<script>alert("Error: username or password not found")</script>';


    }
    exit();
}

mysqli_close($conn);
?>

<a href="registratie.php">Registreren</a>