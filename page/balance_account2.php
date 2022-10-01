<?php 

    if($_POST['select']){
        extract($_POST);
        $_SESSION['date'] = $date;
        // echo $_SESSION['date'];
        echo '<script> window.location="balance_account"; </script>';
    }
?>
<?php 
 
    if($_POST['balance']){
        extract($_POST);
        $tblquery = "UPDATE payment SET balanced = :balanced WHERE user_id = :user_id";
        $tblvalue = array(
            ':balanced' => "Collected",
            ':user_id' => $user_id
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            $tblquery = "INSERT INTO notification VALUES(:not_id, :user_id, :msg, :time, :time2, :date)";
            $tblvalue = array(
                ':not_id' => null,
                ':user_id' => $_SESSION['myId'], 
                ':msg' => $user . " account was balanced for the day",
                ':time' => date('h:i:s'),
                ':time2' => time(),
                ':date' => date("Y-m-d")
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
        }
        echo '<script> window.location="balance_account"; </script>';
    }

?>