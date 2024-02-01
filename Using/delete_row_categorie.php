<?php
include_once "Databaseconnectie.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();
// verbind met de database

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $row_id = $_POST['row_id'];

    $sql = "DELETE FROM categorie WHERE idcategorie = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $row_id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Row deleted successfully";
    } else {
        $response['success'] = false;
        $response['message'] = "Error deleting row: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

header('location: categorie_toevoegen.php');
?>
