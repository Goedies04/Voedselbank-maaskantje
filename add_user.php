<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "voedselbankmaaskantje";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bsn = $_POST["bsn"];
    $voornaam = $_POST["voornaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $achternaam = $_POST["achternaam"];
    $geboortedatum = $_POST["geboortedatum"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $email = $_POST["email"];

    // Insert user into the User table
    $insertQuery = "INSERT INTO User (bsn, Voornaam, Tussenvoegsel, Achternaam, Geboortendatum, Telefoonnummer, Email)
                    VALUES ('$bsn', '$voornaam', '$tussenvoegsel', '$achternaam', '$geboortedatum', '$telefoonnummer', '$email')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
