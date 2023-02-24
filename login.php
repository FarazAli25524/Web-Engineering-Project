<!-- PHP -->
<?php
include('Components\header.php');
   require('function.inc.php');
   $msg = '';
   if(isset($_POST['submit'])){;
      $username = get_safe_value($conn, $_POST['username']);
      $password = get_safe_value($conn, $_POST['password']);
      $result = mysqli_query($conn, "select user_name from user where user_name='$username' and user_password='$password'");
      $res = mysqli_fetch_assoc($result);
      if($res['user_name']==$username){
         $_SESSION['USERNAME'] = $username;
         header('location: index.php');
      }
      else{
         $query = "select * from administration where admin_username='$username' and admin_password='$password'";
         $result = mysqli_query($conn, $query);
         $count = mysqli_num_rows($result);
         if($count){
            $_SESSION['ADMIN_LOGIN'] = 'yes';
            $_SESSION['ADMIN_USERNAME'] = $username;
            header('location: categories.php'); 
            die();
         }else{
            $msg="Wrong Credentials";
         }
      }
   }
?>
<!doctype html>
<html class="no-js" lang="en-fr">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Marketplace | Sign In</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="Admin\assets\css\normalize.css">
      <link rel="stylesheet" href="Admin\assets\css\bootstrap.min.css">
      <link rel="stylesheet" href="Admin\assets\css\font-awesome.min.css">
      <link rel="stylesheet" href="Admin\assets\css\themify-icons.css">
      <link rel="stylesheet" href="Admin\assets\css\pe-icon-7-filled.css">
      <link rel="stylesheet" href="Admin\assets\css\flag-icon.min.css">
      <link rel="stylesheet" href="Admin\assets\css\cs-skin-elastic.css">
      <link rel="stylesheet" href="Admin\assets\css\style.css">
      <link rel="stylesheet" href="CSS\header.css">
      
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-light">
      <?php ?>
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form action="" method="POST">
                     <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" id="username" required>
                     </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                     </div>
                     <?php echo $msg; ?>
                     <button type="submit" name="submit" class="btn btn-outline-warning">Sign in</button>
                     <a href="signup.php" name="register" class="btn btn-outline-warning">Sign Up</a>
					</form>
               </div>
            </div>
         </div>
      </div>
      <?php include('Components\footer.php');?>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>