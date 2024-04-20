<?php

require "funkce.php";


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $conn = DBconnection();

    $sql = "INSERT INTO users (first_name, second_name, age, house) VALUES (?,?,?,?)";

    $statement = mysqli_prepare($conn, $sql);
    if($statement === false){ 
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($statement, "ssis", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["house"]);
        if(mysqli_stmt_execute($statement)){
            header("location: list.php");
        } else {
            echo mysqli_error($statement);
        }
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

    <title>Hogwarts - Add student</title>
</head>
<body>

    <?php require "header.php"; ?>

    <div class="container">

        <h2>Add new student</h2>

        <form method="POST">
            <label>FIRST NAME</label>
            <input class="form-input" type="text" name="first_name" required>
            <label>SECOND NAME</label>
            <input class="form-input" type="text" name="second_name" required>
            <label>AGE</label>
            <input class="form-input" type="number" name="age" min="10" required>
            <label>HOUSE</label>
            <input class="form-input" type="text" name="house" required>
            <input class="form-button" type="submit" value="ADD STUDENT">
        </form>
    </div>

</body>
</html>