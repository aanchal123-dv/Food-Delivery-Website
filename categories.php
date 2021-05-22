<?php include('partials_front/menu.php');?>
    <div class="bg">
        <div id="Categories">
        <h2 class="text-center">Categories</h2>
        <section class="categories" >
                <div class="container">
               
        <?php
            
        $sql="SELECT *FROM tbl_category WHERE active='Yes'";
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
             <div class="row" >
             <div class="col">
                
                <?php
                
                if($image_name=="")
                {
                    echo "<div class='error>Category not found.</div>";
                }
                else{
                    ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>"  alt="pizza" width="85%" >
                    <?php
                }

                ?>
                
                    <h3><?php echo $title;?></h3>
                    </div>
                
            <?php
            }
        }
        else{
            echo "<div class='error'>Category Not Found.</div>";
        }
        ?>
        
                </div>
                </section>
        
    </div>
    </div><div id="Contact">
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