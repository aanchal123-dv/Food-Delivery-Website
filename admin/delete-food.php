<?php include('config/constants.php');
if(isset($_GET['id']) && isset($_GET['image_name']))
{
   // echo "Process to delete";
   //get id and image name
   $id = $_GET['id'];
   $image_name = $_GET['image_name'];

   //remove image if available
   //check image is available or not and delete if it is there
   if($image_name != "")
   {
       //it has image and need to remove from folder
       //get image path
       $path = "../images/food/".$image_name;
       //remove image file from folder
       $remove = unlink($path);
       //check whether image is removed or not
       if($remove==false)
       {
           //failed to remove image
           $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
           //redirect to manage food
           header('location:'.SITEURL.'admin/manage_food.php');
           //stop process of deleting food
           die();
           
       }


   }
   //delete food from database
   $sql = "DELETE FROM tbl_food WHERE id=$id";
   //execute the query
   $res = mysqli_query($conn, $sql);
   //check whether query executed or not and set the session message repectively
   //redirect to manage food with session message
   //redirect to manage food with session message
   if($res==true)
   {
       //food deleted
       $_SESSION['delete'] = "<div class='success'>Food deleted successfuly.</div>";
       header('location:'.SITEURL.'admin/manage_food.php');

   }
   else
   {
    $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";
    header('location:'.SITEURL.'admin/manage_food.php');

   }

}
else

{
   // echo "REDIRECT";
   $_SESSION['unauthorize'] = "<div class='error'>unauthorised Access.</div>";
   header('location:'.SITEURL.'admin/manage_food.php');
}



?>