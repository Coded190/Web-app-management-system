<?php

$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];
$operation = $_POST['operation'];
$enabling_condition = $_POST['enabling_condition'];
$frequency = $_POST['frequency'];
$admin_id = $_POST['admin_id'];
$staff_id = $_POST['staff_id'];
$client_id = $_POST['client_id'];

// The html form has everything required, so I shouldn't need to check here.
@ $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

$query = "INSERT INTO Task(taskname, operation, description, enablingcondition, frequency, adminid, staffid, clientid) VALUES ('".$task_name."', '".$operation."', '".$task_description."', '".$enabling_condition."', '".$frequency."', '".$admin_id."', '".$staff_id."', '".$client_id."')";
$result = $db->query($query);

if ($result) {
    echo "Task added successfully.";
} else {
    echo "An error has occurred. Please double check your information or try again later.";
}
?>