<?php include 'database.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Static/style.css">
    <title>Home page</title>
</head>
<body>
    <h1>Product List</h1>
    <a href="create.php">Create New Product</a>
    <table>
        <thead>
        <?php
            if(empty($products)){
                echo "<br/>";
                echo '<h4>No products<h4/>';
                exit;
            }
               
            ?>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Date</th>
                <th>Action</th>
            
            </tr>
          
        </thead>
        <tbody>
    
        <?php foreach($products as $i => $product):?>
        
            <tr>
                <td> <?php echo $i +1 ?> </td>
                <td> <?php echo $product['title'] ?>  </td>
                <td> $<?php echo $product['price'] ?> </td>
                <td> <?php echo $product['created'] ?> </td>
                <td>
                    <a id="edit" href="update.php?id=<?php echo $product['id']?>">Edit</a>
                    <form style="display: inline-block;" method="POST" action="delete.php">
                        <input type="hidden" name=id value="<?php echo $product['id']?>" >
                        <button id="del"  type="submit">Delete</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>    

    
</body>
</html>