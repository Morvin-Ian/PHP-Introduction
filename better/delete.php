<?php
        
  $id = $_POST['id'] ?? null;
 
   /** @var $pdo \PDO  */
  require_once 'database.php';

  if(!$id){
    header("Location:index.php");
    exit;
  }

  $statement = $pdo->prepare('DELETE FROM details WHERE id=:id');
  $statement->bindValue(':id',$id);  
  $statement->execute();
  header("Location:index.php");
 

?>
<?php include_once 'views/partials/header.php'?>