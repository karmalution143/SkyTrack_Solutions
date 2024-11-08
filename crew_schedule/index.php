<?php
require_once('../model/database.php');

// Fetch crew members
$query = 'SELECT crewID, lastName FROM crew_members';
$statement = $db->prepare($query);
$statement->execute();
$crew_members = $statement->fetchAll();
$statement->closeCursor();

// Define shifts (for example purposes, we'll assign shifts in a round-robin fashion)
$shifts = ['morning', 'afternoon', 'night'];

// Get the current date or use a specific date
$schedule_date = date('Y-m-d'); // Today's date
$shift_count = count($shifts);

// Display the dynamically generated schedule
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <title>Dynamic Crew Schedule</title>
</head>
<body>
    <?php include("../view/header.php"); ?>

    <main>
        <h2>Crew Schedule for <?php echo $schedule_date; ?></h2>
        <table>
            <tr>
                <th>Crew Member ID</th>
                <th>Last Name</th>
                <th>Shift</th>
                <th>Date</th>
            </tr>

            <!-- Loop through the crew members and assign shifts dynamically -->
            <?php foreach ($crew_members as $index => $member): ?>
                <tr>
                    <td><?php echo htmlspecialchars($member['crewID']); ?></td>
                    <td><?php echo htmlspecialchars($member['lastName']); ?></td>
                    <td><?php echo htmlspecialchars($shifts[$index % $shift_count]); ?></td>
                    <td><?php echo htmlspecialchars($schedule_date); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <?php include("../view/footer.php"); ?>
</body>
</html>
