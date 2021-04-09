<?php
require_once './database.php';
require_once '../models/Database.php';
require_once '../models/Registry.php';
session_start();
//Sanitize POST Array
$POST= filter_var_array($_POST, FILTER_SANITIZE_STRING);
$_SESSION['courseID'] = $_POST['courseID'];



?>