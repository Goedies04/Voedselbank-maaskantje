<?php

// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "voedselbankmaaskantje";

// Create a connection to the database
$mysqli = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Replace this with the actual user bsn you want to retrieve
$user_bsn = 123456789;

// Query to retrieve user and login information
$query = "SELECT User.*, Login.* FROM User
          JOIN Login ON User.bsn = Login.User_bsn
          WHERE User.bsn = $user_bsn";

$result = $mysqli->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the data
    $row = $result->fetch_assoc();

    // Output the user and login information
    echo "User Information:<br>";
    echo "BSN: " . ($row['bsn'] ?? 'N/A') . "<br>";
    echo "Voornaam: " . ($row['Voornaam'] ?? 'N/A') . "<br>";
    // ... other user fields

    echo "<br>Login Information:<br>";
    echo "MedewerkerId: " . ($row['MedewerkerId'] ?? 'N/A') . "<br>";
    echo "Gebruikersnaam: " . ($row['Gebruikersnaam'] ?? 'N/A') . "<br>";
    // ... other login fields

    // Close the result set
    $result->close();
} else {
    // Display an error message if the query fails
    echo "Error: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();

?>
