<?php 
    include('config/constants.php');
    include('login-check.php');
 ?>


<html>
    <head>
        <title>Food Order Website-Home Page</title>
        <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <!--Menu Section Starts-->
        <div class="menu text-center">
            <div class="wrapper">
               <ul>
                   <li><a href="index.php">HOME</a></li>
                   <li><a href="manage_admin.php">ADMIN</a></li>
                   <li><a href="manage_category.php">CATEGORY</a></li>
                   <li><a href="manage_food.php">FOOD</a></li>
                   <li><a href="manage-order.php">ORDER</a></li>
                   <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>