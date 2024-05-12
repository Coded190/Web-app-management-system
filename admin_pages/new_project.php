<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['client_name']) && isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['organization']) && isset($_POST['role'])) {
    create_client($_POST['client_name'], $_POST['email'], $_POST['phone_number'], $_POST['organization'], $_POST['role']);
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
  <h1>Create a new project</h1>
  <form action="new_project.php" method="post">
    <label for="client_name">Client Name</label>
    <input type="text" name="client_name" id="client_name" required>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="phone">Phone</label>
    <input type="text" name="phone_number" id="phone" required>
    <br>
    <label for="organization">Organization</label>
    <input type="text" name="organization" id="organization" required>
    <br>
    <label for="role">Role</label>
    <input type="text" name="role" id="role" required>
    <br>
    <button type="submit">Create Project</button>
  </form>
</body>
</html>

<?php
function create_client($client_name, $email, $phone, $organization, $role)
{
  @$db = new mysqli('localhost', 'root', '', 'Web_dev_final_project');
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  $query = "INSERT INTO Client (ClientName, Email, Phone, Organization, Role) VALUES ('" . $client_name . "', '" . $email . "', '" . $phone . "', '" . $organization . "', '" . $role . "')";
  $result = $db->query($query);
  if ($result) {
    echo "Client created successfully!";
  } else {
    echo "Error creating client!";
  }

  $db->close();
}
?>