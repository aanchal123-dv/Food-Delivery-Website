<?php include('partials_front/menu.php');?>
    <div id="Food">
        <h2 class="text-center text ">Explore Food</h2>
       
        <section class="food-menu" width=800>
        
             <?php
                $sql="SELECT * FROM tbl_food WHERE active='Yes'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Image not avaialable</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicken Hawain Pizza" class="img-responsive">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                    <div class="food-menu-desc">
                                            <h4><?php echo $title;?></h4>
                                            <p class="food-price "><?php echo $price;?></p>
                                            <p class="food-details">
                                            <?php echo $description;?>
                                        </p>
                                            <br>
                                            <a href="<?php echo SITEURL; ?>confirmorder.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                            <!-- <a href="order4.html" class="btn btn-primary"> Add To Cart</a> -->
                                            <div class="clearfix "></div>
                                    </div>
                                </div>

                        <?php
                    }
                }
                else{
                    echo "<div class='error>Food not found.</div>";
                }
             ?>
            
            

                <div class="clearfix"></div>
            
        </section>
            
     </div>
        
        <!-- food menu ends here  -->
    
        <!-- social section start here -->
        
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