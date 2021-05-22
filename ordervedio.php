<?php include('config_front/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/order.css">
    <script src="vedio.js" async></script>
</head>
<body>
     <!-- Video Source -->
  <!-- https://www.pexels.com/video/aerial-view-of-beautiful-resort-2169880/ -->
  <section class="showcase">
    <header>
      <!-- <h2 class="logo">Travel</h2> -->
      <div class="toggle"></div>
    </header>
    <video src="vedio/order2.mp4" muted loop autoplay></video>
    <div class="overlay"></div>
    <div class="text">
    
    </div>
   
  </section>
  <div class="menu">
    <ul>
                <li class="item"><a href="<?php echo SITEURL;?>index.php">Home</a></li>
                <li class="item"><a href="<?php echo SITEURL;?>categories.php">Categories</a></li>
                <li class="item"><a href="<?php echo SITEURL;?>food.php">Food</a></li>
                <li class="item"><a href="<?php echo SITEURL;?>contact.php">Contact </a></li>
      
    </ul>
  </div>
</body>
</html>