<?php 

    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=Products', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $statement = $pdo->prepare('SELECT * FROM details ORDER BY created DESC');
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
  
?>