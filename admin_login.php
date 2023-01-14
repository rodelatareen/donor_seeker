<?php
    include("connection.php");
    ob_start();
    include("header.php");
     if($_POST)
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin_key = $_POST['admin_key'];
        $error_msg = array();
        $error_msg2 = array();
        $sql = "SELECT * from donor_infos where E_mail = '$email'";
        $sql2 = "SELECT * from donor_infos where Password = '$password'";
        
        $query = mysqli_query($connection,$sql);
        $query2 = mysqli_query($connection,$sql2);
        
        if($query)
        {
            if(mysqli_num_rows($query) == false) //false hole
            {
                 $error_msg['email1'] = "E-mail  doesn't exist.Please try again.";
            }
        }
        if($query2)
        {
            if (mysqli_num_rows($query2) == false) //false hole
            {
             $error_msg['password1'] = "Password don't match";
            }
        }
         if ($_POST['admin_key'] != 'admin' && !empty($_POST['admin_key'])) //false hole
            {
             $error_msg['admin_key1'] = "You Entered Wrong Admin Key/You are not to eligible as a admin...!!";
            }
        
        if(count($error_msg) == 0)
        {
            $sql3 = "SELECT * from donor_infos where Password = '$password' AND E_mail = '$email'";
            $query3 = mysqli_query($connection,$sql3);
            $role = mysqli_fetch_array($query3);


            if($role['Role'] != "admin")
            {
              $error_msg2['role'] = "You are not allowed to login from this page..Please chose user login page.";
            }
            if($role['status'] == "active")
            {
                $error_msg2['status'] = "Your profile was deleted...!!!";
            }
        }

        if(count($error_msg2) == 0)
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query3 = "SELECT * from donor_infos where E_mail ='$email' and Password = '$password' ";
            $sql3 = mysqli_query($connection ,$query3);
            $row = mysqli_fetch_array($sql3);
            $user = $row['First_Name'];
            $id = $row['id'];
            $role = $row['Role'];
            if($sql3)
            {
                if(mysqli_num_rows($sql3) == false) //false hole
                {
                    echo "Something went wrong..!!.Please try again..";
                }
                else
                    {
                        $_SESSION['user'] = $user;
                        $_SESSION['id'] = $id;
                        $_SESSION['role'] = $role;
                        header('location:view_own_profile.php');
                        //echo "Login Success";
                        //print_r($role);
                    }
            }
        
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
          <title>Login</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="css/app.css">
          <! Link For Font Awesome>
          <script src="https://kit.fontawesome.com/a076d05399.js"></script>
          <style type="text/css">
              .error{
                color: #cc0000;
                padding-top: 5px;
                float: left;
                width: 100%;
                font-style: bold;
              }
          </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>Admin Login</h5>
                    <a href="login.php" class="btn btn-link">User</a>
                    <a href="admin_login.php" class="btn btn-link">Admin</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address:</label>
                            <! E-mail >
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="E-mail">
                                <p> 
                                <?php
                                    if(isset($error_msg['email1'])) { ?>
                                        <div class="not-email" data-wrong1="<?= $error_msg['email1']; ?>"> 
                                          </div>
                                     <?php 
                                          }            
                                        ?> 
                                </p>
                            </div>
                        </div>
                        <! Password >
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                                <p> 
                                <?php
                                    if(isset($error_msg['password1'])) { ?>
                                        <div class="not-password" data-wrong2="<?= $error_msg['password1']; ?>"> 
                                          </div>
                                        <?php  
                                             }           
                                           ?> 
                                </p>
                            </div>
                        </div>


                        <! Role >
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Admin Key:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="admin_key"placeholder="Please Enter Your Admin Key">
                                
                                 
                                <p> 
                                <?php
                                    if(isset($error_msg['admin_key1'])) { ?>
                                        <div class="not-admin_key" data-wrong3="<?= $error_msg['admin_key1']; ?>"> 
                                          </div>
                                        <?php  
                                             }           
                                           ?> 
                                </p>
                                 
                                <p> 
                                <?php
                                    if(isset($error_msg2['role'])) { ?>
                                        <div class="not-role" data-wrong4="<?= $error_msg2['role']; ?>"> 
                                          </div>
                                        <?php  
                                             }           
                                           ?> 
                                </p>

                                <p>
                                    <?php
                                    if(isset($error_msg2['status'])) { ?>

                                        <div class="not-active" data-wrong="<?= $error_msg2['status']; ?>"> 
                                          </div>
                                <?php      
                                     }
                                    ?>

                                     <script src="sweetAlert/jquery-3.5.0.min.js"></script>
                                     <script src="sweetAlert/sweetalert2.all.min.js"></script>
                                     <script>
                                        const wrong = $('.not-active').data('wrong')
                                        if(wrong){
                                          Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Your profile was deleted...!!!'
                                              })
                                        }
                                        const wrong12 = $('.not-email').data('wrong12')
                                        if(wrong12){
                                          Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: "E-mail doesn't exist.Please try again."
                                              })
                                        }
                                        const wrong2 = $('.not-password').data('wrong2')
                                        if(wrong2){
                                          Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text:  "Password don't match"
                                              })
                                        }
                                        const wrong3 = $('.not-admin_key').data('wrong3')
                                        if(wrong3){
                                          Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'You Entered Wrong Admin Key/You are not to eligible as a admin...!!!'
                                              })
                                        }
                                        const wrong4 = $('.not-role').data('wrong4')
                                        if(wrong4){
                                          Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'You are not allowed to login from this page..Please chose user login page.'
                                              })
                                        }
                                     </script>


                                </p>
                            </div>
                        </div>

                         <! Please Register First >
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                    <label class="form-check-label" for="remember">
                                        If You are New Here.
                                       <a href="registation.php">Please Sign Up</a>
                                    </label>
                                </div>
                            </div>
                            <! Log In >
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="reset_password.php">
                                    Forgot Your Password
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>