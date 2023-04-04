<?php 

session_start();


if(isset($_SESSION["username"]))
{
    header("location:http://localhost/HEXASHOP-1.0.0/admin/products.php");

}


?>


<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/logo.jpg" style="height: 120px; ">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->

                        <?php

                        if(isset($_POST["login"]))
                        {

                    
                        include "config.php";

                        $username = $_POST["username"];
                        $password = $_POST["password"];

                        $query = "SELECT `user_id`,`username`,`role` FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";

                        $result =  mysqli_query($conn,$query);

                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                session_start();

                                $_SESSION["username"] = $row["username"];
                                $_SESSION["user_id"] = $row["user_id"];
                                $_SESSION["user_role"] = $row["role"];

                                header("location:http://localhost/HEXASHOP-1.0.0/admin/products.php");
                            }
                        }
                        else
                        {
                            echo "username and password did not match";
                        }


                        
                        
                    }

                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>