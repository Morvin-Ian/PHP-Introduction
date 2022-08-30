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
        $title= $_POST['title'];
        $price = $_POST['price'];
        $date = date('Y-m-d H:i:s');
      
        if(!$title){
            $errors[] = "Product Title Missing";

        }
        if(!$price){
            $errors[] = "Product Price Missing";

        }

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Static/create.css">
    <title>Create</title>
</head>
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