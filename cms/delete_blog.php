<?php
include 'dbconfig.php';
// sql to delete a record

$groupid=$_GET['groupid'];
$sql = "DELETE FROM images WHERE groupid='".$groupid."'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: blog.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>