<?php
  require('connection.inc.php');
  $cat_res = mysqli_query($conn, "select * from category where category_status=1");
  $cart_res = mysqli_query($conn, "select * from cart");
  
  $cat_arr = array();
  $cart_arr = array();
  while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[] = $row;
  }
  while($row=mysqli_fetch_assoc($cart_res)){
    $cart_arr[] = $row;
  }
  $totalprice=0;
?>

<!-- Start Header -->
<header class="header">
  <a href="index.php" class="logo">
    <i class="fas fa-shopping-basket"></i> Marketplace
  </a>
  <nav class="navbar">
    <a href="index.php">home</a>
    <?php
      foreach($cat_arr as $list){
        ?>
          <a href="category.php?id=<?php echo $list['category_id']?>"><?php  echo $list['category_name']?></a>
        <?php
      }
    ?>
    <a href="about.php">Contact Us</a>
  </nav>
  <div class="icons">
    <div class="fas fa-bars" id="menu-btn"></div>
    <div class="fas fa-search" id="search-btn"></div>
    <div class="fas fa-shopping-cart" id="cart-btn"></div>
    <div class="fas fa-user" id="login-btn"></div>
  </div>

  <form action="" class="search-form">
    <input
      type="search"
      name="search-value"
      id="search-box"
      placeholder="search here..."
    />
    <label for="search-box" class="fas fa-search"></label>
  </form>

  <div class="shopping-cart">
  <?php
      foreach($cart_arr as $list){       
        ?>
    <div class="box">
      <a class="fas fa-trash" href="delete_product.php?id=<?php echo $list['cart_id']?>"></a>
      <img src="Product\<?php echo $list['cart_product_image']?>" alt="<?php echo $list['cart_product_title']?>" />
      <div class="content">
        <h3><?php echo $list['cart_product_title']?></h3>
        <span class="price">Price $<?php echo $list['cart_product_price']?><br></span>
        <span class="price">Avalability : In Stock</span>
      </div>
    </div>
    <?php
      $totalprice += $list['cart_product_price'];
      }
     ?>
    <div class="total">total : $<?php echo $totalprice?></div>
    <a href="checkout.php" class="btn">checkout</a>
  </div>
</header>
<!-- End Header -->
