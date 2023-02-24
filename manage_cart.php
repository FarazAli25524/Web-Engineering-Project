<?php
        require('Components/header.php');
        require('function.inc.php');
        $product_id = mysqli_real_escape_string($conn, $_GET['id']);
        $get_product = get_product($conn, 'latest', '', '', $product_id);
        $pr_title = $get_product[0]['product_name'];
        $pr_image = $get_product[0]['product_image']; 
        $pr_price = $get_product[0]['product_price'];
        
        $query = "insert into cart (cart_product_image, cart_product_title, cart_product_price) values ('$pr_image', '$pr_title','$pr_price')";

        if(mysqli_query($conn, $query)){
            header('location: index.php');
        }
        else{
            echo "Not Working.";
        }
?>