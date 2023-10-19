<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
  $user_home->redirect('login.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userid= $row['userID'];
$userEmail=$row['userEmail'];
?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "lighthouse";
$conn = new mysqli($host, $username, $password, $database);

$hostname='localhost';
$username='root';
$password='';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lighthouse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
define('DB_DRIVER', 'mysql');
define('DB_PREFIX', 'em_');
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "lighthouse");

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
};


session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
  $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userid= $row['userID'];
$email=$row['userEmail'];
?>
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
define('DB_DRIVER', 'mysql');
define('DB_PREFIX', 'em_');
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "lighthouse");

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lighthouse";


?>





