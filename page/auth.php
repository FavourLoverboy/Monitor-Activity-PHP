<?php 
    $todaysDate = date("Y-m-d");
    $date = substr($todaysDate, 0, 7);

    $tblquery = "SELECT * FROM payment WHERE date = :date";
    $tblvalue = array(
        ':date' => $date
    );
    $select = $collect->tbl_select($tblquery, $tblvalue);
    if($select){
        // echo "Here they are";
    }else{
        $tblquery = "SELECT company_Id, amt FROM companies";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
            $todaysDates = date('Y-m-d');
            $date = substr($todaysDates, 0, 7);
            $tblquery = "INSERT INTO payment VALUES(:pmt_id, :com_id, :user_id, :amt, :date, :status, :paid_time, :balance, :paid_date)";
            $tblvalue = array(
                ':pmt_id' => null,
                ':com_id' => $company_Id, 
                ':user_id' => "",
                ':amt' => $amt,
                ':date' => $date,
                ':status' => 'Not Paid',
                ':paid_time' => "",
                ':balance' => "Not",
                ':paid_date' => ""
            );
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                // echo "data has been inserted ";
            }
        }
    }
?>