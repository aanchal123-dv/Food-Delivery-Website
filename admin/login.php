<?php include('config/constants.php');?>
<html>
    <head>
        <title>Login- Food Order System</title>
        <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="login text-center">
        <h1 class="text-center" >LOGIN</h1>
        <br><br>
        <?php
                    if (isset($_SESSION['login'])) //checking whether session is add or not
                    {
                        echo $_SESSION['login']; //displaying session message
                        unset($_SESSION['login']); //removing session message
                    }
                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
        ?> 
        <form action="" method="POST" class="form-1 text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter Username">
            <br><br>

            Password:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="submit" value="LOGIN" class="btn-login">
            <br><br> 
        </form>
        </div>
    </body>

</html>

<?php
    if(isset($_POST['submit']))
    {
        //process for login
        //1-get username
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        //2-sql to check whether password exist or not
        $sql="SELECT * FROM tbl_admin WHERE username='$username'AND password='$password'";
        //execute the query
        $res=mysqli_query($conn,$sql);

        //4-count rows whether the user exist or not
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            //user available and login success
            $_SESSION['login']="<div class='success1'>LOGIN SUCCESSFUL</div>";
            $_SESSION['user']=$username;//to check whether user is login or not
            header('location:'.SITEURL.'admin/index.php');
        }
        else{
            //user not available and login fail
            $_SESSION['login']="<div class='error1 text-center'>Login failed</div><br>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>

