<?php
  require('Components/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace | Contact Us</title>
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
      <link rel="stylesheet" href="CSS\header.css">
</head>
<body>
   <section>
    <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form action="insert_comment.php" method="POST">
                     <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="contact_name" class="form-control" placeholder="Your Name*" required="">
                     </div>
                     <div class="form-group">
                        <label for="useremail">Email</label>
                        <input type="email" name="contact_email" class="form-control" placeholder="Email*"  required="">
                     </div>
                     <div class="form-group">
                        <label for="usermobile">Contact number</label>
                        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number*"  required="">
                     </div>
                     <div class="form-group">
                        <label for="usercomment">Comment</label>
                        <textarea name="contact_comment" class="form-control"  cols="30" rows="5" placeholder="Your Comment*"></textarea>
                     </div>
                        <button type="submit" name="save" class="btn btn-outline-warning" value="Save">Sumbit</button>
                     </form>
               </div>
            </div>
         </div>
      </div>

    </section>
    <!-- footer  -->
   <?php include('Components/footer.php') ?>
      <script src="JavaScript\header_search_script.js"></script>    
</body>
</html>