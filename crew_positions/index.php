<?php
require_once('../model/database.php');

$queryPositions = 'SELECT * FROM crew_positions';
$statement = $db->prepare($queryPositions);
$statement->execute();
$positions = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <title>Crew Positions</title>
</head>
<body>
    <?php include("../view/header.php"); ?>

    <main>
        <h2>Crew Positions</h2>
        <table>
            <tr>
                <th>Position</th>
                <th>Description</th>
                <th>Certification Type</th>
                <th>Certification Description</th>
            </tr>

            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?php echo htmlspecialchars($position['position']); ?></td>
                    <td><?php echo htmlspecialchars($position['description']); ?></td>
                    <td><?php echo htmlspecialchars($position['certType']); ?></td>
                    <td><?php echo htmlspecialchars($position['certDescription']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <?php include("../view/footer.php"); ?>
</body>
</html>
