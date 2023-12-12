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
    $MedewerkId = $_POST["MederwerkerId"];
    $Gebruikersnaam= $_POST["Gebruikersnaam"];
    $Wachtwoord = $_POST["Wachtwoord"];
    $User_bsn = $_POST["User_bsn"];


    // Insert user into the User table
    $insertQuery = "INSERT INTO Gezinsopstelling (idGezinsopstelling, Volwassen, Kinderen, Baby's, User_bsn)
                    VALUES ('$idGezinsopstelling', '$Volwassen', '$Kinderen','$Baby's,  '$User_bsn')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
