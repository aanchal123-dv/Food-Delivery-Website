<?php
    //authorization-Access Control
    //check whether user is logged in or not
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message']="<div class='error'>Please Login to access Admin Panel.</div><br>";
        //Redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }


?>