<!-- PHP -->
<?php 
   include('Components\header.php');
      
   require('function.inc.php');
   $msg = '';
   if(isset($_POST['submit'])){;
      $username = get_safe_value($conn, $_POST['username']);
      $useremail = get_safe_value($conn, $_POST['useremail']);
      $usermobile = get_safe_value($conn, $_POST['usermobile']);
      $userpassword = get_safe_value($conn, $_POST['password']);
      date_default_timezone_set('Asia/Kolkata');
      $user_added_on =date('d-m-y h:i:s');
      if(mysqli_query($conn, "insert into user (user_name, user_email, user_password, user_mobile, user_added_on) values ('$username', '$useremail', '$userpassword', '$usermobile', '$user_added_on')")){
        header('location: login.php');
        die();
      }
      else{
        echo "Not working";
      }
   }
?>
<!doctype html>
<html class="no-js" lang="en-fr">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Marketplace | Sign Up</title>
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
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
         <h1 class="heading mt-5">
             <span>
                User SignUp
            </span>
        </h1>
            <div class="login-content">
               <div class="login-form">
                  <form action="" method="POST">
                     <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" id="username" required>
                     </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="useremail" class="form-control" placeholder="Email address" id="email" required>
                     </div>
                     <div class="form-group">
                        <label for="mobile">Contact</label>
                        <input type="text" name="usermobile" class="form-control" placeholder="Mobile Number" id="mobile" required>
                     </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                     </div>
                     <button type="submit" name="submit" class="btn btn-outline-warning">Register</button>
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