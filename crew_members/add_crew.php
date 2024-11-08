<?php
    session_start();
    // get the data from the database
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $position = filter_input(INPUT_POST, 'position');
    $certification = filter_input(INPUT_POST, 'certification');

        if (!$firstName || !$lastName || !$position) {

            $_SESSION["error_message"] = "Invalid data. Check all
                fields and try again.";

            header("Location: add_crew_form.php");

            exit();
        } else {
          require_once('../model/database.php');

            $queryInsert = 'INSERT INTO crew_members
                (firstName, lastName, position, certification)
                VALUES
                (:firstName, :lastName, :position, :certification)';

            $statement = $db->prepare($queryInsert);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':position', $position);
            $statement->bindValue(':certification', $certification);

            $statement->execute();
            $statement->closeCursor();

        }

        $url = "index.php";
        header("Location: " . $url);
        exit();
?>