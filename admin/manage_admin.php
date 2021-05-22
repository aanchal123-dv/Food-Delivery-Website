<?php include('partials/menu.php');?>

        <!--Main Content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1 class="head">MANAGE ADMIN</h1>

                <br />

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];  //display session message
                        unset($_SESSION['add']); //Removing session message
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }
                ?>
                <br><br><br>


                <!--Button to Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br /><br />

                <table class="tbl">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>


                    <?php
                        $sql="SELECT * FROM tbl_admin"; //query to get all admin
                        $res=mysqli_query($conn,$sql);//execute query

                        if($res==TRUE)   //check whether query is executed or not
                        {
                            //count rows to check whether we have data or not
                            $rows=mysqli_num_rows($res); //function to get all the rows

                            $sn=1;//create a variable and assign the value for reshuffling of id when one of them is deleted

                            if($rows>0)//check number of rows
                            {
                                //we have data
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    ?>
                                        <tr>
                                            <td><?php echo $sn++;?></td>
                                            <td><?php echo $full_name;?></td>
                                            <td><?php echo $username;?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-secondary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Admin</a>
                                            </td>
                        
                                        </tr>


                                    <?php
                                }
        
                            }
                            else{
                                //we don't have data
                            }
                        }
                   ?>
                    
                </table>
                
            </div>
        </div>
        <!--Main Content Section Ends-->

<?php include('partials/footer.php');?>