<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

$servername = "localhost";
$username = "grihonir_db_grihonirman";
$password = "db_grihonirman";
$database = "grihonir_db_grihonirman";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
?>