<?php
    require_once('../model/database.php');

    $crewID = filter_input(INPUT_POST, 'crewID', FILTER_VALIDATE_INT);

    $query = 'SELECT * FROM crew_members WHERE crewID = :crewID';
    $statement = $db->prepare($query);
    $statement->bindValue(':crewID', $crewID);
    $statement->execute();
    $crew = $statement->fetch();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../main.css" />
      <title>Crew Manager</title>
  </head>
  <body>
      <?php include("../view/header.php"); ?>
      
      <main>
        <h2>View / Update Crew Member</h2>

        <form action="update_crew.php" method="post" id="add_crew_form">
        <div id="data">

          <input type = "hidden" name = "crewID"
            value = "<?php echo $crew['crewID']; ?>" />

          <label>First Name:</label>
          <input type="text" name="firstName"
            value = "<?php echo $crew['firstName']; ?>" /><br />

          <label>Last Name:</label>
          <input type="text" name="lastName"
            value = "<?php echo $crew['lastName']; ?>" /><br />

          <label>Position:</label>
          <input type="text" name="position"
            value = "<?php echo $crew['position']; ?>" /><br />
        
          <label>Certification:</label>
          <input type="text" name="certification"
            value = "<?php echo $crew['certification']; ?>" /><br />
        
        <div id="buttons">
          <label>&nbsp;</label>
          <input type="submit" value="Save Crew Member" /><br/>
        </div>

        </form>
        
        <p><a href="index.php">View Crew List</a></p>
      </main>

      <?php include("../view/footer.php"); ?>
  </body>
</html>