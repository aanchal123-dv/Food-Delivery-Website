<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">

        <h1>Add Admin</h1>
        <br></br>

        <?php
            if (isset($_SESSION['add'])) //checking whether session is add or not
            {
                echo $_SESSION['add']; //displaying session message
                unset($_SESSION['add']); //removing session message
            }
        ?>
            <form action="" method="POST">

                <table class="tbl-30">

                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
                    </tr>
                    
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" placeholder="Your Username"></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Your Password"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-sec">
                        </td>
                    </tr>

                </table>

            </form>

    </div>
</div>
<?php include('partials/footer.php');?>
<?php
    //process the value from form and save it in database
    //check whether the submit button is clicked or not
    if(isset($_POST["submit"]))
    {
        //Button Clicked
        //echo "Button Clicked";

        //1-get the data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']); //password encryption with md5

        //2-sql query to save the data into database
        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'

        ";
         //3-Executing query and saving data into database
         $res=mysqli_query($conn,$sql) or die(mysqli_error()); 

         //4- Check whether the (Query is executed) data is inserted or not and display approproate message
         if($res==TRUE)
        {
            //Data inserted
            //echo"data inserted";
            //Create a Variable to display message
            $_SESSION['add']="Admin Added Successfully";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/manage_admin.php');
        }
        else{
            //Failed to insert the data
           //echo "data not inserted";
           $_SESSION['add']="Failed To Add Admin";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
        
    }
?>