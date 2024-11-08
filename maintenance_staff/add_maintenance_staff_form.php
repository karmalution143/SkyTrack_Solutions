<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../main.css" />
  <title>Maintenance Manager</title>
</head>
<body>
  <?php include("../view/header.php"); ?>

  <main>
    <h2>Add Maintanence Staff</h2>

    <div class="error_message">
          <?php 
          session_start();
          if ($error = isset($_SESSION["error_message"]) ? $_SESSION["error_message"] : '') {
          unset($_SESSION["error_message"]);
          echo $error;
          }
          ?>
          </div>

          <form action="add_maintenance.php" method="post" id="add_maintenance_form">
            <div id="data">

            <label>First Name:</label>
            <input type="text" name="firstName" /><br />

            <label>Last Name:</label>
            <input type="text" name="lastName" /><br />
</body>
</html>