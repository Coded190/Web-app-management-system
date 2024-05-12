<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['bug_id'])) {
    clear_bug($_POST['bug_id']);
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
  <h1>Bug Reports Submitted by Client</h1>
  <?php
  $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');

  // Check connection
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  // Query to select all bug reports
  $sql = "SELECT * FROM Bug";
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "Bug ID: " . $row["BugID"] . "<br>";
      echo "Bug Title: " . $row["BugTitle"] . "<br>";
      echo "Bug Description: " . $row["BugDescription"] . "<br>";
      echo "Priority: " . $row["Priority"] . "<br>";
      echo "Client ID: " . $row["ClientID"] . "<br>";
      ?>
      <form action="./bug_reports.php" method="post">
        <input type="hidden" name="bug_id" value="<?php echo $row['BugID']; ?>">
        <!-- In the future, it would be nice to auto-create a task from a bug report. -->
        <button type="submit">Acknowledge</button>
      </form>
      <?php
      echo "<br><hr>";
    }
  } else {
    echo "No bugs to display!";
  }

  // Close the connection
  $db->close();

  ?>
</body>

</html>

<?php
function clear_bug($bug_id)
{
  $db = new mysqli("localhost", "root", "", "Web_dev_final_project");

  if ($db->connect_error) {
    die("" . $db->connect_error);
  }
  $query = "DELETE FROM Bug WHERE BugID = $bug_id";
  $result = $db->query($query);

  if ($result) {
    echo "Bug has been cleared!";
  } else {
    echo "An error has occurred. Please try again later.";
  }

  $db->close();
}
?>