<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

$servername = "localhost";
$username = "grihonir_db_grihonirman";
$password = "db_grihonirman";
$database = "grihonir_db_grihonirman";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

mysqli_query($con, "SET CHARACTER SET utf8");
mysqli_query($con, "SET SESSION collation_connection ='utf8_general_ci'");

date_default_timezone_set("Asia/Kolkata");

$date = date("Y-m-d");
$time = date("H:i:s");
$day = date("l");
$month = date("F");
$year = date("Y");
$timestamp = date("Y-m-d H:i:s");


$allowedImgExt = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'webp', 'tiff', 'tif');
$allowedVideoExt = array('WEBM', 'MPG', 'MP2', 'MPEG', 'MPE', 'MPV', 'OGG', 'M4V', 'MP4', 'M4P', 'AVI', 'WMV', 'MOV', 'QT', 'FLV', 'SWF', 'AVCHD','webm', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'ogg', 'm4v', 'mp4', 'm4p', 'avi', 'wmv', 'mov', 'qt', 'flv', 'swf', 'avchd');
$inputAllowedImage = '.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.webp,.tiff,.tif';



