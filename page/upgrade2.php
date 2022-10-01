<?php
    if($_POST['change']){
        extract($_POST);

        $update = '';

        if($level == 'Manager'){
            $tblquery = "UPDATE users SET level = :level WHERE id = :id";
            $tblvalue = array(
                ':level' => "User",
                ':id' => $id
            );
            $update = $collect->tbl_update($tblquery, $tblvalue);
        }else if($level == 'User'){
            $tblquery = "UPDATE users SET level = :level WHERE id = :id";
            $tblvalue = array(
                ':level' => "Manager",
                ':id' => $id
            );
            $update = $collect->tbl_update($tblquery, $tblvalue);
        }
        if($update){
            echo '<script> window.location="http://localhost/activitylog/upgrade"; </script>';
        }
    }
?>