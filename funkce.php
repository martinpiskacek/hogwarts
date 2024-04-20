<?php

function DBconnection(){
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "usersDB";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(mysqli_connect_error()){
        echo mysqli_connect_error();
    } else {
        return $conn;
    }
}

function getUser($conn, $id){
    $sql = "SELECT * FROM users WHERE id = ?";
    $statement = mysqli_prepare($conn, $sql);
    if($statement === false){
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($statement, "i", $id);

        if(mysqli_stmt_execute($statement)){
            $result = mysqli_stmt_get_result($statement);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }
}