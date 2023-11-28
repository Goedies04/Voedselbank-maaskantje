<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelcss.css">
    <title>Document</title>
</head>
<body>

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
    echo "Connected successfully";

    // Fetch user data
    $query = "SELECT bsn, Voornaam,Tussenvoegsel, Achternaam,Geboortendatum,Telefoonnummer, Email FROM User";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Create a dropdown list
        echo '<form action="#" method="post">';
        echo '<label for="userDropdown">Select a user:</label>';
        echo '<select name="userDropdown" id="userDropdown">';

        // Loop through the result set and generate options
        while ($row = $result->fetch_assoc()) {
            $bsn = $row["bsn"];
            $fullName = $row["Voornaam"] . ' ' . $row["Achternaam"];
            echo "<option value=\"$bsn\">$fullName</option>";
        }

        echo '</select>';
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    } else {
        echo "No users found";
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>
