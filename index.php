<?php include('partials_front/menu.php');?>
    
    <section id="home">
        <h1 class="h-primary">Always Choose Good</h1>
        <p class="para">"We serve the best to the BEST". </p>
        
        <section class="foodsearch text" > 
                <form action="<?php echo SITEURL;?>foodsearch.php" method="POST">
                    <input type="search" name ="search" placeholder="Search food" required>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                  
                </form>
              </div> 
          </section>
    </section>
    <div class="clearfix"></div>    
    <!-- food search ends here  -->

<?php
    if(isset($_SESSION['order']))
    {
        echo($_SESSION['order']);
        unset($_SESSION['order']);
    }
?>

    <!-- categories section start here -->
    <!-- <section class="categories"> -->
   <div class="bg">
       <div id="Categories">
           <h2 class="text centre">Categories</h2>
           <section class="categories">
                <div class="container">
                
                <?php
                    $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                    $res=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $image_name=$row['image_name'];
                            ?>
                                <a href="<?php echo SITEURL; ?>categories-food.php?category_id=<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col">
                                                
                                                    <?php
                                                        if($image_name=="")
                                                        {
                                                            echo"<div class='error'>Image Not Availabe</div>";
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"  alt="pizza" width="85%" >
                                                            <?php
                                                        }
                                                    ?>
                                                
                                                    <h3 style="color:black;" class="text-centre"><?php echo $title; ?></h3>
                                                    </div>
                                                    </a>
                                                    
                                            
    <?php
            }
        }
        else{
            echo "<div class='error'>Category Not Added.</div>";
        }
        
    ?>
    
    </div>
       </section>
</div>
    </div>
 <!-- categories  ends here  -->
    <!-- food menu section start here -->
    <div id="Food">
    <h2 class="text-center">Explore Food</h2>
   
    <section class="food-menu" width=800>
    
        <?php
            $sql2="SELECT *FROM tbl_food WHERE active='Yes' AND featured='Yes'LIMIT 6";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];
                    ?>
                         <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php

                                        if($image_name=="")
                                        {
                                            echo"<div class='error'>Image Not Availabe</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Cheese Momos" class="img-responsive">
                                            <?php
                                        }
                                ?>
                               
                             </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price "><?php echo $price;?></p>
                                    <p class="food-details"><?php echo $description;?></p>
                                    <br>
                                    <a href="<?php echo SITEURL; ?>confirmorder.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                    <!-- <a href="order.html" class="btn btn-primary"> Add To Cart</a> -->
                                    <div class="clearfix "></div>
                                </div>
                                </div>
                            
                    <?php
                }
            }
            else{
                echo "<div class='error'>Food not Available.</div>";
            }
        ?>
            
            <div class="clearfix"></div>
           
        </section>
       
    </div>
    
    <!-- food menu ends here  -->

    <!-- social section start here -->
     
     
    <div id="Contact">
        <section class="social bg2">
            <div class="container text-center ">
                <ul>
                    <li>
                        <a href="#"><img src="images\facebook.png" alt="facebook" width="60"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images\instagram.png" alt="instagram" width="60"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images\twitter.png" alt="twitter" width="60"> </a>
                    </li>
                </ul>
            </div>
        
    
        </section>
    </div>
    

    </section>
    <!-- social ends here  -->

<?php include('partials_front/footer.php');?>