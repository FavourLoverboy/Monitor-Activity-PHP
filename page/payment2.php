<?php
    if($_POST['submit']){

        extract($_POST);

        $tblquery = "UPDATE payment SET user_id = :user_id, status = :status, paid_time = :paid_time, paid_date = :paid_date WHERE pmt_id = $companyId";
        $tblvalue = array(
            ':user_id' => $_SESSION['myId'],
            ':status' => "Paid",
            ':paid_time' => date('h:i:s'),
            ':paid_date' => date('Y-m-d')
        );
        // print_r($tblquery);
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            $tblquery = "INSERT INTO notification VALUES(:not_id, :user_id, :msg, :time, :time2, :date)";
            $tblvalue = array(
                ':not_id' => null,
                ':user_id' => $_SESSION['myId'], 
                ':msg' => $_SESSION['company_name'] . " paid her revenue",
                ':time' => date('h:i:s'),
                ':time2' => time(),
                ':date' => date("Y-m-d")
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            echo "
                <div class='container-fluid invest-popup-notification'>
                    <div class='main-box'>
                        <div class='head'>
                            <div class='row no-p'>
                                <div class='col-xs-11'>
                                    <h4>Message</h4>
                                </div>
                                <div class='col-xs-1 close' onclick='popupInvestNotification()'>
                                    <h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4>
                                </div>
                            </div>
                        </div>
                        <div class='bottom'>
                            <div class='msg'>
                                Transaction complete.
                            </div>
                            <a class='btn' href='payment'>Ok</a>
                        </div>
                    </div>
                </div>
            ";
        }else{
            echo "
                <div class='container-fluid invest-popup-notification'>
                    <div class='main-box'>
                        <div class='head'>
                            <div class='row no-p'>
                                <div class='col-xs-11'>
                                    <h4>Message</h4>
                                </div>
                                <div class='col-xs-1 close' onclick='popupInvestNotification()'>
                                    <h4><span><i class='fa fa-times' aria-hidden='true'></i></span></h4>
                                </div>
                            </div>
                        </div>
                        <div class='bottom'>
                            <div class='msg'>
                                An error occur.
                            </div>
                            <a class='btn' href='payment'>Ok</a>
                        </div>
                    </div>
                </div>
            ";
        }
    }
?>