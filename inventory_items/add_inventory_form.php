
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../main.css" />
      <title>Inventory Manager - Add Inventory Member</title>
  </head>
  <body>
      <?php include("../view/header.php"); ?>
      
      <main>
        <h2>Add Inventory Member</h2>

        <div class="error_message">
          <?php
          session_start();
          $error = isset($_SESSION["error_message"]) ? $_SESSION["error_message"] : '';
          unset($_SESSION["error_message"]);
          echo $error;
          ?>
        </div>

        <form action="add_inventory.php" method="post" id="add_inventory_form">
        <div id="data">
          <label>Item Name:</label>
          <input type="text" name="itemName" /><br />

          <label>Catagory:</label>
          <input type="text" name="category" /><br />

          <label>QtyInStock:</label>
          <input type="text" name="qtyInStock" /><br />

          </div>
        
        <div id="buttons">
          <label>&nbsp;</label>
          <input type="submit" value="Save Inventory" /><br />
        </div>

        </form>
        
        <p><a href="index.php">View Inventory</a></p>
      </main>

      <?php include("../view/footer.php"); ?>
  </body>
</html>