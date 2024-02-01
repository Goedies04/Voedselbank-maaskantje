<!--deze PHP file is de dashboard waar je alle info er in kan zetten en laten zien-->
<?php
include_once "donaldDuck.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();


$stmt = $conn->prepare("INSERT INTO rollen (idRollen, Rollen) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['idRollen'], $_POST['Rollen']);

try {
    $stmt->execute();
    echo "New record created successfully";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

echo '<form action="" method="post">';
echo '    <label>idRollen:</label>';
echo '    <input type="text" name="idRollen"><br><br>';
echo '    <label>Rollen:</label>';
echo '    <input type="text" name="Rollen"><br><br>';

$query = "SELECT DISTINCT Rollen FROM rollen";
$resultDropdown = $conn->query($query);

if ($resultDropdown->num_rows > 0) {
    echo '<label for="RollenDropdown">Select an existing Rollen:</label>';
    echo '<select name="Rollen" id="RollenDropdown">';

    while ($rowDropdown = $resultDropdown->fetch_assoc()) {
        $value = $rowDropdown["Rollen"];
        echo "<option value=\"$value\">$value</option>";
    }

    echo '</select>';
    echo '<input type="submit" name="submit" value="Submit">';
    echo '</form>';
}
if (isset($_POST['submit'])) {
    $search = isset($_POST['search']) ? "%" . $_POST['search'] . "%" : null;
    if ($search !== null) {
        $search = "%" . $_POST['search'] . "%";
        $stmt = $conn->prepare("SELECT idLeveranciers, Bedrijfnaam, Email, Telefoonnummer FROM leveranciers WHERE idLeveranciers LIKE ? OR Bedrijfnaam LIKE ? OR Email LIKE ? OR Telefoonnummer LIKE ?");
        $stmt->bind_param("ssss", $search, $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output the search results in a table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>idLeveranciers</th>';
        echo '<th>Bedrijfnaam</th>';
        echo '<th>Email</th>';
        echo '<th>Telefoonnummer</th>';

        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['idLeveranciers'] . '</td>';
            echo '<td>' . $row['Bedrijfnaam'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';
            echo '<td>' . $row['Telefoonnummer'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}




$stmt = $conn->prepare("INSERT INTO levering (idLeverencie, DatumLevering, TijdLevering, Leveranciers_idLeveranciers) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $_POST['idLeverencie'], $_POST['DatumLevering'], $_POST['TijdLevering'], $_POST['Leveranciers_idLeveranciers']);

//try {
//    $stmt->execute();
//    echo "New record created successfully";
//} catch (Exception  $e) {
//    echo "Error: " . $e->getMessage();
//}
echo '<form action="" method="post">';
echo '    <label>idLeverencie:</label>';
echo '    <input type="text" name="idLeverencie"><br><br>';
echo '    <label>DatumLevering:</label>';
echo '    <input type="date" name="DatumLevering"><br><br>';
echo '    <label>TijdLevering:</label>';
echo '    <input type="time " name="TijdLevering"><br><br>';
$query = "SELECT DISTINCT Leveranciers_idLeveranciers FROM levering";
$resultDropdown = $conn->query($query);


if ($resultDropdown->num_rows > 0) {
    echo '<label for="userDropdown">Select an existing Levering:</label>';
    echo '<select name="Leveranciers_idLeveranciers" id="LeverancierDropdown">';
    while ($rowDropdown = $resultDropdown->fetch_assoc()) {
        $bsn = $rowDropdown["Leveranciers_idLeveranciers"];
        $fullName =  $rowDropdown["Leveranciers_idLeveranciers"];
        echo "<option value=\"$bsn\">$fullName</option>";
    }
    echo '</select>';

    echo '    <input type="submit" name="submit" value="Submit">';
    echo '</form>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $idToDelete = $_POST['idToDelete'];

        $stmt = $conn->prepare("DELETE FROM levering WHERE idLeverencie = ?");
        $stmt->bind_param("s", $idToDelete);

        try {
            $stmt->execute();
            echo "Record deleted successfully";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Fetch existing records for the table
if (isset($_POST['submit'])) {
    $search = isset($_POST['search']) ? "%" . $_POST['search'] . "%" : null;
    if ($search !== null) {
        $search = "%" . $_POST['search'] . "%";
        $stmt = $conn->prepare("SELECT idLeverencie, DatumLevering, TijdLevering, Leveranciers_idLeveranciers FROM levering WHERE idLeverencie LIKE ? OR DatumLevering LIKE ? OR TijdLevering LIKE ? OR Leveranciers_idLeveranciers LIKE ?");
        $stmt->bind_param("ssss", $search, $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output the search results in a table
        echo '<form method="post">';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>idLeverencie</th>';
        echo '<th>DatumLevering</th>';
        echo '<th>TijdLevering</th>';
        echo '<th>Leveranciers_idLeveranciers</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['idLeverencie'] . '</td>';
            echo '<td>' . $row['DatumLevering'] . '</td>';
            echo '<td>' . $row['TijdLevering'] . '</td>';
            echo '<td>' . $row['Leveranciers_idLeveranciers'] . '</td>';
            echo '<td><button type="submit" name="delete" value="' . $row['idLeverencie'] . '">Delete</button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</form>';
    }
}



$stmt->close();
$conn->close();
?>

<link rel="stylesheet" href="search.css">

<form method="post">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit">Submit</button>
</form>



</form>
