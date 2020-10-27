<?php
require("../../class/db.php");
require("../../class/news.php");

// get authorised data
$title = $_POST["title"];
$description = $_POST["image"];
$date = $_POST["date"];

$db = new Database();
$instance = new News($db);
$instance->Initialize($title, $description, $date);


if ($instance->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
