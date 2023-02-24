<?php 
    require('Components/header.php');
    require('function.inc.php');
    $query = "select * from product ";
    $result = mysqli_query($conn, $query);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace | Home</title>
    
    <!-- CSS Style Sheets -->
    <link rel="stylesheet" href="CSS\header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <section class="home" id="home">
        <h2>New <span>Arrivals</span></h2>
    </section>
        
    <section class="categories" id="categories">
    <div class="box-container"> 
    <?php
     $get_product = get_product($conn, 'latest', 12);
    //  prx($get_product);
     foreach($get_product as $list){
    ?>  
        <div class="box">
            <img src="Product\<?php echo $list['product_image'] ?>" alt="<?php echo $list['product_name'] ?>">
            <h3><?php echo $list['product_name'] ?></h3>
            <h2>Price $:<?php echo $list['product_price'] ?></h2>
            <a href="product_detail.php?id=<?php echo $list['product_id'] ?>" class="btn">Buy Now</a>
        </div>
    
    <?php } ?>       
    </div>
    </section>

    <!-- footer  -->
    <?php include('Components/footer.php') ?>
  <script src="JavaScript\header_search_script.js"></script>    
</body>
</html>