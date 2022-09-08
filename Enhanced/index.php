<?php 
        /** @var $pdo \PDO  */
        require_once 'database.php';

        $statement = $pdo->prepare('SELECT * FROM details ORDER BY created DESC');
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include_once 'views/partials/header.php'?>
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