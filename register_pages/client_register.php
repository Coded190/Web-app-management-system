<?php
session_start();
$name = $_POST['name'];
$username = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['organization'];
$role = $_POST['role'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'Web_dev_final_project';

if (!$username || !$password || !$email || !$name || !$role) {
    echo "You have not entered all the required details.<br />"
         ."Please go back and try again.";
    exit;
}

@ $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

$query = "select Email from Client where Email = '".$email."'";

$result = $db->query($query);

if ($result->num_rows == 1) {
    echo "User already exists. Please try again.";
    exit;
}
else {
    $query = "INSERT INTO Client (ClientName, Email, Phone, Organization, Role) VALUES ('".$name."', '".$email."', '".$username."', '".$password."', '".$role."')";
    $db->query($query);
    echo "User successfully created. Please login to continue.";
}






