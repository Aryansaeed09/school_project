<?php

// step 2. db connect
$host  = 'localhost';
$user  = "root";
$pwd   = "";
$db    = "spsdb";

$conn = mysqli_connect($host, $user, $pwd, $db);
if (!$conn) {
    die("db not connected");
}
