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
  <?php
  @ $db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  // Query to select all feature proposals
  $query = "SELECT * FROM SupportProposal";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "Proposal ID: " . $row["ProposalID"] . "<br>";
      echo "Proposal Title: " . $row["ProposalTitle"] . "<br>";
      echo "Submission Date: " . $row["SubmissionDate"] . "<br>";
      echo "Type: " . $row["Type"] . "<br>";
      echo "Description: " . $row["Description"] . "<br>";
      echo "Client ID: " . $row["ClientID"] . "<br>";
      echo "<br><hr>";
    }
  } else {
    echo "0 results";
  }

  // Close the connection
  $db->close();
  ?>
</body>

</html>