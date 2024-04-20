<?php 

require "funkce.php";

if(isset($_GET["id"]) and is_numeric($_GET["id"])){
    $conn = DBconnection();

    $user = getUser($conn, $_GET["id"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400..900&family=DM+Serif+Display:ital@0;1&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="css/style.css">
    <title>Hogwarts - Student info</title>
</head>
<body>

    <?php require "header.php"; ?>

        <div class="container">
        
            <h2><?= htmlspecialchars($user["first_name"]) . " " . htmlspecialchars($user["second_name"]) ?></h2>

            <p>Age: <?= htmlspecialchars($user["age"]) ?></p>
            <p>House: <?= htmlspecialchars($user["house"]) ?></p>

            <div class="btns">
                <a href="edit-user.php?id=<?= $user["id"] ?>">edit</a>
                <a href="delete-user.php?id=<?= $user["id"] ?>">delete</a>
                <a href="list.php">back</a>
            </div>
        </div>

</body>
</html>