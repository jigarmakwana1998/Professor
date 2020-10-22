<?php 

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if ($stmt = $db->prepare("SELECT name, designation, title, description, avatar FROM students WHERE degree=? ORDER BY id")) {
    $stmt->bind_param('s', $_GET['payload']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      echo json_encode($rows);
    }
  }
}

unset($rows, $date);
$result->free_result();
?>