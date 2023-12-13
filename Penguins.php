<!--<form method="post">-->
<!--    <input type="text" name="search" placeholder="Search">-->
<!--    <button type="submit" name="submit">Submit</button>-->
<!--</form>-->
<!---->
<?php
//include_once "donaldDuck.php";
//$classDatabase = new Database();
//$conn = $classDatabase->connect();
//if (isset($_POST['submit'])) {
//
//
//    $search = "%" . $_POST['search'] . "%";
//    $stmt = $conn->prepare("SELECT EAN, ProductNaam, Houdbaarheidsdatum, Aantal FROM producten WHERE EAN LIKE ? OR ProductNaam LIKE ? OR Houdbaarheidsdatum LIKE ? OR Aantal LIKE ?");
//    $stmt->bind_param("ssss", $search, $search, $search, $search);
//    $stmt->execute();
//    $result = $stmt->get_result();
//
//    while ($row = $result->fetch_assoc()) {
//        echo "<tr><td>" . $row['EAN'] . "</td><td>" . $row['ProductNaam'] . "</td><td>" . $row['Houdbaarheidsdatum'] . "</td><td>" . $row['Aantal'] . "</td><td>";
//    }
//
//
//}
//
//
//$stmt = $conn->prepare("INSERT INTO producten (EAN, ProductNaam, Houdbaarheidsdatum, Aantal) VALUES (?, ?, ?, ?)");
//$stmt->bind_param("ssss", $_POST['EAN'], $_POST['ProductNaam'], $_POST['Houdbaarheidsdatum'], $_POST['Aantal']);
//
//try {
//    $stmt->execute();
//    echo "New record created successfully";
//} catch (Exception  $e) {
//    echo "Error: " . $e->getMessage();
//}
//?>
<!---->
<!--<link rel="stylesheet" href="search.css">-->
<!--<table>-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>EAN-Nummer</th>-->
<!--        <th>Product Naam</th>-->
<!--        <th>Houdbaarheidsdatum</th>-->
<!--        <th>Aantal</th>-->
<!--        <th>ID Leverancie</th>-->
<!---->
<!--    </tr>-->
<!--    <form action="penguins.php" method="post">-->
<!--        <label>EAN:</label>-->
<!--        <input type="text" name="EAN"><br><br>-->
<!---->
<!--        <label>Product Naam:</label>-->
<!--        <input type="text" name="ProductNaam"><br><br>-->
<!---->
<!--        <label>Houdbaarheidsdatum:</label>-->
<!--        <input type="date" name="Houdbaarheidsdatum"><br><br>-->
<!---->
<!--        <label>Aantal:</label>-->
<!--        <input type="text" name="Aantal"><br><br>-->
<!---->
<!--        <label>Levering_idLeverencie:</label>-->
<!--        <input type="text" name="Levering_idLeverencie"><br><br>-->
<!---->
<!---->
<!--        <input type="submit" value="Submit">-->
<!--    </form>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    --><?php
//    foreach($result as $row) {
//        echo "<tr><td>" . $row['EAN'] . "</td><td>" . $row['ProductNaam'] . "</td><td>" . $row['Houdbaarheidsdatum'] . "</td><td>" . $row['Aantal'] . "</td><td>";
//    }
//
//
//    $stmt->close();
//    $conn->close();
//    ?>
<!--    </tbody>-->
<!--</table>-->

<?php
include_once "donaldDuck.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();


$stmt = $conn->prepare("INSERT INTO producten (EAN, ProductNaam, Houdbaarheidsdatum, Aantal, Levering_idLeverencie) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $_POST['EAN'], $_POST['ProductNaam'], $_POST['Houdbaarheidsdatum'], $_POST['Aantal'], $_POST['Levering_idLeverencie']);

//try {
//    $stmt->execute();
//    echo "New record created successfully";
//} catch (Exception  $e) {
//    echo "Error: " . $e->getMessage();
//}
echo '<form action="" method="post">';
echo '    <label>EAN:</label>';
echo '    <input type="text" name="EAN"><br><br>';
echo '    <label>Product Naam:</label>';
echo '    <input type="text" name="ProductNaam"><br><br>';
echo '    <label>Houdbaarheidsdatum:</label>';
echo '    <input type="date" name="Houdbaarheidsdatum"><br><br>';
echo '    <label>Aantal:</label>';
echo '    <input type="text" name="Aantal"><br><br>';
$query = "SELECT DISTINCT Levering_idLeverencie FROM producten";
$resultDropdown = $conn->query($query);


if ($resultDropdown->num_rows > 0) {
    echo '<label for="userDropdown">Select an existing Levering:</label>';
    echo '<select name="Levering_idLeverencie" id="LeveringDropdown">';
    while ($rowDropdown = $resultDropdown->fetch_assoc()) {
        $bsn = $rowDropdown["Levering_idLeverencie"];
        $fullName =  $rowDropdown["Levering_idLeverencie"];
        echo "<option value=\"$bsn\">$fullName</option>";
    }
    echo '</select>';

    echo '    <input type="submit" name="submit" value="Submit">';
    echo '</form>';
}
if (isset($_POST['submit'])) {
    $search = isset($_POST['search']) ? "%" . $_POST['search'] . "%" : null;
    if ($search !== null) {
        $search = "%" . $_POST['search'] . "%";
        $stmt = $conn->prepare("SELECT EAN, ProductNaam, Houdbaarheidsdatum, Aantal FROM producten WHERE EAN LIKE ? OR ProductNaam LIKE ? OR Houdbaarheidsdatum LIKE ? OR Aantal LIKE ?");
        $stmt->bind_param("ssss", $search, $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output the search results in a table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>EAN-Nummer</th>';
        echo '<th>Product Naam</th>';
        echo '<th>Houdbaarheidsdatum</th>';
        echo '<th>Aantal</th>';

        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['EAN'] . '</td>';
            echo '<td>' . $row['ProductNaam'] . '</td>';
            echo '<td>' . $row['Houdbaarheidsdatum'] . '</td>';
            echo '<td>' . $row['Aantal'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
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
