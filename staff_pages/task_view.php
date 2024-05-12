<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  debug_to_console("Resolving task...");
  if (isset($_POST['resolve_task'])) {
    resolveTask($_POST['task_id']);
  }
}
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
  $sql = "SELECT * FROM Task WHERE StaffID = '".$_SESSION['staff_id']."'";
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
        ?>
        <html>
          <form method='post'>
            <input type='hidden' name='task_id' value='<?php echo $row["TaskID"]; ?>'>
          <button type='submit' name='resolve_task'>Resolve Task</button>
          </form>
        </html>
        <?php
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

<?php
function resolveTask($task_id) {
  // Check connection
  @ $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  // Query to delete task
  $sql = "DELETE FROM Task WHERE TaskID = '".$task_id."'";
  $result = $db->query($sql);
  if ($result) {
    echo "Task resolved successfully.";
  } else {
    echo "An error has occurred. Please try again later.";
  }
  $db->close();
}

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>