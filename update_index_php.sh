new_content='<?php
    require('../model/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <title>TITLE HERE</title>
</head>
<body>
    <?php include("../view/header.php"); ?>
<main>
</main> 
    <?php include("../view/footer.php"); ?>
</body>
</html>'
for dir in */; do
  if [ -f "$dir/index.php" ]; then
    echo "$new_content" > "$dir/index.php"
    echo "Updated index.php in $dir"
  else
    echo "index.php does not exist in $dir"
  fi
done
