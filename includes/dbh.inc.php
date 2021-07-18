<?php 

$servername = "localhost";
$dBUsername = "root";
$dBPasssword = "";
$dBName = "projectphp01";

$conn = mysqli_connect($servername, $dBUsername, $dBPasssword, $dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
