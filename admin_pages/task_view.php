<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Task View</h1>
  <?php
  // Check connection
  @ $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  // Query to select all tasks
  $sql = "SELECT * FROM Task";
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Task ID: " . $row["TaskID"]. "<br>";
        echo "Task Name: " . $row["TaskName"]. "<br>";
        echo "Operation: " . $row["Operation"]. "<br>";
        echo "Description: " . $row["Description"]. "<br>";
        echo "Enabling Condition: " . $row["EnablingCondition"]. "<br>";
        echo "Frequency: " . $row["Frequency"]. "<br>";
        echo "Admin ID: " . $row["AdminID"]. "<br>";
        echo "Staff ID: " . $row["StaffID"]. "<br>";
        echo "Client ID: " . $row["ClientID"]. "<br>";
        echo "<br><hr>";
    }
  } else {
    echo "No tasks to show!";
  }

  // Close the connection
  $db->close();
  ?>
</body>
</html>