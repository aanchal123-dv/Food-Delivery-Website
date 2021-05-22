<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>


        <form action=""method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of The Food">
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                       <textarea name="description" cols="30" rows="5" placeholder="Description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                        <?php
                            //create php code to display categories from Database
                            //1-create sql query to get all active categories
                            $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                            $res=mysqli_query($conn,$sql);

                            $count=mysqli_num_rows($res);
                            if($count>0)
                            {
                                //we have category
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //get the value
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title;?></option>
                                    
                                    <?php
                                }
                            }
                            else
                            {
                                //we don't have any category
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
                            }
                            //2-display on dropdown

                        ?>
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        <form>

        <?php
            //check whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //add the food
                echo "clicked";

                //1-get the data from form
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];
                //check whether radio button for featured and active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else{
                    $featured="No";//setting default value
                }
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else{
                    $active="No";//setting deafult value
                }
                //2-upload the image if selected
                //check whether the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //get the details of selected image
                    $image_name=$_FILES['image']['name'];
                    //check whether the image is selected or not and upload image
                    if($image_name!="")
                    {
                        //image is selected
                        //rename the image
                        //get the extension of selected image
                        $ext=end(explode('.',$image_name));
                        //create name for image
                        $image_name="Food-Name".rand(0000,9999).".".$ext;

                        $src=$_FILES['image']['tmp_name'];
                        $dst="../images/food/".$image_name;

                        //finally upload the food image
                        $upload=move_uploaded_file($src,$dst);
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
                }
                else{
                    $image_name="";//setting default value as blank
                }

                //3-insert into database

                $sql2="INSERT INTO tbl_food SET 
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    category_id=$category,
                    featured='$featured',
                    active='$active'

                    ";
               
               //execute the query
               $res2=mysqli_query($conn,$sql2);
               //check whether data is inserted or not
               if($res2==true)
               {
                   //data inserted succesfully
                   $_SESSION['add']="<div class='success'>Food Added Successfully</div><br>";
                   header('location:'.SITEURL.'admin/manage_food.php');
               }
               else{
                   //fail to insert data
                   $_SESSION['add']="<div class='error'>Failed to Add Food.</div><br>";
                   header('location:'.SITEURL.'admin/manage_food.php');
               }
                //4-redirect with message to manage food page

            }
            else{
                //won't add the food
            }
        
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>