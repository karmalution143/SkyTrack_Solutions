<?php
    session_start();

    $itemID = filter_input(INPUT_POST, 'itemID');
    $itemName = filter_input(INPUT_POST, 'itemName');
    $category = filter_input(INPUT_POST, 'category');
    $qtyInStock = filter_input(INPUT_POST, 'qtyInStock');

    // code to save to MySQL Database goes here
    // Validate inputs
    if (!$itemName || !$category || 
        !$qtyInStock) 
        {
            $_SESSION["add_error"] = "Invalid contact data. Check all
                fields and try again.";

            $url = "error.php";
            header("Location: " . $url);
            die();
        } else {
            require_once('../model/database.php');

            // Add the contact to the database
            $query = 'UPDATE inventory
                SET itemName = :itemName, 
                    category = :category, 
                    qtyInStock = :qtyInStock 
                    WHERE itemID = :itemID';


            $statement = $db->prepare($query);
            $statement->bindValue(':itemID', $itemID);
            $statement->bindValue(':itemName', $itemName);
            $statement->bindValue(':category', $category);
            $statement->bindValue(':qtyInStock', $qtyInStock);

            $statement-> execute();
            $statement->closeCursor();
        }

        $url = "index.php";
        header("Location: " . $url);
        die();
?>