<?php
$hostname = "localhost";
$dbname ="kortana_cbt";
$username = "astervicks";
$password = "astervicks000";

$conn = mysqli_connect($hostname,$username,$password,$dbname);
if(!$conn){
    echo "Connection Failed " . mysqli_connect_error();
}