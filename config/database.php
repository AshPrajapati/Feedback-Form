<?php
define('DB_HOST','localhost');
define('DB_USER','YOUR_NAME');
define('DB_PASS','YOUR_PASSWORD');
define('DB_NAME','YOUR_DB_NAME');


$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($conn->connect_error)
{
    die('Connection failed' . $conn->connect_error);
}


?>