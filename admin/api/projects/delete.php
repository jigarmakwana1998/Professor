<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../../class/db.php");
require("../../class/project.php");

$db = new Database();
$instance = new Project($db);

if ($delete) {
    $result = $instance->Delete($id);
    if ($result) {
        $result = "Success";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
