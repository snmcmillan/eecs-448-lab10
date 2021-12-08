<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "username", "pass", "db");
$username = mysqli_real_escape_string($mysqli, $_POST[username]);
$content = mysqli_real_escape_string($mysqli, $_POST[content]);

if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo("
    <h1>
        Shu's Message Board
    </h1>

    <h2>
        Create Post:
    </h2>
");

if(!isset($username) || trim($username) == '')
    echo("Error: Username cannot be empty!");
else if(($mysqli->query("SELECT user_id FROM Users WHERE user_id='" . $username . "'")->num_rows) == 0)
    echo("Error: Must post as a valid user!");
else{
    if(!isset($content) || trim($content) == ''){
        echo("Error: Content cannot be empty!");
    }
    else{
        if(($mysqli->query("INSERT INTO Posts (content, author_id) VALUES ('" . $content . "','" . $username . "')")))
            echo("Post created successfully!");
        else echo("An unknown error occured when processing the request."); 
    }
}

$mysqli->close();
?>