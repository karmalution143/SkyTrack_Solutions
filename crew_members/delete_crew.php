=<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once('../model/database.php');

  $crewID = filter_input(INPUT_POST, 'crewID', FILTER_VALIDATE_INT);

  if ($crewID) {

      $query = 'DELETE FROM crew_members
                WHERE crewID = :crewID';

      $statement = $db->prepare($query);
      $statement->bindValue(':crewID', $crewID);
      $statement-> execute();
      $statement-> closeCursor();

      $url = "index.php";
      header("Location: " . $url);
      die();
  } else {
    echo "Invalid crew ID.";
  }
?>