<?php

    include('config/dblink.php');
    $collect = new DB();

    session_start();
    if($_SESSION['ln']){
        //allow
    } else{
        header('location: login');
    }

    $todaysDate = date('Y-m-d');
    $tblquery = "SELECT notification.time, notification.msg, users.ln, users.fn FROM notification INNER JOIN users ON notification.user_id = users.id WHERE notification.date = :date ORDER BY notification.time2 DESC Limit 5";
    $tblvalue = array(
        ':date' => $todaysDate
    );
    $select = $collect->tbl_select($tblquery, $tblvalue);
    if(!$select){
        echo '<h3 style="color:white;margin:0px;">No activity for today yet</h3>';
    }
    foreach($select as $data){
        extract($data);
        ?>
        <?php
        echo "
            <div class='log-msg'>
                <div class='row'>
                    <div class='col-md-12 main-msg'>
                        $msg
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-9 name'>$ln $fn</div>
                    <div class='col-md-3 time'>$time</div>
                </div>
            </div>
        ";
    }
?>