<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "username", "password", "db");
$username = mysqli_real_escape_string($mysqli, $_POST[user]);

if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo("
    <h1>
        Shu's Message Board
    </h1>

    <h2>
        View User Posts:
    </h2>
");

if(!isset($username) || trim($username) == '')
    echo("Error: Username cannot be empty!");
else{
    if($result = $mysqli->query("SELECT content, author_id FROM Posts WHERE author_id='" . $username . "'")){
        while($row = $result->fetch_assoc()){
            echo($row["content"] . "<br>");
        }
        $result->free();
    }
    else echo("An unknown error occured when processing the request."); 
}

$mysqli->close();
?>