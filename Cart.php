<?php
    require('connection.inc.php');
    require('function.inc.php');
    $product_stock;
    $query = "select cart_product_title from cart";
    $result = mysqli_query($conn, $query);
    date_default_timezone_set('Asia/Kolkata');
    $date =date('d-m-y h:i:s');
    $cart_arr = array();
    while($row=mysqli_fetch_assoc($result)){
        $cart_arr[] = $row;
    }

    foreach($cart_arr as $list){
        $value = $list['cart_product_title'];
        $product_stock_result = mysqli_query($conn,"select product_stock from product where product_name='$value'");
        $product_stock_column =  mysqli_fetch_assoc($product_stock_result);
        $product_stock = $product_stock_column['product_stock'];
        $product_stock -= 1;
        mysqli_query($conn, "insert into orders (orders_name, orders_added_on) values ('$value', '$date')") ;
        mysqli_query($conn, "update product set product_stock='$product_stock' where product_name='$value'");
    }
    mysqli_query($conn, "delete from cart");
    header('location: index.php');
?>