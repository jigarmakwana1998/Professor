<?php
// incoing request
$edit = $_POST['edit'];
$delete = $_POST['delete'];
$data = $_POST['data'];

require("../class/db.php");
require("../class/student.php");

$db = new Database();
$a = new Student($db);

$result = $a->FetchAll();
echo $result;
