<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "username", "pass", "db");

if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo("
    <h1>
        Shu's Message Board
    </h1>

    <h2>
        User List:
    </h2>
");

if($result = $mysqli->query("SELECT user_id FROM Users")){
    while($row = $result->fetch_assoc()){
        echo($row["user_id"] . "<br>");
    }
    $result->free();
}
else echo("Could not reach user list.");

$mysqli->close();
?>