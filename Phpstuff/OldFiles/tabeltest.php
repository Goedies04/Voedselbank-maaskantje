<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../tabelcss.css">
    <title>Document</title>
</head>
<body>

    <?php
    include_once "Databaseconnectie.php";
    $classDatabase = new Database();
    $conn = $classDatabase->connect();

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
            $fullName =  $row["bsn"]. '  ' . $row["Voornaam"] . '  '. $row["Tussenvoegsel"].'  '  . $row["Achternaam"] .'  '.  $row["Geboortendatum"].'  '. $row["Telefoonnummer"]. '  '.$row["Email"] ;
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

<form action="add_user.php" method="post">
        <label for="bsn">BSN:</label>
        <input type="text" name="bsn" required><br>

        <label for="voornaam">Voornaam:</label>
        <input type="text" name="voornaam" required><br>

        <label for="tussenvoegsel">Tussenvoegsel:</label>
        <input type="text" name="tussenvoegsel"><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" required><br>

        <label for="geboortedatum">Geboortedatum:</label>
        <input type="date" name="geboortedatum" required><br>

        <label for="telefoonnummer">Telefoonnummer:</label>
        <input type="text" name="telefoonnummer" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Add User">
</form>
</body>
</html>
