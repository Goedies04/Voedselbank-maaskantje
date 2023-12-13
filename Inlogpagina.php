<?php 
    
    $username = "root";
    $password = "";
    $database = "voedselbankmaaskantje";
    
    // Create connection
    $conn = new mysqli($username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Connected successfully";
    
    // Now you can perform database operations using $conn
    
    // Remember to close the connection when done
    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlogpagina</title>
</head>
<body>
    <?php 
    
    ?>
</body>
</html>

