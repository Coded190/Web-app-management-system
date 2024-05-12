<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bug_title = $_POST['bug_title'];
  $bug_description = $_POST['bug_description'];
  $bug_priority = $_POST['bug_priority'];
  $client_id = $_POST['client_id'];

  file_bug($bug_title, $bug_description, $bug_priority, $client_id);
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
  <h1>Report a bug</h1>
  <h3>Found a bug in your application? Report it here and our admins will create a task for it.</h3>
  <form action="bug_report.php" method="post">
    <input type="hidden" name="client_id" value="<?php echo $_SESSION['client_id'] ?>">
    <label for="bug_title">Bug Title</label>
    <br>
    <input type="text" name="bug_title" id="bug_title">
    <br>
    <label for="bug_description">Bug Description</label>
    <br>
    <textarea name="bug_description" id="bug_description" cols="30" rows="10"></textarea>
    <br>
    <label for="bug_priority">Priority</label>
    <br>
    <select name="bug_priority" id="bug_priority">
      <option value="low">Low</option>
      <option value="medium">Medium</option>
      <option value="high">High</option>
    </select>
    <button type="submit">Submit</button>
  </form>
</body>

</html>

<?php
function file_bug($bug_title, $bug_description, $bug_priority, int $client_id)
{
  @$db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');
  if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database. Please try again later.';
    exit;
  }

  echo $bug_title . ' '. $bug_description .' '. $bug_priority . ' ' . $client_id;
  $query = "INSERT INTO bug(bugtitle, bugdescription, priority, clientid) VALUES ('".$bug_title."', '".$bug_description."', '".$bug_priority."', '".$client_id."')";
  $result = $db->query($query);
  if ($result) {
    echo "Bug filed successfully.";
    header("location: ./client_page.php");
  } else {
    echo "An error occured. Please try again later.";
  };
  $db->close();
}
?>