<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelcss.css">
    <title>Document</title>
</head>
<body>
    <!-- <div class="flex-container">
        <a class="Pf" href=home.html>pf</a>
    </div>
    <div class="home">
        <div>
            <img src="images/1024x576a.jpg" alt="">
            <p class="box1">ik ben een box</p>
        </div>
    </div>
    </div> -->

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "voedselbankmaaskantje";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    ?>




</body>
</html>