<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<?php
include_once "Databaseconnectie.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();
// verbind met de database

    if (isset($_POST['submit2017'])) {
    $stmt = $conn->prepare("INSERT INTO login (MedewerkerId, Gebruikersnaam, Wachtwoord, User_bsn) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['MedewerkerId'], $_POST['Gebruikersnaam'], $_POST['Wachtwoord'], $_POST['bsn']);

    try {
        $stmt->execute();
       echo '<div style="display: flex; justify-content: center;">';
       echo "New record created successfully";
       echo '</div>';
    } catch (Exception  $e) {
        echo '<div style="display: flex; justify-content: center;">';
        echo "Error: " . $e->getMessage();
        echo '</div>';
    }
    }
          
?>
<body>
<div    style="display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;">
<form action="AddUser.php" method="post"  >
<!-- deze formulier is om een user toe te voegen -->
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
    <br>
    <br>

    <form action="" method="post"  >
<!-- deze formulier is om een login toe te voegen -->
        <label for="MedewerkerId">MedewerkerId:</label>
        <input type="text" name="MedewerkerId" required><br>

        <label for="Gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" name="Gebruikersnaam" required><br>

        <label for="Wachtwoord">Wachtwoord:</label>
        <input type="text" name="Wachtwoord"><br>


        <label for="userDropdown">Select an existing bsn:</label>
        <select name="bsn" id="bsn">

            <?php
            $query = "SELECT DISTINCT bsn FROM user";
            $resultDropdown = $conn->query($query);

            if ($resultDropdown->num_rows > 0) {
                while ($rowDropdown = $resultDropdown->fetch_assoc()) {
                    $bsn = $rowDropdown["bsn"];
                    $showdata = $rowDropdown["bsn"];
                    echo "<option value=\"$bsn\">$showdata</option>";
                }
            }
            ?>
        </select>
        <input type="submit" name="submit2017"   value="Add Login">
</form>
    <a href="inlogpagina.php">Inloggen</a>
</div>
</body>
</html>
