<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../main.css" />
      <title>Crew Manager - Add Crew Member</title>
  </head>
  <body>
      <?php include("../view/header.php"); ?>
      
      <main>
        <h2>Add Crew Member</h2>

        <div class="error_message">
          <?php 
          session_start();
          if ($error = isset($_SESSION["error_message"]) ? $_SESSION["error_message"] : '') {
          unset($_SESSION["error_message"]);
          echo $error;
          }
          ?>
        </div>

        <form action="add_crew.php" method="post" id="add_crew_form">
        <div id="data">
          <label>First Name:</label>
          <input type="text" name="firstName" /><br />

          <label>Last Name:</label>
          <input type="text" name="lastName" /><br />

          <label>Position:</label>
          <input type="text" name="position" /><br />

          <label>Certification:</label>
          <input type="text" name="certification" /><br />

          </div>
        
        <div id="buttons">
          <label>&nbsp;</label>
          <input type="submit" value="Save Crew Member" /><br />
        </div>

        </form>
        
        <p><a href="index.php">View Crew Members</a></p>
      </main>

      <?php include("../view/footer.php"); ?>
  </body>
</html>