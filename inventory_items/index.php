<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require('../model/database.php');

    $queryInventory = 'SELECT * FROM inventory';
    $statement = $db->prepare($queryInventory);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <title>Inventory</title>
</head>
<body>
    <?php include("../view/header.php"); ?>
<main>
<p><a href="add_inventory_form.php">Add Inventory Item</a></p>
    <h2>Inventory Search</h2>
    
    <table>
        <tr>
        
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Category</th>
            <th>Quantity In Stock</th>
            <th>&nbsp;</th> <!-- for select button -->
        </tr>
        <?php foreach ($inventory as $item): ?>
        <tr>
            <td><?php echo $item['itemID']; ?></td>
            <td><?php echo $item['itemName']; ?></td>
            <td><?php echo $item['category']; ?></td>
            <td><?php echo $item['qtyInStock']; ?></td>
            <td>
                <form action="update_item_form.php" method="post">
                    <input type="hidden" name="itemID"
                    value="<?php echo $item['itemID']; ?>" />
                    <input type="submit" value="Select" />
                </form>
            </td>
            <td>
                <form action="delete_item.php" method="post">
                    <input type="hidden" name="itemID"
                    value="<?php echo $item['itemID']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>    
        </tr>
        <?php endforeach; ?>  
    </table>
    <form action="index.php" method="get">
        <input type="submit" value="Display All" />
    </form>
</main> 
    <?php include("../view/footer.php"); ?>
</body>
</html>
