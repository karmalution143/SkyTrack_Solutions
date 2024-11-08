<?php
    require_once('../model/database.php');

    $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);

    $query = 'SELECT * FROM inventory WHERE itemID = :itemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();

    $queryCategory = 'SELECT DISTINCT category FROM inventory';
    $statement = $db->prepare($queryCategory);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../main.css" />
      <title>Item Manager</title>
  </head>
  <body>
      <?php include("../view/header.php"); ?>
      
      <main>
        <h2>View / Update Item Member</h2>

        <form action="update_item.php" method="post" id="add_item_form">
        <div id="data">

          <input type = "hidden" name = "itemID"
            value = "<?php echo $item['itemID']; ?>" />

          <label>Item Name:</label>
          <input type="text" name="itemName"
            value = "<?php echo $item['itemName']; ?>" /><br />

          <label>Category:</label>
          <select name="category" id="category" required>
              <option value="">Select a category</option>
              <?php foreach ($categories as $category): ?>
                  <option value="<?php echo $category['category']; ?>">
                  <?php echo $category['category']?>
                  </option>
              <?php endforeach; ?>
          </select><br />

          <label>Quantity In Stock:</label>
          <input type="text" name="qtyInStock"
            value = "<?php echo $item['qtyInStock']; ?>" /><br />
        
        <div id="buttons">
          <label>&nbsp;</label>
          <input type="submit" value="Save Item" /><br/>
        </div>

        </form>
        
        <p><a href="index.php">View Item List</a></p>
      </main>

      <?php include("../view/footer.php"); ?>
  </body>
</html>