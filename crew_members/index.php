<?php
    require('../model/database.php');

    $queryCrew = 'SELECT * FROM crew_members';
    $statement = $db->prepare($queryCrew);
    
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);

    switch (true) {
        case ($lastName):
      $queryCrew = 'SELECT * FROM crew_members WHERE lastName = :lastName';
      $statement = $db->prepare($queryCrew);
      $statement->bindValue(':lastName', $lastName);
    break;

    default:
      $queryCrew = 'SELECT * FROM crew_members';
      $statement = $db->prepare($queryCrew);
    }

    $statement->execute();
    $crew_members = $statement->fetchAll();
    $statement->closeCursor();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <title>Customer List</title>
</head>
<body>
    <?php include("../view/header.php"); ?> 
    <main>
    <p><a href="add_crew_form.php">Add Crew Member</a></p>
      <h2>Crew Member Search</h2>

      <form action="" method="post">
          <input type="text" name="lastName" placeholder="Enter last name" required />
          <input type="submit" value="Search" />
      </form>
      
      <table>
        <tr>
        <h2>Results</h2>
            <th>CrewID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Certification</th>
            <th>&nbsp;</th> <!-- for select button -->
        </tr>
        <?php foreach ($crew_members as $crew): ?>
        <tr>
            <td><?php echo $crew['crewID']; ?></td>
            <td><?php echo $crew['firstName']; ?></td>
            <td><?php echo $crew['lastName']; ?></td>
            <td><?php echo $crew['position']; ?></td>
            <td><?php echo $crew['certification']; ?></td>
            <td>
                <form action="update_crew_form.php" method="post">
                    <input type="hidden" name="crewID"
                    value="<?php echo $crew['crewID']; ?>" />
                    <input type="submit" value="Update" />
                </form>
            </td>
            <td>
                <form action="delete_crew.php" method="post">
                    <input type="hidden" name="crewID"
                    value="<?php echo $crew['crewID']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>    
         </tr>
        <?php endforeach; ?>  
      </table>
            <form action="index.php" method="get">
                <input type="submit" value="Show All" />
            </form>
    </main>
    <?php include("../view/footer.php"); ?>
</body>
</html>