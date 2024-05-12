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
  <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
  <h1>Select an option</h1>
  <!-- <button onclick='location.href = "./system_monitoring.php"'>System Monitoring</button>
  <button onclick='location.href = "./access_and_security.php"'>System Access & Security Settings</button>
  <button onclick='location.href = "./applications.php"'>Integration of Applications</button>
  <button onclick='location.href = "./billing_and_invoices.php"'>Billing & Invoices</button> -->
  <button onclick='location.href = "./new_task.html"'>Configure New Task</button>
  <button onclick='location.href = "./feature_proposals.php"'>Review/Approve Feature Proposals</button>
  <button onclick='location.href = "./task_view.php"'>View Tasks</button>
  <button onclick='location.href = "./bug_reports.php"'>View Bug Reports</button>
  <button onclick='location.href = "./new_project.php"'>Create a New Project</button>
</body>
</html>