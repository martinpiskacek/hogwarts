<?php 

require "funkce.php";

$conn = DBconnection();

$user = getUser($conn, $_GET["id"]);

if(isset($_GET["id"]) and is_numeric($_GET["id"])){


    if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        $sql = "DELETE FROM users WHERE id =" . $_GET["id"];

        mysqli_query($conn, $sql);

        header("location: list.php");
    }
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
    <title>Hogwarts - Delete student</title>
</head>
<body>

    <?php require "header.php"; ?>

    <div class="container">
        <h2><span>Are you sure you want to delete </span><br><?= $user["first_name"]. " " .$user["second_name"] ?>?</h2>        

        <form class="deleteForm" method="POST">
            <input class="form-button delete" type="submit" value="DELETE">
            <a class="form-input form-button" href="list.php">BACK</a>
        </form>

    </div>
</body>
</html>