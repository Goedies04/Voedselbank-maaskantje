<?php
include_once "Databaseconnectie.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();
// verbind met de database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bsn = $_POST["bsn"];
    $voornaam = $_POST["voornaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $achternaam = $_POST["achternaam"];
    $geboortedatum = $_POST["geboortedatum"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $email = $_POST["email"];


    $insertQuery = "INSERT INTO User (bsn, Voornaam, Tussenvoegsel, Achternaam, Geboortendatum, Telefoonnummer, Email)
                    VALUES ('$bsn', '$voornaam', '$tussenvoegsel', '$achternaam', '$geboortedatum', '$telefoonnummer', '$email')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}
$conn->close();
?>
