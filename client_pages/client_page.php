<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client Page</title>
</head>

<body>
  <h1>Welcome, <?php echo $_SESSION['organization'] ?></h1>
  <h1>Select an option</h1>
  <button onclick='location.href = "./client_task_view.php"'>View Active Tasks</button>
  <button onclick='location.href = "./propose_feature.php"'>Propose a Feature</button>
  <button onclick='location.href = "./bug_report.php"'>Report a Bug</button>
</body>

</html>