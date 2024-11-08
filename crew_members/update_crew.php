<?php
    session_start();

    $crewID = filter_input(INPUT_POST, 'crewID', FILTER_VALIDATE_INT);
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
    $certification = filter_input(INPUT_POST, 'certification', FILTER_SANITIZE_STRING);


    // code to save to MySQL Database goes here
    // Validate inputs
    if (!$firstName || !$lastName || !$position) {
        $_SESSION["add_error"] = "Invalid contact data. Check all
            fields and try again.";

        $url = "error.php";
        header("Location: " . $url);
        die();
    } else {
        require_once('../model/database.php');

        // Add the contact to the database
        $query = 'UPDATE crew_members
            SET firstName = :firstName, 
                lastName = :lastName, 
                position = :position,
                certification = :certification 
                WHERE crewID = :crewID';


        $statement = $db->prepare($query);
        $statement->bindValue(':crewID', $crewID);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':position', $position);
        $statement->bindValue(':certification', $certification);

        $statement-> execute();
        $statement->closeCursor();
    }

        $url = "index.php";
        header("Location: " . $url);
        exit();
?>