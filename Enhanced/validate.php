<?php    
    $title= $_POST['title'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    if(!$title){
        $errors[] = "Product Title Missing";

    }
    if(!$price){
        $errors[] = "Product Price Missing";}