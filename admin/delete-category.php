<?php
    include('config/constants.php');
    //echo "delete page";
    //check whether id and image_name value is set or not
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //get the value and delete
       // echo "Get Value and Delete";
       $id=$_GET['id'];
       $image_name=$_GET['image_name'];
       //remove image if available
       if($image_name!="")
       {
           //remove image name
           $path="../images/category/".$image_name; 
           //remove image      
           $remove=unlink($path);

           //if fail to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove']="<div class='error'>Failed to remove Category Image</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage_category.php');
        
                //stop the process
                die();
            }
        }
        //sql query for delete data from database
        $sql="DELETE FROM tbl_category WHERE id=$id";

        //execute the query
        $res=mysqli_query($conn,$sql);
        if($res===true)
        {
            //set success message and redirect
            $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div><br>";
            //redirect
            header('location:'.SITEURL.'admin/manage_category.php');
        }
        else{
                //set fail message and redirect
                $_SESSION['delete']="<div class='error'>Failed to Delete Category.</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage_category.php');
        }

    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage_category.php');
    }
?>