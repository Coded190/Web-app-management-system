<?php
session_start();

$email = $_POST['email'];
$phone_num = $_POST['phone_num'];

if (!$email || !$phone_num) {
   echo "You have not entered all the required details.<br />"
        ."Please go back and try again.";
   exit;
}

@ $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');

if (mysqli_connect_errno()) {
   echo "Error: Could not connect to database.  Please try again later.";
   exit;
}

$query = "select email, phone, clientname, clientid, organization from client where email = '".$email."' AND phone = '".$phone_num."'";
$result = $db->query($query);

if ($result) {
  if ($result->num_rows == 1)
  {
    $row = $result->fetch_assoc();
    $_SESSION['client_name'] = $row['clientname'];
    $_SESSION['client_id'] = $row['clientid'];
    $_SESSION['organization'] = $row['organization'];
    header('Location: ../client_pages/client_page.php');
  } else {
    echo "User not found. Please check your information and try again.";
  }
} else {
    echo "An error has occurred. Please try again later.";
}

?>