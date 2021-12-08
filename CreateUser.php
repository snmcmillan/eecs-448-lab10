<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "username", "pass", "db");
$username = mysqli_real_escape_string($mysqli, $_POST[username]);

if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo("
    <h1>
        Shu's Message Board
    </h1>

    <h2>
        Register User:
    </h2>
");

if(!isset($username) || trim($username) == '')
    echo("Error: Username cannot be empty!");
else if(($mysqli->query("SELECT user_id FROM Users WHERE user_id='" . $username . "'")->num_rows) > 0)
    echo("Error: Username already exists!");
else{
    if(($mysqli->query("INSERT INTO Users (user_id) VALUES ('" . $username . "')")))
        echo("User created successfully!");
    else echo("An unknown error occured when creating the user.");
}

$mysqli->close();
?>