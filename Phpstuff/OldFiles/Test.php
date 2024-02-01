<!--deze .php maakt Leveracieren en leverencies aan en laat ze zien met een zoek functie-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- vebindt met een plugging die we hebben om de icons goed te krijgen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <img class='icon' src="Images/VBN_logo-150x150.png" >
        <div class="logo_name">Maaskantje</div>
        <img id="btn" src="Images/menu-regular-24.png" alt="">
    </div>
    <ul class="nav-list">
        <li>
            <a href="Test.php">
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
    });
</script>
</body>
</html>
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
echo '<div>
        <button  class="popup" onclick="extend2()">Categorie ⬇️</button>
</div>';
echo '<div id="submit2">';

echo '<div class="flexbuttons">
<form action="" method="post">
    <label>idcategorie:</label>
    <input type="text" name="idcategorie"><br><br>
    <label>categorie:</label>
    <input type="text" name="categorie"><br><br>
</select>
    <input type="submit" name="submit" value="Submit">
</form>
    <form style="margin-left: 0px;" method="post" id="submit">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit2">Search</button>
    </form>
    <button style="margin-top: 20px;" onclick="unextend2  ()">⬆️</button>
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