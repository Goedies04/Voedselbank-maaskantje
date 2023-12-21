<?php
include_once "donaldDuck.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();


$stmt = $conn->prepare("INSERT INTO voedselpakketen (idVoedselpakketen, DatumSamenstelling, DatumUitgifte, User_bsn) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $_POST['idVoedselpakketen'], $_POST['datumSamenstelling'], $_POST['datumUitgifte'], $_POST['User_bsn']);


try {
   $stmt->execute();
   echo "New record created successfully";
} catch (Exception  $e) {
   echo "Error: " . $e->getMessage();
}
echo '<form action="" method="post">';
echo '    <label>idVoedselpakketen:</label>';
echo '    <input type="text" name="idVoedselpakketen"><br><br>';
echo '    <label>datumSamenstelling:</label>';
echo '    <input type="date" name="datumSamenstelling "><br><br>';
echo '    <label>datumUitgifte:</label>';
echo '    <input type="date" name="datumUitgifte"><br><br>';
$query = "SELECT DISTINCT User_bsn FROM voedselpakketen";
$resultDropdown = $conn->query($query);


if ($resultDropdown->num_rows > 0) {
    echo '<label for="userDropdown">Select an bsn:</label>';
    echo '<select name="User_bsn" id="User_bsn">';
    while ($rowDropdown = $resultDropdown->fetch_assoc()) {
        $bsn = $rowDropdown["User_bsn"];
        $fullName =  $rowDropdown["User_bsn"];
        echo "<option value=\"$bsn\">$fullName</option>";
    }
    echo '</select>';

    echo '    <input type="submit" name="submit" value="Submit">';
    echo '</form>';
}

// // Display the voedselpakket form
// displayVoedselpakketForm();



// Function to get and display products
function displayProducts($conn) {
    $query = "SELECT EAN, ProductNaam, Houdbaarheidsdatum, Aantal FROM producten";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<form action="" method="post">';
        echo '<label for="voedselpakketenDropdown">Select a Voedselpakketen:</label>';
        echo '<select name="voedselpakketenID" id="voedselpakketenDropdown">';
        
        // Retrieve and display Voedselpakketen options
        $voedselpakketenQuery = "SELECT idVoedselpakketen, DatumSamenstelling FROM Voedselpakketen";
        $voedselpakketenResult = $conn->query($voedselpakketenQuery);
        
        while ($rowVoedselpakketen = $voedselpakketenResult->fetch_assoc()) {
            $voedselpakketenID = $rowVoedselpakketen["idVoedselpakketen"];
            $datumSamenstelling = $rowVoedselpakketen["DatumSamenstelling"];
            echo "<option value=\"$voedselpakketenID\">Voedselpakketen $voedselpakketenID ($datumSamenstelling)</option>";
        }
        
        echo '</select>';
        echo '<br><br>';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Select</th>';
        echo '<th>EAN-Nummer</th>';
        echo '<th>Product Naam</th>';
        echo '<th>Houdbaarheidsdatum</th>';
        echo '<th>Aantal</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td><input type="checkbox" name="selectedProducts[]" value="' . $row['EAN'] . '"></td>';
            echo '<td>' . $row['EAN'] . '</td>';
            echo '<td>' . $row['ProductNaam'] . '</td>';
            echo '<td>' . $row['Houdbaarheidsdatum'] . '</td>';
            echo '<td>' . $row['Aantal'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<input type="submit" name="submit_products" value="Add to Voedselpakketen">';
        echo '</form>';
    }
}

// If the product form is submitted
if (isset($_POST['submit_products'])) {
    // Check if products are selected
    if (isset($_POST['selectedProducts']) && is_array($_POST['selectedProducts'])) {
        $selectedProducts = $_POST['selectedProducts'];
        print_r($selectedProducts);
        
        // // Get the selected Voedselpakketen ID
        $voedselpakketenID = $_POST['voedselpakketenID'];

        // Insert selected products into Voedselpakketen_has_Producten
        $stmtInsert = $conn->prepare("INSERT INTO Voedselpakketen_has_Producten (Voedselpakketen_idVoedselpakketen, Producten_EAN) VALUES (?, ?)");

        foreach ($selectedProducts as $productEAN) {
            $stmtInsert->bind_param("ss", $voedselpakketenID, $productEAN);
            $stmtInsert->execute();
        }

        $stmtInsert->close();
        echo "Selected products added to Voedselpakketen $voedselpakketenID successfully!";
    } else {
        echo "No products selected!";
    }
}

// Display the products and Voedselpakketen options
displayProducts($conn);

// Close connection
$conn->close();
?>