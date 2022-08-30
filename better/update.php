<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $id = $_GET['id'] ?? null;
 

    require_once 'database.php';


    $statement = $pdo->prepare('SELECT * FROM details WHERE id=:id');
    $statement->bindValue(':id',$id);  
    $statement->execute();
    $product = $statement->fetchAll(PDO::FETCH_ASSOC);




    $errors = [];
    $title = $product[0]['title'];
    $price = $product[0]['price'];


    if($_SERVER['REQUEST_METHOD']==='POST'){
        require_once 'validate.php';

        if(empty($errors)){
        
            $statement = $pdo->prepare("UPDATE details SET title= :title, price= :price WHERE id= :id");

            $statement->bindValue(':title',$title);            
            $statement->bindValue(':price',$price);
            $statement->bindValue(':id',$id);    
            $statement->execute();

            header("Location:index.php");
   }
 
}

?>

<?php include_once 'views/partials/header.php'?>

<body>
    
    <h1> Update <?php echo $title?> </h1>

    <?php foreach ($errors as $error):?>
            <div class="err"> <?php echo $error; ?> </div>
    <?php endforeach;?>


    <form action="" method="post" >

        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $title?>" placeholder="Product Title"> <br>
        <label for="price">Price</label>
        <input type="number" name="price" value="<?php echo $price?>" placeholder="Price"> <br>
        <input id="submit" id="del" type="submit" name="submit" value="submit">
    </form>

</body>
</html>