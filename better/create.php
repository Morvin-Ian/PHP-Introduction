<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=Products','root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

    $errors = [];
    $title = '';
    $price = '';
  

    
   if($_SERVER['REQUEST_METHOD']==='POST'){
       require_once 'validate.php';

       if(empty($errors)){
            
            $statement = $pdo->prepare("INSERT INTO details (title, price, created) 
            VALUES( :title, :price, :date)");

            $statement->bindValue(':title',$title);            
            $statement->bindValue(':price',$price);  
            $statement->bindValue(':date',$date);  
            $statement->execute();
            header("Location:index.php");
       }
     
   }
?>

<?php include_once 'views/partials/header.php'?>

<body>
    <h1>Create New Product</h1>

    <?php foreach ($errors as $error):?>
            <div class="err"> <?php echo $error; ?> </div>
    <?php endforeach;?>
  

    <form action="" method="post" enctype="multipart/form-data">
    
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $title?>" placeholder="Product Title"> <br>
        <label for="price">Price</label>
        <input type="number" name="price" value="<?php echo $price?>" placeholder="Price"> <br>
        <input id="submit" id="del" type="submit" name="submit" value="submit">
    </form>
    
</body>
</html> 