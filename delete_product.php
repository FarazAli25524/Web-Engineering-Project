<?php
    require('function.inc.php');
    require('connection.inc.php');
    $cat_id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "delete from cart where cart_id='$cat_id'";
    if(mysqli_query($conn, $query)){
        header('location: index.php');
    }
    else{
        echo "product not deleted from cart";
    }
?>