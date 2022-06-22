<?php
define("DB_SEVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "db-university");
define("DB_PORT", 3306);


$conn = new mysqli(DB_SEVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

//var_dump($conn);

if( $conn && $conn->connect_error) {
    echo "Error"; $conn->connect_error;
    die();
}
?>