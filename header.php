<?php
include_once "./includes/classes.php";
$DB = new DB();
session_start();
if(!isset($_SESSION['id']))
{
    header('location:./login_page.php');
    die();
}
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$user_data = $DB->read($sql)[0];

?>