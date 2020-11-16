<?php
session_start();

$user_name = $_POST["user_name"];
$password = $_POST["password"];

require("../class/admin.php");
require("../../class/db.php");

$db = new Database();
$instance = new Admin($db);

// check for user existance
$user = $instance->checkAdmin($user_name, $password);

$password_hash = hash('sha256', $password);
if ($user and $user['password'] == $password_hash) {
  $_SESSION["user_name"] = $user['user_name'];
  header('Location: ../index.php');
}
else {
  $_SESSION["errorMessage"] = "Incorrect username or password.";
  header('Location: ../index.php');
}

