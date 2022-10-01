<?php
    // Logout
    session_start();
    include('config/dblink.php');
    $collect = new DB();
    $tblquery = "INSERT INTO notification VALUES(:not_id, :user_id, :msg, :time, :time2, :date)";
    $tblvalue = array(
        ':not_id' => null,
        ':user_id' => $_SESSION['myId'], 
        ':msg' => "user has just log out",
        ':time' => date('h:i:s'),
        ':time2' => time(),
        ':date' => date("Y-m-d")
    );
    $insert = $collect->tbl_insert($tblquery, $tblvalue);
    session_destroy();
    header('location:login.php');

?>