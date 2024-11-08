<?php
  require_once('../model/database.php');

  $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);

  if ($itemID) {

      $query = 'DELETE FROM inventory
                WHERE itemID = :itemID';

      $statement = $db->prepare($query);
      $statement->bindValue(':itemID', $itemID);
      $statement-> execute();
      $statement-> closeCursor();

      $url = "index.php";
      header("Location: " . $url);
      die();
  } else {
    echo "Invalid item ID.";
  }
?>