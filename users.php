<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelcss.css">
    <title>Add User</title>
</head>
<body>

    <h2>Add User</h2>

    <form action="add_user.php" method="post">
        <label for="bsn">BSN:</label>
        <input type="text" name="bsn" required><br>

        <label for="voornaam">Voornaam:</label>
        <input type="text" name="voornaam" required><br>

        <label for="tussenvoegsel">Tussenvoegsel:</label>
        <input type="text" name="tussenvoegsel"><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" required><br>

        <label for="geboortedatum">Geboortedatum:</label>
        <input type="date" name="geboortedatum" required><br>

        <label for="telefoonnummer">Telefoonnummer:</label>
        <input type="text" name="telefoonnummer" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Add User">
    </form>

</body>
</html>
