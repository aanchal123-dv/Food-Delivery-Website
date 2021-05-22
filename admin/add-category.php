<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
<h1>Add Category</h1>
 <br><br>
 <?php
 if(isset($_SESSION['add']))
 {
     echo $_SESSION['add'];
     unset($_SESSION['add']);
 }
 
 if(isset($_SESSION['upload']))
 {
     echo $_SESSION['upload'];
     unset($_SESSION['upload']);
 }
 
 ?>
 <br><br>
 <!-- add category form starts here -->
 <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
            <input type="text" name="title" placeholder="Category Title">

            </td>
        </tr>
 <tr>
        <td>Select image: </td>
            <td>
                <input type="file" name="image">
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
 <input type="submit" name="submit" value="Add Category" class="btn-secondary">
 </td>

 </tr>
 </table>
 
 </form>
  <!-- add categoty form ends here -->
  <?php
  //check whether submit is button is clicked or not
  if( isset($_POST['submit']))
  {
      //echo 'clicked';
      //get value form category form
      $title=$_POST['title'];

      //for radio input we need to check whether the button is selected or not
      if(isset($_POST['featured']))
      {
          //get value from form
          $featured=$_POST['featured'];
      }
      else
      {
        // set the default value
        $featured="No"; 
      }
      if(isset($_POST['active']))
      {
          $active=$_POST['active'];
      }
      else
      {
          $active="No";
      }
      //check whether image is selected or not and set the value for image name accordingly
      //print_r($_FILES['image']);
      //die();
      if(isset($_FILES['image']['name']))
      {
          //upload image
          //to upload image we need image name,source path and destination
          $image_name = $_FILES['image']['name'];
          //upload the image only if image is selected for that
          if($image_name!="")
           {
                //auto renmae our image
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
                    $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                    //redirect to add category page
                    header('location:'.SITEURL.'admin/add-category.php');
                    //stop the process
                        die();
                    
                }
            }

        }
      else
      {
          //dont upload image set the image name value as blank
          $image_name="";
      }
       
      //create sql query to insert a category into database
      $sql="INSERT INTO tbl_category SET
      title='$title',
      image_name='$image_name', 
      featured='$featured',
      active='$active'
      ";
      //execute the query and save in database
      $res=mysqli_query($conn,$sql);
      //check whether the query is executed or not and data added or not
      if($res==true)
      {
          //query executed and category added
          $_SESSION['add']="<div class='success'> Category Added Successfully.</div><br>";
          //redirect to manage page
          header('location:'.SITEURL.'admin/manage_category.php');
           
      }
      else
      {
          //failed to add category
          $_SESSION['add']="<div class='error'> Failed to Add Category.</div>";
          //redirect to manage page
          header('location:'.SITEURL.'admin/add-category.php');
      }

 
  }
  
  
  
  
  ?>

</div>
</div>
<?php include('partials/footer.php');?>