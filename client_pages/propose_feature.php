<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['type'])) {
    submit_feature_req($_POST['title'], $_POST['description'], $_POST['type']);
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
  <h1>Propose a Feature</h1>
  <p>Fill out the form below to propose a new feature or enhancement.</p>
  <form action="propose_feature.php" method="post">
    <label for="title">Feature Title</label>
    <br>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="description">Feature Description</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10" required></textarea>
    <br>
    <label for="type">Feature Type</label>
    <br>
    <select name="type" id="type" required>
      <option value="New Feature">New Feature</option>
      <option value="Enhancement">Enhancement</option>
      <option value="Other">Other</option>
    </select>
    <br>
    <button type="submit">Submit</button>
  </form>
</body>

</html>

<?php
function submit_feature_req($title, $description, $type)
{
  @$db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  $query = "INSERT INTO SupportProposal (ProposalTitle, SubmissionDate, Type, Description, ClientID) VALUES ('" . $title . "', '" . date('Y-m-d') . "', '" . $type . "', '" . $description . "', '" . $_SESSION['client_id'] . "')";
  $result = $db->query($query);
  if ($result) {
    echo "Feature request submitted successfully!";
  } else {
    echo "Error submitting feature request!";
  }

  $db->close();
}
?>