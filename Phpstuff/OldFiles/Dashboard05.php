<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- verbind met een plugging die we hebben om de icons goed te krijgen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!-- Navigationbar -->
<div class="sidebar">
    <div class="logo-details">
        <img class='icon' src="navigationimg/VBN_logo-150x150.png" ></img>
        <div class="logo_name">Maaskantje</div>
        <img id="btn" src="navigationimg/menu-regular-24.png" alt="">
    </div>
    <ul class="nav-list">
        <li>
            <a href="#">
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
            <a href="inlogpaginaa.php">
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
        menuBtnChange();//calling the function(optional)
    });
</script>

<!-- Navigation Links -->
<div class="flexbuttons">

    <button class="popup" onclick="extend()">Categorieën ⬇️</button>

    <!-- Button content -->
    <div id="submit">
        <div >
            <form action="" method="post">
                <label>idcategorie:</label>
                <input type="text" name="idcategorie"><br><br>
                <label>categorie:</label>
                <input type="text" name="categorie"><br><br>
                </select>
                <input type="submit" name="submit" value="Submit">
            </form>
            <form method="post" id="submit1">
                <input type="text" name="search" placeholder="Search">
                <button type="submit" name="submit2">Search</button>
            </form>
        </div>
    </div>
        <button onclick="unextend()">⬆️</button>
    </div>

    <button class="popup2" onclick="extend2()">Gebruikers ⬇️</button>

    <!-- Button content -->
    <div id="submit2">
        <h2>Submit Section2</h2>
        <p>This is the extended content that you want to display2.</p>
        <button onclick="unextend2()">⬆️</button>
    </div>
</div>

<script>
    // Extend funtions //

    function extend() {
        var extendedContent = document.getElementById("submit");
        var unextendedContent = document.getElementById("unextendedContent");

        // Show extended content //
        extendedContent.style.display = "block";

        // Hide unextended content //
        unextendedContent.style.display = "none";
    }

    function extend2() {
        var extendedContent = document.getElementById("submit2");
        var unextendedContent = document.getElementById("unextendedContent");

        // Show extended content //
        extendedContent.style.display = "block";

        // Hide unextended content //
        unextendedContent.style.display = "none";
    }

    // Unextend funtions //

    function unextend() {
        var extendedContent = document.getElementById("submit");
        var unextendedContent = document.getElementById("unextendedContent");

        // Hide extended content //
        extendedContent.style.display = "none";

        // Show unextended content //
        unextendedContent.style.display = "block";
    }

    function unextend2() {
        var extendedContent = document.getElementById("submit2");
        var unextendedContent = document.getElementById("unextendedContent");

        // Hide extended content
        extendedContent.style.display = "none";

        // Show unextended content
        unextendedContent.style.display = "block";
    }
</script>

<?php
    include_once "Databaseconnectie.php";
    $classDatabase = new Database();
    $conn = $classDatabase->connect();


$stmt = $conn->prepare("INSERT INTO categorie (idcategorie, categorie) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['idcategorie'], $_POST['categorie']);

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
echo '<div id="submit2"  style="display: none; justify-content: center;">';

echo '<div >
<form action="" method="post">
    <label>idcategorie:</label>
    <input type="text" name="idcategorie"><br><br>
    <label>categorie:</label>
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
        echo '<div id="submit2">';
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
</body>
</html>