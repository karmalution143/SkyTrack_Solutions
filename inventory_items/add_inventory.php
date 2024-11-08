<?php
    session_start();
    // get the data from the database
    $itemName = filter_input(INPUT_POST, 'itemName');
    $category = filter_input(INPUT_POST, 'category');
    $qtyInStock = filter_input(INPUT_POST, 'qtyInStock');

        if (!$itemName || !$category || !$qtyInStock) {

           $_SESSION["error_message"] = "Invalid data. Check all
               fields and try again.";

            header("Location: add_inventory_form.php");

            exit();
        } else {
          require_once('../model/database.php');

            $queryInsert = 'INSERT INTO inventory
                (itemName, category, qtyInStock)
                VALUES
                (:itemName, :category, :qtyInStock)';

            $statement = $db->prepare($queryInsert);
            $statement->bindValue(':itemName', $itemName);
            $statement->bindValue(':category', $category);
            $statement->bindValue(':qtyInStock', $qtyInStock);

            $statement->execute();
            $statement->closeCursor();

        }

        $url = "index.php";
        header("Location: " . $url);
        exit();
?>