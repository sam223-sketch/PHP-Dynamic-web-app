<?php
  // Delete records
  require_once('includes/db.php');

  if (!isset($_GET['id'])){
    header("Location: index.php");
  }
  $id = $_GET['id'];
  $sql = "DELETE FROM notes WHERE id='" . $id . "' LIMIT 1";
  if (mysqli_query($dbconnection, $sql)){
    header("Location: index.php");
  }
?>
