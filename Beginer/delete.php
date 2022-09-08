<?php
        
  $id = $_POST['id'] ?? null;
 

  $pdo = new PDO('mysql:host=localhost;port=3307;dbname=Products', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(!$id){
    header("Location:index.php");
    exit;
  }

  $statement = $pdo->prepare('DELETE FROM details WHERE id=:id');
  $statement->bindValue(':id',$id);  
  $statement->execute();
  header("Location:index.php");
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    
</body>
</html>