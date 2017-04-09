<?php
    session_start();
       
    if(!isset($_SESSION['user_name'])){
        echo "none";
    }else{
          $user = $_SESSION['user_name'];
        $pass = $_SESSION['user_pass'];
        $email = $_SESSION['user_email'];
        echo $user."-".$pass."-".$email;
 }

if(isset($_GET['close'])){
    if (session_status() != PHP_SESSION_NONE) {
        session_destroy();
        header('Location: ../index.html');
    }
}
?>