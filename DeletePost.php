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
        Delete?
    </h2>
");

if(empty($_POST["toDelete"]))
    echo("You have selected nothing to be deleted.");
else{
    echo("You have deleted the following posts: <br>");
    foreach($_POST["toDelete"] as $selected){
        $mysqli->query("DELETE FROM Posts WHERE post_id='" . $selected . "'");
        echo($selected . "<br>");
    }
}

$mysqli->close();
?>