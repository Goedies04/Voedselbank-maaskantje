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
            <a href="Voedselpakket.php">
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
?>




<div id="submit5" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
<?php
   if (isset($_POST['submit2017'])) {
 $stmt = $conn->prepare("INSERT INTO leveranciers (idLeveranciers, Bedrijfnaam, Email, Telefoonnummer, Rollen_idRollen) VALUES (?, ?, ?, ?, ?)");
 $stmt->bind_param("sssss", $_POST['idLeveranciers'], $_POST['Bedrijfnaam'], $_POST['Email'], $_POST['Telefoonnummer'], $_POST['idRollen']);
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
    <div>

        <form action="" method="post">
            <label>idLeveranciers:</label>
            <input type="text" name="idLeveranciers" required><br><br>
            <label>Bedrijfnaam:</label>
            <input type="text" name="Bedrijfnaam" required><br><br>
            <label>Email:</label>
            <input type="text" name="Email" required><br><br>
            <label>Telefoonnummer:</label>
            <input type="text" name="Telefoonnummer" required><br><br>
            <label for="userDropdown">Select an existing Rol:</label>
            <select name="idRollen" id="idRollen">

                <?php
                $query = "SELECT DISTINCT idRollen, Rollen FROM rollen";
                $resultDropdown = $conn->query($query);

                if ($resultDropdown->num_rows > 0) {
                    while ($rowDropdown = $resultDropdown->fetch_assoc()) {
                        $bsn = $rowDropdown["idRollen"];
                        $showdata = $rowDropdown["Rollen"];
                        echo "<option value=\"$bsn\">$showdata</option>";
                    }
                    echo '</select>';
                    echo '<input type="submit" name="submit2017" value="Submit">';
                    echo '</form>';
                }
                ?>
                <form method="post" id="submit5">
                <input type="text" name="search" placeholder="Search">
                <button type="submit" name="submit5">Search</button>
            </form>
            <?php
                if (isset($_POST['submit5'])) {
                    $search = isset($_POST['search']) ? "%" . $_POST['search'] . "%" : null;
                    if ($search !== null) {
                        $search = "%" . $_POST['search'] . "%";
                        $stmt = $conn->prepare("SELECT idLeveranciers, Bedrijfnaam, Email, Telefoonnummer, Rollen_idRollen FROM leveranciers WHERE idLeveranciers LIKE ? OR Bedrijfnaam LIKE ? OR Email LIKE ? OR Telefoonnummer LIKE ? OR Rollen_idRollen LIKE ?");
                        $stmt->bind_param("sssss", $search, $search, $search, $search, $search);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        echo '<table>';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>idLeveranciers</th>';
                        echo '<th>Bedrijfnaam</th>';
                        echo '<th>Email</th>';
                        echo '<th>Telefoonnummer</th>';
                        echo '<th>Rollen_idRollen</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<tr>';
                            echo '<td>' . $row['idLeveranciers'] . '</td>';
                            echo '<td>' . $row['Bedrijfnaam'] . '</td>';
                            echo '<td>' . $row['Email'] . '</td>';
                            echo '<td>' . $row['Telefoonnummer'] . '</td>';
                            echo '<td>' . $row['Rollen_idRollen'] . '</td>';
                            echo '<td>';
                            echo '<form method="post" action="delete_row_leverancier.php" style="display:inline;">';
                            echo '<input type="hidden" name="row_id" value="' . $row['idLeveranciers'] . '">';
                            echo '<button type="submit">Delete</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    }
                }
                ?>

<style>
    table {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 14px;
        margin: 20px 0;
    }
    thead {

    }
    th {
        background-color: #f2f2f2;
        text-align: left;
        padding: 10px 50px 10px 50px;
        border-bottom: 1px solid #ddd;
    }

    td {

        padding: 10px 50px 10px 50px;
        border-bottom: 1px solid #ddd;
    }

    input[type="text"] {
        width: 50%;
        padding: 5px;
        font-size: 14px;
        margin-bottom: 0px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>