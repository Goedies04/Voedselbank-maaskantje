<!--deze .php maakt producten aan en laat ze zien met een zoek functie-->
<link rel="stylesheet" href="search.css">
<?php
include_once "donaldDuck.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();


$stmt = $conn->prepare("INSERT INTO producten (EAN, ProductNaam, Houdbaarheidsdatum, Aantal, Levering_idLeverencie) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $_POST['EAN'], $_POST['ProductNaam'], $_POST['Houdbaarheidsdatum'], $_POST['Aantal'], $_POST['Levering_idLeverencie']);

try {
    $stmt->execute();
    echo "New record created successfully";
} catch (Exception  $e) {
    echo "Error: " . $e->getMessage();
}
echo '<div style="display: flex; justify-content: center;">';
echo '<form  action="" method="post">';
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
    echo '</div>';
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .center-screen {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            font-size: 14px;
            margin: 20px 0;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        input[type="text"] {
            width: 50%;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="center-screen">
    <?php
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

    <form method="post">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit">Submit</button>
    </form>
</div>

</body>
</html>