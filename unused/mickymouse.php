<?php
include_once "donaldDuck.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();

// Step 1: Display Data in Table
$query = "SELECT EAN, ProductNaam, Houdbaarheidsdatum, Aantal, Levering_idLeverencie FROM producten";
$result = $conn->query($query);

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>EAN</th>';
echo '<th>ProductNaam</th>';
echo '<th>Houdbaarheidsdatum</th>';
echo '<th>Aantal</th>';
echo '<th>Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['EAN'] . '</td>';
    echo '<td>' . $row['ProductNaam'] . '</td>';
    echo '<td>' . $row['Houdbaarheidsdatum'] . '</td>';
    echo '<td>' . $row['Aantal'] . '</td>';
    echo '<td><a href="mickymouse.php' . $row['id'] . '">Edit</a></td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Step 2 and 3: Edit Form and Update Record
if (isset($_GET['EAN'])) {
    $id = $_GET['EAN'];
    $editQuery = "SELECT * FROM producten WHERE EAN = $id";
    $editResult = $conn->query($editQuery);
    $editRow = $editResult->fetch_assoc();

    // Display the edit form
    echo '<form action="mickymouse.php" method="post">';
    echo '<label for="column1">Column 1:</label>';
    echo '<input type="text" name="column1" value="' . $editRow['column1'] . '"><br>';
    echo '<label for="column2">Column 2:</label>';
    echo '<input type="text" name="column2" value="' . $editRow['column2'] . '"><br>';
    echo '<label for="column3">Column 3:</label>';
    echo '<input type="text" name="column3" value="' . $editRow['column3'] . '"><br>';
    echo '<input type="hidden" name="id" value="' . $id . '">';
    echo '<input type="submit" name="submit" value="Update">';
    echo '</form>';
}

?>
