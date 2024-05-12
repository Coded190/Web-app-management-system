<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if (!$username || !$password) {
   echo "You have not entered all the required details.<br />"
        ."Please go back and try again.";
   exit;
}

@ $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');

if (mysqli_connect_errno()) {
   echo "Error: Could not connect to database.  Please try again later.";
   exit;
}

$query = "select username, password, name from administrator where username = '".$username."' AND password = '".$password."'";
$result = $db->query($query);

if ($result) {
  if ($result->num_rows == 1)
  {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['name'] = $row['name'];
    header('Location: ../admin_pages/admin_page.php');
  } else {
    echo "User not found. Please check your information and try again.";
  }
} else {
    echo "An error has occurred. Please try again later.";
}

?>