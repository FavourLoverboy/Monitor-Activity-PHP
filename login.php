<?php
    session_start();
    include('config/dblink.php');
    $collect = new DB();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | Activity Log</title>
        <link rel="shortcut icon" type="image/png" href="img/profile.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 wrapper-login">
                    <img src="img/profile.png" width="150px" style="border-radius:50%;">
                    <div class="wrapper-box">
                        <h1>User Login</h1>
                        <form action="login.php" method="POST">
                            <div class="form-box">
                                <label for="n">Email Address</label>
                                <input type="email" name="email" id="n" placeholder="name@example.com" required>
                                <br/><br/>
                                <label for="p">Password</label>
                                <input type="password" name="password" id="p" placeholder="Enter Password" required>
                                <br/><br/>
                                <input type="submit" name="login" value="Login">

                                <p style="margin-top:10px;">Forgot Your Password <a href="reset.php">Reset.</a></p>

                                <p>Don't Have An Account Yet? Ask for one.</p>

                                <p style="margin-top:45px;">© Copyright 2022 All Rights Reserved.</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script src="js/main.js"></script>
    </body>
</html>

<?php

    if($_POST['login']){

        extract($_POST);
        $tblquery = "SELECT * FROM users WHERE email = :email && password = :password && status = :status";
        $tblvalue = array(
            ':email' => htmlspecialchars($email),
            ':password' => htmlspecialchars($password),
            ':status' => "Active"
        );
       //print_r($tblquery);
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                $_SESSION['myId'] = $id;
                $_SESSION['ln'] = $ln;
                $_SESSION['fn'] = $fn;
                $_SESSION['email'] = $email;
                $_SESSION['level'] = $level;
                $_SESSION['date'] = $date;
                $_SESSION['lastLogin'] = $last_login;
                $_SESSION['status'] = $status;
                $_SESSION['picture'] = $picture;
                $_SESSION['password'] = $password;
                $_SESSION['ms'] = $ms;

                if($_SESSION['level'] == 'Admin'){
                    header ('Location: dashboard_admin');
                    echo '<script> window.location="dashboard_admin"; </script>';
                }else if($_SESSION['level'] == 'Manager'){
                    header ('Location: dashboard_mini');
                    echo '<script> window.location="dashboard_mini"; </script>';
                }else if($_SESSION['level'] == 'User'){
                    header ('Location: dashboard');
                    echo '<script> window.location="dashboard"; </script>';
                }
            }
        }else{
            echo "<script> alert('Oops Something went wrong. Please check if your password and Username are correctly spelt, Or if the error persist it may be that your account has been Disabled.'); </script>";
        }

        if($select){
            $tblquery = "UPDATE users SET last_login = :last_login WHERE id = :id";
            $tblvalue = array(
                ':last_login' => date("Y-m-d"),
                ':id' => $_SESSION['myId']
            );
            $update = $collect->tbl_update($tblquery, $tblvalue);
        }

        if($select AND $_SESSION['level'] != "Admin"){
            $tblquery = "INSERT INTO notification VALUES(:not_id, :user_id, :msg, :time, :time2, :date)";
            $tblvalue = array(
                ':not_id' => null,
                ':user_id' => $_SESSION['myId'], 
                ':msg' => "user has logged in",
                ':time' => date('h:i:s'),
                ':time2' => time(),
                ':date' => date("Y-m-d")
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
        }
    }
?>