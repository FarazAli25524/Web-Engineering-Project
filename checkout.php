<?php
        require('Components/header.php');
        require('function.inc.php');
        $total_price=0;
        $temp_price;
        $image_url = array();
        $product_name_list = array();
        $query = "select * from cart";
        $result = mysqli_query($conn, $query);
        $check=mysqli_num_rows($result);
        $count = $check;
        while($count > 0){
            $row = mysqli_fetch_assoc($result);
            $image_url[] = $row['cart_product_image']; 
            $product_name_list[] = $row['cart_product_title'];
            $temp_price = $row['cart_product_price'];
            $total_price += $temp_price;
            $count--;
        }
         
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace | Checkout</title>
    <!-- CSS Style Sheets -->
    <link rel="stylesheet" href="CSS\header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="Admin\assets\css\normalize.css">
      <link rel="stylesheet" href="Admin\assets\css\bootstrap.min.css">
      <link rel="stylesheet" href="Admin\assets\css\font-awesome.min.css">
      <link rel="stylesheet" href="Admin\assets\css\themify-icons.css">
      <link rel="stylesheet" href="Admin\assets\css\pe-icon-7-filled.css">
      <link rel="stylesheet" href="Admin\assets\css\flag-icon.min.css">
      <link rel="stylesheet" href="Admin\assets\css\cs-skin-elastic.css">
      <link rel="stylesheet" href="Admin\assets\css\style.css">
</head>
<body>
    <section class="home" id="home">
        <h1 class="heading">
             <span>
                Payment Checkout
            </span>
        </h1>
    </section>
    
    <section class="checkout" id="checkout">
        <div class="box-container">
            <div class="box-card">
                <div class="card-header">
                    <div class="card-left-panel">
                        <?php foreach($image_url as $url){?>
                        <img src="Product/<?php echo $url ?>" alt="" srcset="">
                        <?php } ?>
                    </div>
                    <div class="card-right-panel">
                    <div class="card-title">
                            <h3>Product Details</h3>
                        </div>
                        <div class="card-description">
                            <h2>Select items:</h2>
                            <h2>
                                <?php foreach($product_name_list as $name){?>
                                
                                    <span>-<?php echo $name;?><span><br>
                                
                                <?php } ?>
                                <br>
                            </h2>

                            <h2>Price: $ <?php echo $total_price; ?></h2>
                            <h2>Avalability: In Stock </span></h2>
                        </div>
                            <a class="btn" href="Cart.php">Place Order</a>
                    </div>
                </div>
                <div class="card-footer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48099.84385439718!2d50.024057437714596!3d26.357494328191645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e361d5e7da959e7%3A0xfc972e961dbfb74e!2z2LTYp9mE2YrZh9in2Kog2KfYsdmK2KfZhQ!5e0!3m2!1sen!2s!4v1676113835562!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg"></iframe>
                </div>
            </div>
        </div>
    </section>
   
    <!-- footer  -->
   <?php include('Components/footer.php') ?>
  <script src="JavaScript\header_search_script.js"></script>    
</body>
</html>