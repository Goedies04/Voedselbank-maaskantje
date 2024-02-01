<!--deze .php maakt Leveracieren en leverencies aan en laat ze zien met een zoek functie-->
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
            <a href="PenguinsCategorieEnRollen.php">
                <i class='bx bx-home-alt-2'></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-user' ></i>
                <span class="links_name">Gebruikers</span>
            </a>
            <span class="tooltip">Gebruikers</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-package'></i>
                <span class="links_name">Inventaris</span>
            </a>
            <span class="tooltip">Inventaris</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-baguette' ></i>
                <span class="links_name">Voedselpaket</span>
            </a>
            <span class="tooltip">Voedselpaket</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Beheer</span>
            </a>
            <span class="tooltip">Beheer</span>

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
<!--<link rel="stylesheet" href="search.css">-->

<?php

include_once "donaldDuck.php";
$classDatabase = new Database();
$conn = $classDatabase->connect();


$stmt = $conn->prepare("INSERT INTO rollen (idRollen, Rollen) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['idRollen'], $_POST['Rollen']);

//try {
//    $stmt->execute();
//    echo '<div style="display: flex; justify-content: center; margin-top: 100px;">';
//    echo "New record created successfully";
//    echo '</div>';
//} catch (Exception  $e) {
//    echo '<div style="display: flex; justify-content: center; margin-top: 100px;">';
//    echo "Error: " . $e->getMessage();
//    echo '</div>';
//}

echo '<div style="display: flex; justify-content: center ;margin-top: 100px;">
<button  class="popup" onclick="extend()">Rollen ⬇️</button>
<button onclick="unextend()">⬆️</button>
</div>
';
echo '<div id="submit"  style="display: none; justify-content: center;">
<div>
<form action="" method="post" name="submit">
    <label>ID Rollen:</label>
    <input type="text" name="idRollen" required><br><br>
    <label>Roll naam:</label>
    <input type="text" name="Rollen" required><br><br>
</select>
    <input type="submit" name="submit" value="Submit">
</form>
   <form method="post" id="submit">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit">Search</button>
    </form>
</div>
</div>';


if (isset($_POST['submit'])) {
    $search = isset($_POST['search']) ? "%" . $_POST['search'] . "%" : null;
    if ($search !== null) {
        $search = "%" . $_POST['search'] . "%";
        $stmt = $conn->prepare("SELECT idRollen, Rollen FROM Rollen WHERE idRollen LIKE ? OR Rollen LIKE ?");
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output the search results in a table
        echo '<div id="submit"  >';
        echo '<table  style="display: flex; justify-content: center;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>idRollen</th>';
        echo '<th>Rollen</th>';

        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['idRollen'] . '</td>';
            echo '<td>' . $row['Rollen'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
echo '</div>';

    }

}


echo '</br>';






$stmt = $conn->prepare("INSERT INTO categorie (idcategorie, categorie) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['idcategorie'], $_POST['categorie']);

//try {
//    $stmt->execute();
//    echo '<div style="display: flex; justify-content: center;">';
//    echo "New record created successfully";
//    echo '</div>';
//} catch (Exception  $e) {
//    echo '<div style="display: flex; justify-content: center;">';
//    echo "Error: " . $e->getMessage();
//    echo '</div>';
//}
echo '<div style="display: flex; justify-content: center;">
<button  class="popup" onclick="extend2()">Categorie ⬇️</button>
<button onclick="unextend2()">⬆️</button>
</div>';
echo '<div id="submit2"  style="display: none; justify-content: center;">';

echo '<div>
<form action="" method="post">
    <label>ID catagorie:</label>
    <input type="text" name="idcategorie"><br><br>
    <label>Categorie:</label>
    <input type="text" name="categorie"><br><br>
</select>
    <input type="submit" name="submit" value="Submit">
</form>
    <form method="post" id="submit1">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit2">Search</button>
    </form>
</div>
</div>';





if (isset($_POST['submit2'])) {
    $search = isset($_POST['search']) ? "%" . $_POST['search'] . "%" : null;
    if ($search !== null) {
        $search = "%" . $_POST['search'] . "%";
        $stmt = $conn->prepare("SELECT idcategorie, categorie FROM categorie WHERE idcategorie LIKE ? OR categorie LIKE ?");
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();

        // Output the search results in a table



        echo '<table  style="display: flex; justify-content: center;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>idcategorie</th>';
        echo '<th>categorie</th>';


        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';

            echo '<td>' . $row['idcategorie'] . '</td>';
            echo '<td>' . $row['categorie'] . '</td>';

            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
}

$stmt->close();
$conn->close();
?>

<!--<link rel="stylesheet" href="search.css">-->




<script>
        function extend() {
        var extendedContent = document.getElementById("submit");
        var unextendedContent = document.getElementById("unextendedContent");

        // Show extended content
        extendedContent.style.display = "flex";

        // Hide unextended content
        unextendedContent.style.display = "none";
    }

        function unextend() {
        var extendedContent = document.getElementById("submit");
        var unextendedContent = document.getElementById("unextendedContent");

        // Hide extended content
        extendedContent.style.display = "none";

        // Show unextended content
        unextendedContent.style.display = "flex";
    }
        function extend2() {
            var extendedContent = document.getElementById("submit2");
            var unextendedContent = document.getElementById("unextendedContent");

            // Show extended content
            extendedContent.style.display = "flex";

            // Hide unextended content
            unextendedContent.style.display = "none";
        }

        function unextend2() {
            var extendedContent = document.getElementById("submit2");
            var unextendedContent = document.getElementById("unextendedContent");

            // Hide extended content
            extendedContent.style.display = "none";

            // Show unextended content
            unextendedContent.style.display = "flex";
        }
</script>
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