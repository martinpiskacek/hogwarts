<?php 

require "funkce.php";

$conn = DBconnection();

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if(empty($result)){
    echo "List is empty.";
} else {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

    <title>Hogwarts - List of students</title>
</head>
<body>
    
    <?php require "header.php"; ?>

    <div class="container">
        <h2>List of Hogwarts students</h2>
        <?php if(empty($users)): ?>
            <p id="empty">The list is empty.<br>To add a new student click <a href="create-user.php">here</a></p>
        <?php else: ?>
            <?php foreach($users as $user): ?>
                <div class="user">
                    <a href="more-info.php?id=<?=$user["id"]?>"><?= htmlspecialchars($user["first_name"]) . " " . htmlspecialchars($user["second_name"]) ?></a>
                    <div class="line"></div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>

</body>
</html>