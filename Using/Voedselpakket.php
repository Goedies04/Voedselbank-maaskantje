<!--Checks to see login-->
<?php
session_start();
require 'Databaseconnectie.php';

if (!isset($_SESSION["username"])) {
    header("Location: inlogpagina.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <!--    <link rel="stylesheet" href="navigationbar.css">-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- vebindt met een plugging die we hebben om de icons goed te krijgen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <img class='icon' src="navigationimg/VBN_logo-150x150.png" >
        <div class="logo_name">Maaskantje</div>
        <img id="btn" src="navigationimg/menu-regular-24.png" alt="">
    </div>
    <ul class="nav-list">
        <li>
            <a href="Dashboard.php">
                <i class='bx bx-home-alt-2'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a href="voedselpakket.php">
                <i class='bx bx-baguette' ></i>
                <span class="links_name">Voedselpaket</span>
            </a>
            <span class="tooltip">Voedselpaket</span>
        </li>
        <li>
            <a href="Inlogpagina.php">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Inlogpagina.php</span>
            </a>
            <span class="tooltip">Inlogpagina.php</span>

    </ul>
</div>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
    });
</script>
</body>
</html>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .sidebar{
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 78px;
        background: #11101D;
        padding: 6px 14px;
        z-index: 99;
        transition: all 0.5s ease;
    }
    .sidebar.open{
        width: 250px;
    }
    .sidebar .logo-details{
        height: 60px;
        display: flex;
        align-items: center;
        position: relative;
    }
    .sidebar .logo-details .icon{
        opacity: 0;
        height: 26px;
        margin-right: -3px;
        margin-left: 12px;
        transition: all 0.5s ease;
    }
    .sidebar .logo-details .logo_name{
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        opacity: 0;
        transition: all 0.5s ease;
    }
    .sidebar.open .logo-details .icon,
    .sidebar.open .logo-details .logo_name{
        opacity: 1;
        height: 26px;
        margin-right: -3px;
        margin-left: 12px;
    }
    .sidebar .logo-details #btn{
        position: absolute;
        top: 50%;
        right: 13px;
        transform: translateY(-50%);
        font-size: 22px;
        transition: all 0.4s ease;
        font-size: 23px;
        text-align: center;
        cursor: pointer;
        transition: all 0.5s ease;
    }
    .sidebar.open .logo-details #btn{
        text-align: center;
    }
    .sidebar i{
        /* zorgt er voor dat de icons er goed uit zien en op de goei plek staan */
        color: #fff;
        height: 60px;
        min-width: 50px;
        font-size: 28px;
        text-align: center;
        line-height: 60px;
    }
    .sidebar .nav-list{
        margin-top: 20px;
        height: 100%;
    }
    .sidebar li{
        /* zorgt er voor dat de tooltip op de goei plek zit */
        position: relative;
        margin: 8px 0;
        list-style: none;
    }
    .sidebar li .tooltip{
        /* dit is de style van de tooltip zelf */
        position: absolute;
        top: -20px;
        left: calc(100% + 15px);
        z-index: 3;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 400;
        opacity: 0;
        white-space: nowrap;
        pointer-events: none;
        transition: 0s;
    }
    .sidebar li:hover .tooltip{
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
        top: 50%;
        transform: translateY(-50%);
    }
    .sidebar.open li .tooltip{
        /* zorgt er voor dat als je de navigatie bar open heb dan zie je de tooltips niet */
        display: none;
    }
    .sidebar input{
        font-size: 15px;
        color: #FFF;
        font-weight: 400;
        outline: none;
        height: 50px;
        width: 100%;
        width: 50px;
        border: none;
        border-radius: 12px;
        transition: all 0.5s ease;
        background: #1d1b31;
    }
    .sidebar.open input{
        padding: 0 20px 0 50px;
        width: 100%;
    }

    .sidebar li a{
        display: flex;
        height: 100%;
        width: 100%;
        border-radius: 12px;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
        background: #11101D;
    }
    .sidebar li a:hover{
        /* verandert de achtergrond naar wit waar neer je er over heen hovered */
        background: #FFF;
    }
    .sidebar li a .links_name{
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: 0.4s;
    }
    .sidebar.open li a .links_name{
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar li a:hover .links_name,
    .sidebar li a:hover i{
        /* verandert de kleur van text en icon naar zwart waarneer je er over heen hovered */
        transition: all 0.5s ease;
        color: #11101D;
    }


    .sidebar li i{
        height: 50px;
        line-height: 50px;
        font-size: 18px;
        border-radius: 12px;
    }


    .sidebar li img{
        height: 45px;
        width: 45px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 10px;
    }


    @media (max-width: 420px) {
        .sidebar li .tooltip{
            display: none;
        }
    }
</Style>

<!-- de code hier boven is voor de navigatie bar -->




<?php

include_once "Databaseconnectie.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();
// verbind met de database

if (isset($_POST['submit32'])) {
$stmt = $conn->prepare("INSERT INTO voedselpakketen (idVoedselpakketen, DatumSamenstelling, DatumUitgifte, User_bsn) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['idVoedselpakketen'], $_POST['DatumSamenstelling'], $_POST['DatumUitgifte'], $_POST['bsn']);

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
<div style="display: flex;flex-direction: column;align-items: center;">
     <form action="" method="post" name="form1" style="top: 30px; position: relative;">
    <label>id Voedselpakketen:</label>
    <input type="text" name="idVoedselpakketen" required><br><br>
    <label>DatumSamenstelling:</label>
    <input type="date" name="DatumSamenstelling" required><br><br>
    <label>DatumUitgifte:</label>
    <input type="date" name="DatumUitgifte" required><br><br>



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
<br></br>
    <input type="submit" name="submit32" value="Submit">
</form>



<?php
function displayProducts($conn) {
    $query = "SELECT EAN, ProductNaam, Houdbaarheidsdatum, Aantal FROM producten";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<form action="" method="post" style="top: 100px; position: relative;">';
        echo '<label for="voedselpakketenDropdown">Select a Voedselpakketen:</label>';
        echo '<select name="voedselpakketenID" id="voedselpakketenDropdown">';

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

if (isset($_POST['submit_products'])) {
    if (isset($_POST['selectedProducts']) && is_array($_POST['selectedProducts'])) {
        $selectedProducts = $_POST['selectedProducts'];
        

        $voedselpakketenID = $_POST['voedselpakketenID'];

        $stmtInsert = $conn->prepare("INSERT INTO Voedselpakketen_has_Producten (Voedselpakketen_idVoedselpakketen, Producten_EAN) VALUES (?, ?)");

        foreach ($selectedProducts as $productEAN) {
            $stmtInsert->bind_param("ss", $voedselpakketenID, $productEAN);
            $stmtInsert->execute();
        }

        $stmtInsert->close();
        echo "<div style='margin-top: 90px;'>Selected products added to Voedselpakketen $voedselpakketenID successfully!</div>";
    } else {
        echo "No products selected!";
    }
}

displayProducts($conn);

$conn->close();
?>
</div>