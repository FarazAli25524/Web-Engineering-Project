<?php
        require('Components/header.php');
        require('function.inc.php');
        $product_id = mysqli_real_escape_string($conn, $_GET['id']);
        $get_product = get_product($conn, 'latest', '', '', $product_id);
         
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace | <?php echo $get_product['0']['product_name'] ?></title>
    <!-- CSS Style Sheets -->
    <link rel="stylesheet" href="CSS\header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <section class="home" id="home">
        <h1 class="heading">
             <span>
                Product Details
            </span>
        </h1>
    </section>
    
    <section class="product" id="# product">
        <div class="box-container">
            <div class="box-card">
                <div class="card-header">
                    <div class="card-left-panel">
                        <img src="Product\<?php echo $get_product['0']['product_image'] ?>" alt="">
                    </div>
                    <div class="card-right-panel">
                        <div class="card-title">
                            <h3><?php echo $get_product['0']['product_name'] ?></h3>
                        </div>
                        <div class="card-description">
                            <h2>MRP: $<span><?php echo $get_product['0']['product_mrp'] ?></span> </h2>
                            <h2>Price: $<?php echo $get_product['0']['product_price'] ?></h2>
                            <h2>Avalability: In Stock </span></h2>
                        </div>
                        <div class="card-button">
                            <?php if($get_product['0']['product_mrp']!=0){?>
                            <a class="btn disable"  href="checkout.php">Buy Now</a>
                            <a class="btn" href="manage_cart.php?id=<?php echo $product_id?>" style="disable">Add to Cart</a>

                            <?php } else{ ?>
                            <a class="btn disable" href="">Buy Now</a>
                            <a class="btn disable" href="" style="disable">Add to Cart</a>
                            <?php } ?>   
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h2>Description</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem<br><br></p>
                    <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>

                    <h2>Standard Description</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- footer  -->
   <?php include('Components/footer.php') ?>
  <script src="JavaScript\header_search_script.js"></script>    
</body>
</html>