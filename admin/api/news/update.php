<?php
require("../../class/db.php");
require("../../class/news.php");

// get authorised data
$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];
$id = $_POST["id"];

$db = new Database();
$instance = new News($db);
$instance->Initialize($title, $description, $date);

$result = $instance->Update($id);
if ($result) {
    echo "Success";
} else {
    echo "Error";
}

