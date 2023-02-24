<!-- PHP -->
<?php
   require('connection.inc.php');
   require('function.inc.php'); 
   if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != ''){

   }
   else{
      header('location: login.php'); 
      die();
   }  
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Marketplace | Dashboard - Admin</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="Admin\assets\css\normalize.css">
      <link rel="stylesheet" href="Admin\assets\css\bootstrap.min.css">
      <link rel="stylesheet" href="Admin\assets\css\font-awesome.min.css">
      <link rel="stylesheet" href="Admin\assets\css\themify-icons.css">
      <link rel="stylesheet" href="Admin\assets\css\pe-icon-7-filled.css">
      <link rel="stylesheet" href="Admin\assets\css\flag-icon.min.css">
      <link rel="stylesheet" href="Admin\assets\css\cs-skin-elastic.css">
      <link rel="stylesheet" href="Admin\assets\css\style.css">
      <link rel="stylesheet" href="CSS\header.css"
      
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-light">
    <!-- Start Aside Panel -->
    <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" > Categories</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="product.php" > Product</a>
                  </li>
				      <li class="menu-item-has-children dropdown">
                     <a href="order.php" > Order</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="user.php" > User</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="contact.php" > Contact Us</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
    <!-- End Aside Panel -->
    <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a href="index.php" class="logo"><i class="fas fa-shopping-basket"></i> Marketplace</a>
                  <a class="navbar-brand hidden" href="index.html"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle icons"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
 