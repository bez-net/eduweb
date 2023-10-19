<?php
include 'dbconfig.php';
// sql to delete a record

$groupid=$_GET['groupid'];
$sql = "DELETE FROM images WHERE groupid='".$groupid."'";

if ($conn->query($sql) === TRUE) {
 ;?>



 <script>
function myFunction() {
  alert("Page is loaded");
}
</script>
<?php
  header('Location: slides.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>