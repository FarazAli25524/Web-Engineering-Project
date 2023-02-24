<?php
    require('connection.inc.php');
    if(isset($_POST['save'])){
        $user_name = $_POST['contact_name'];
        $user_email = $_POST['contact_email'];
        $user_mobile = $_POST['contact_number'];
        $user_comment = $_POST['contact_comment'];
        date_default_timezone_set('Asia/Kolkata');
        $user_added_on =date('d-m-y h:i:s');
    }

    $query = "insert into contact (contact_name, contact_email, contact_mobile, contact_comment,contact_added_on) values ('$user_name', '$user_email', '$user_mobile', '$user_comment', '$user_added_on')";

    if(mysqli_query($conn, $query)){
        header('location: about.php');
        die();
    }
    else{
        echo "Not Working.";
    }
?>