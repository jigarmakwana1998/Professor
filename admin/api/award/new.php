<?php
require("../class/db.php");
require("../class/award.php");

// get authorised data
$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];

$db = new Database();
$article = new Award($db);
$article->Initialize($title, $description, $date);


if ($article->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
