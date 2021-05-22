<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
            //check whether the id is set or not
            if(isset($_GET['id']))
            {
                //get the id and other details
                //echo "Getting the data";
                $id=$_GET['id'];
                //create sql query to get all details
                $sql="SELECT *FROM tbl_category WHERE id=$id";

                //execute query
                $res=mysqli_query($conn,$sql);

                //count the rows to check whether is id is valid or not
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    //get all the data
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $current_image=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];


                }
                else{
                    //redirect to manage category with session message
                    $_SESSION['no-category-found']="<div class='error'>Category not Found.</div><br>";
                    header('location:'.SITEURL.'admin/manage_category.php');
                }
            }
            else{
                header('location:'.SITEURL.'admin/manage_category.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title"value="<?php echo $title; ?>">
                    </td>
                </tr>


                <tr>
                    <td>Currrent Image: </td>
                    <td>
                       <?php 
                        if($current_image!="")
                        {
                            //display the image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo$current_image;?>" width=60px>
                            <?php
                        }
                        else{
                            //display the message
                           echo  "<div class='error>Image Not Found.</div>";
                        }
                       ?>
                    </td>
                </tr>


                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>


                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>


                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                    
                </tr>
            

            </table>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //1-get all the values from our form
                $id=$_POST['id'];
                $title=$_POST['title'];
                $current_image=$_POST['current_image'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];

                //2-updating image if selected
                //check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //ge th e Image details
                    $image_name=$_FILES['image']['name'];
                    if($image_name!="")
                    {
                        //image available
                        //upload the new image
                
                        //get the extension of our image(jpg,png,gif,etc)
                        $ext = end(explode('.',$image_name));
                        //renmae image
                        $image_name = "Food_Category_".rand(000,999).'.'.$ext;

                        
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path="../images/category/".$image_name;
                        //finally upload the image
                        $upload=move_uploaded_file($source_path,$destination_path);
                        //check whether the image is uploaded or not
                        //and if not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/manage_category.php');
                            //stop the process
                                die();
                        }

                        //remove the current image if available
                        if($current_image!="")
                        {
                            $remove_path="../images/category/".$current_image;
                        
                            $remove=unlink($remove_path);
                            //check whether the image is removed or not and if failed to remove then show message and stop the process
                            if($remove==false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove']="<div class='error'>Failed to Remove Current Image</div><br>";
                                header('location:'.SITEURL.'admin/manage_category.php');
                                die();
                            }
                        }
                       
                    }
                    else{
                        $image_name=$current_image;
                    }

                }
                else{
                    $image_name=$current_image;
                }

                //3-update the database
                $sql2="UPDATE tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    WHERE id=$id
                ";

                //execute the query
                $res2=mysqli_query($conn,$sql2);
                //4-redirect to manage category
                //check whether query executed or not
                if($res2==true)
                {
                    //category updated
                    $_SESSION['update']="<div class='success'>Category Updated Succesfully</div><br>";
                    header('location:'.SITEURL.'admin/manage_category.php');
                }
                else{
                    //failed to update category
                    $_SESSION['update']="<div class='error'>Failed to Update Category</div><br>";
                    header('location:'.SITEURL.'admin/manage_category.php');
                }
            }
        ?>

    </div>
</div>
<?php include('partials/footer.php');?>