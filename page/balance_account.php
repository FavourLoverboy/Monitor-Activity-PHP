<div class="main-body">
    <h3 class="title">Balance Account</h3>

    <form action="balance_account2" method="POST">
        <label for="date" class="title-2" style="margin-bottom: 0px;">Choose Date:</label><br>
        <input type="date" name="date" id="date" required style="border-radius:5px;margin-bottom:5px;"><br>
        <input type="submit" name="select" class="btn-sm btn-primary" value="Select" style="border-radius:10px;">
    </form>

    <div class="row no-p row-box" style="padding:30px;">
        <div class="col-xs-12 no-p">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Check</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $tblquery = "SELECT sum(payment.amt) as total, payment.balanced, users.fn, users.ln, payment.user_id FROM payment INNER JOIN users ON payment.user_id = users.id WHERE payment.paid_date = :paid_date GROUP BY payment.user_id ORDER BY users.ln";
                            $tblvalue = array(
                                ':paid_date' => $_SESSION['date']
                            );
                            // print_r($tblvalue);
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            if(!$select){
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
                                                    No data found for the date.
                                                </div>
                                                <a class='btn' onclick='popupInvestNotification()'>Ok</a>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                            foreach($select as $data){
                                extract($data);
                                 ?>
                                 <?php
                                    if($balanced == "Not"){
                                        echo "
                                            <tr>
                                                <td>$ln $fn</td>
                                                <td>$total</td>
                                                <td>
                                                    <form action='balance_account2' method='POST' style='margin:0px;padding:0px;'>
                                                        <input type='hidden' name='user_id' value='$user_id'>
                                                        <input type='hidden' name='user' value='$ln $fn'>
                                                        <input type='submit' name='balance' value='Balance' class='btn btn-primary'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }elseif($balanced != "Not"){
                                        echo "
                                            <tr>
                                                <td>$ln $fn</td>
                                                <td>$total</td>
                                                <td><button class='btn btn-sm btn-info'>Collected</button></td>
                                            </tr>
                                        ";
                                    }
                            }
                        ?>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>Collected</td>
                        <td>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM payment WHERE paid_date = :paid_date AND balanced = :balanced";
                                $tblvalue = array(
                                    ':paid_date' => $_SESSION['date'],
                                    ':balanced' => "Collected"
                                );
                                // print_r($tblvalue);
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo $total;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Not Collected</td>
                        <td>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM payment WHERE paid_date = :paid_date AND balanced = :balanced";
                                $tblvalue = array(
                                    ':paid_date' => $_SESSION['date'],
                                    ':balanced' => "Not"
                                );
                                // print_r($tblvalue);
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo $total;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM payment WHERE paid_date = :paid_date";
                                $tblvalue = array(
                                    ':paid_date' => $_SESSION['date']
                                );
                                // print_r($tblvalue);
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo $total;
                                }
                            ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<div>
